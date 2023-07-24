<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class InsulationController extends Controller
{
    public function calculateInsulation(Request $request) {
        // Optional validations from backend
        $validator = Validator::make($request->all(), [
            'length' => 'required|numeric|min:1',
            'width' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'rValue' => 'required|numeric|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->messages(),
            ]);
        }
        // Convert slope to radians
        $slopeRad = deg2rad($request->slope > 0 ? $request->slope : 0);

        // Calculate Attic Floor Area (sqft)
        $atticFloorArea = $request->length * $request->width;

        // Calculate Sloped Ceiling Area (sqft) if slope is provided
        $slopedCeilingArea = $request->slope > 0 ? ($request->length * cos($slopeRad) + $request->width * sin($slopeRad)) * $request->height : 0;

        // Calculate Total Insulation Area (sqft)
        $totalInsulationArea = $atticFloorArea + $slopedCeilingArea;

        // Calculate Insulation Volume (cubic feet)
        $insulationVolume = $totalInsulationArea * $request->rValue;

        return response()->json([
            'success' => true,
            'data' => $insulationVolume,
        ]);
    }
}
