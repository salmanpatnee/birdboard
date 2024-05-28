<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Arr;

trait RecordsActivity
{

    public $oldAttributes = [];


    public static function bootRecordsActivity()
    {
        static::updating(function ($model) {

            $model->oldAttributes = $model->getOriginal();
        });
    }

    public function activity()
    {
        if (class_basename($this) == 'Project') {

            return $this->hasMany(Activity::class)->latest();
        }

        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    public function recordActivity($type)
    {
        $this->activity()->create([
            'user_id' => $this->getActivityOwner()->id,
            'project_id' => class_basename($this) == 'Project' ?  $this->id : $this->project_id,
            'type' => $type,
            'changes' => $this->getActivityChanges()
        ]);
    }

    private function getActivityOwner()
    {
        return ($this->project ?? $this)->owner;
    }

    public function getActivityChanges()
    {

        if ($this->wasChanged()) {

            return [
                'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }
}
