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
            'depressionScore' => 'required',
            'depressionPercentage' => 'required',
            'depressionStatus' => 'required',
            'anxietyPercentage' => 'required',
            'anxietyStatus' => 'required',
            'anxietyScore' => 'required',
            'stressPercentage' => 'required',
            'stressStatus' => 'required',
            'stressScore' => 'required',
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
            $user = User::where('email', $request->email)->first();
            if($user){
                $hs = HealthStat::create([
                    'user_id' => User::where('email', $request->email)->first()->id,
                    'depressionScore' => $request->depressionScore,
                    'anxietyScore' => $request->anxietyScore,
                    'stressScore' => $request->stressScore,
                    'depressionPercentage' => $request->depressionPercentage,
                    'depressionStatus' => $request->depressionStatus,
                    'anxietyPercentage' => $request->anxietyPercentage,
                    'anxietyStatus' => $request->anxietyStatus,
                    'stressPercentage' => $request->stressPercentage,
                    'stressStatus' => $request->stressStatus,
                ]);
                return response()->json([
                    'message' => 'Health Stats Added Successfully',
                    'result' => $hs,
                ], 200);
            }else{
                return response()->json([
                    'message' => 'User Not Found with email entered',
                ], 404);
            }

        }
    }
}
