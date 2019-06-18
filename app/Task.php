<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    // update updated_at on relationship model
    protected $touches = ['project'];

    protected $casts = [
        'completed' => 'boolean'
    ];

    // Same as having TaskObserver
    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($task){
    //         $task->project->recordActivity('created_task');
    //     });

    //     static::deleted(function ($task){
    //         $task->project->recordActivity('deleted_task');
    //     });
    // }

    public function complete()
    {
        $this->update(['completed' => true]);
        
        $this->recordActivity('completed_task');
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);
        
        $this->recordActivity('incompleted_task');
    }

    public function path()
    {
        return "/projects/{$this->project_id}/tasks/{$this->id}";
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    public function recordActivity($description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }
}
