<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Location extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='locations';

    public function locations(){
        return $this->hasMany(Job::class);
    }
}
