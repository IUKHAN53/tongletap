<?php

namespace App\Http\Controllers;

use App\Services\ZoomService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ZoomOAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('zoom')->redirect();
    }

    public function handleProviderCallback(ZoomService $zoomService): \Illuminate\Http\JsonResponse
    {
        $user = Socialite::driver('zoom')->stateless()->user();
        $token = $user->token;

        $data = [
            'topic' => 'My Meeting',
            'type' => 2,
            'start_time' => '2023-09-30T12:00:00Z',
            'duration' => 30,
        ];

        $meeting = $zoomService->createMeeting($token, $data);

        return response()->json([
            'meeting' => $meeting,
        ]);
    }
}
