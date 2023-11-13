<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InspectionResource;
use App\Models\Inspection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function inspections()
    {
        $inspections = Inspection::orderBy('order')->get();

        return  InspectionResource::collection($inspections);
    }
}
