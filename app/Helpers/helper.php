<?php

use App\Services\ZoomService;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

/**
 * @throws TwilioException
 * @throws ConfigurationException
 */
function sendWhatsappMessage($number, $text): \Illuminate\Http\JsonResponse
{
    $sid = config('twilio.sid');
    $token = config('twilio.token');
    $twilioNumber = config('twilio.whatsapp_number');

    $client = new Client($sid, $token);

    $message = $client->messages->create(
        "whatsapp:$number",
        [
            'from' => "whatsapp:$twilioNumber",
            'body' => $text
        ]
    );
    return response()->json([
        'message' => 'Message sent!'
    ]);
}


function createZoomMeeting(ZoomService $zoomService, $title, $start_time, $duration, $agenda = ""): \Illuminate\Http\JsonResponse
{
    $data = [
        'title' => $title,
        'type' => 2,
        'start_time' => toZoomTimeFormat($start_time),
        'duration' => $duration,
        'agenda' => (!empty($agenda)) ? $agenda : null,
        'timezone' => config('app.timezone'),
    ];

    $meeting = $zoomService->createMeeting($data);

    return response()->json([
        'meeting' => $meeting,
    ]);
}

function toZoomTimeFormat(string $dateTime): string
{
    try {
        $date = new \DateTime($dateTime);

        return $date->format('Y-m-d\TH:i:s');
    } catch (\Exception $e) {
        Log::error('ZoomJWT->toZoomTimeFormat : '.$e->getMessage());
        return '';
    }
}