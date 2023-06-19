<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function requiter()
    {
        return $this->belongsTo(Requiter::class);
    }

    public function job_appliance()
    {
        return $this->hasMany(JobAppliance::class);
    }
}
