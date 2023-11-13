<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InspectionResource;
use App\Models\Inspection;
use App\Models\PurchaseInspection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function inspections()
    {
        $inspections = Inspection::orderBy('order')->get();

        return  InspectionResource::collection($inspections);
    }

    public function purchaseInspections()
    {
        $purchaseInspections = PurchaseInspection::orderBy('order')->get();

        return  InspectionResource::collection($purchaseInspections);
    }
}
