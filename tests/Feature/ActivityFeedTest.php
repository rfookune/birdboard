<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Facades\Tests\Setup\ProjectFactory;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project_records_activity()
    {
        $project = ProjectFactory::create();
        
        $this->assertCount(1, $project->activity);
        $this->assertEquals($project->activity[0]->description, 'created');
    }

    /** @test */
    public function updating_a_project_records_activity()
    {
        $project = ProjectFactory::create();
        $project->update(['title' => 'Changed']);
        
        $this->assertCount(2, $project->activity);
        $this->assertEquals($project->activity->last()->description, 'updated');
    }

    /** @test */
    public function creating_a_new_task_records_project_activity()
    {
        $project = ProjectFactory::create();
        $project->addTask('Some Task');
        
        $this->assertCount(2, $project->activity);
        $this->assertEquals($project->activity->last()->description, 'created_task');
    }

    /** @test */
    public function completing_a_task_records_project_activity()
    {
        $project = ProjectFactory::withTasks(1)->create();
        
        $this->actingAs($project->owner)
            ->patch($project->tasks[0]->path(), [
                'body' => 'foobar',
                'completed' => true,
            ]);
        
        $this->assertCount(3, $project->activity);
        $this->assertEquals($project->activity->last()->description, 'completed_task');
    }
}
