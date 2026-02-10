<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class AuthController extends Controller
{

    protected $client;
    public function __construct(){
        $this->client = new Client();
    }
    
    public function register(Request $request)

   
    {

  
        // Validate form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

       

        try {

            // Send API Request
            // IMPORTANT: Verify '/api/register' is the correct route on your API server (port 8001)
            $response = $this->client->post('http://127.0.0.1:8001/api/register', [

                'headers' => [
                    'Accept' => 'application/json',
                ],

                'form_params' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'password_confirmation' => $request->password_confirmation,
                ]

            ]);

            $data = json_decode($response->getBody(), true);

            // Save token
            session([
                'token' => $data['token'],
                'user' => $data['user'],
            ]);

            // ✅ Redirect to login page after success
            return view('login')
                ->with('success', 'Registration successful. Please login.');

        } catch (\Exception $e) {
            return back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }


    public function login(Request $request)
{

    // dd("hwllo");
    // Validate input`
     $hello = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // dd($hello);
    
    

    try {

        // Send API request
        $response = $this->client->post('http://127.0.0.1:8001/api/login', [

            'headers' => [
                'Accept' => 'application/json',
            ],

            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
            ]

        ]);

        $data = json_decode($response->getBody(), true);

        // Store token & user
        session([
            'token' => $data['token'],
            'user' => $data['user'],
        ]);

        // Redirect to dashboard
        return view('dashboard')
                ->with('success', 'Login successful.');

    } catch (\Exception $e) {

        return back()->with('error', 'Invalid email or password.');
    }
}


    
}






