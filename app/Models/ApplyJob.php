<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;

    protected $table ='apply_jobs';

    protected $guarded =[];

    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
