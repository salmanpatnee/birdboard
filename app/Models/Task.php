<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, RecordsActivity;

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

        $this->recordActivity("completed_task");
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);

        $this->recordActivity("incompleted_task");
    }
}
