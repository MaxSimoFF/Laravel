<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'gender', 'address', 'hospital_id'];
    // protected $hidden = ['pivot']; // to remove from select query.
    public $timestamps = false;

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'doctor_service', 'doctor_id', 'service_id', 'id', 'id');
    }
}
