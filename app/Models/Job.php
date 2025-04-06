<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Location;
use App\Models\ApplyJob;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table='jobs';

    public function getShortDescriptionAttribute(){
        return \Illuminate\Support\Str::limit($this->job_description, 220);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public function hr(){
        return $this->belongsTo(User::class,'hr_id','id');
    }

    public function appliedJobs(){
        return $this->hasMany(ApplyJob::class,'job_id');
    }

}
