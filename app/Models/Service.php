<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function doctors()
    {
        return $this->belongsToMany('App\Models\Doctor', 'doctor_service', 'service_id', 'doctor_id', 'id', 'id');
    }
}
