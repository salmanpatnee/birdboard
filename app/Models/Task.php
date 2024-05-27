<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $touches = ['project'];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function complete()
    {
        $this->update(['completed' => true]);

        $this->recordsActivity("completed_task");
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);

        $this->recordsActivity("incompleted_task");

    }

    public function activity(){
      return $this->morphMany(Activity::class, 'subject');
    }

    public function recordsActivity($type)
    {
        $this->activity()->create([
            'project_id' => $this->project_id, 
            'type' => $type
        ]);
    }
}
