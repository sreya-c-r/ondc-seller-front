<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PlanController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        try {
            $response = $this->client->get('http://127.0.0.1:8001/api/getallplans', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $plans = json_decode($response->getBody(), true);

            return view('plans', compact('plans'));

        } catch (\Exception $e) {
            // Log the error or handle it as needed
            // For now, return the view with an empty plans array or handle error message
            return view('plans', ['plans' => [], 'error' => 'Could not fetch plans: ' . $e->getMessage()]);
        }
    }
}
