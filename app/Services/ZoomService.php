<?php
namespace App\Services;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;

class ZoomService
{
    public function createMeeting($token, $data)
    {
        $client = new Client([
            'base_uri' => 'https://api.zoom.us/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $response = $client->post('users/me/meetings', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }
}
