<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function getDoctorHospital()
    {
        $doctor = Doctor::with(['hospital' => function($q) {
            $q->select('id', 'name');
        }])->find(1);
        // return $doctor->hospital->name;
        return json_encode($doctor, JSON_UNESCAPED_UNICODE);
    }

    public function getDoctorServices()
    {
        $data = Service::find(1)->doctors;
        return $data;
    }
}
