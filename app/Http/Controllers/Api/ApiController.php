<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InspectionResource;
use App\Http\Resources\TutorialDetailResource;
use App\Http\Resources\TutorialListResource;
use App\Models\Inspection;
use App\Models\PurchaseInspection;
use App\Models\Tutorial;
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

    public function tutorials()
    {
        $tutorials = Tutorial::orderBy('order')->get();

        return TutorialListResource::collection($tutorials);
    }

    public function showTutorial(Tutorial $tutorial)
    {
        return new TutorialDetailResource($tutorial);
    }
}
