<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HealthStat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function storeHealthStats(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'depression' => 'required',
            'anxiety' => 'required',
            'stress' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }
        $key = $request->header('x-auth-token');
        if ($key != config('app.api_secret')) {
            return response()->json([
                'message' => 'Not Allowed to access',
            ], 401);
        } else {
            $hs = HealthStat::create([
                'user_id' => User::where('email', $request->email)->first()->id,
                'depression' => $request->depression,
                'anxiety' => $request->anxiety,
                'stress' => $request->stress,
            ]);
            return response()->json([
                'message' => 'Health Stats Added Successfully',
                'result' => $hs,
            ], 200);
        }
    }
}
