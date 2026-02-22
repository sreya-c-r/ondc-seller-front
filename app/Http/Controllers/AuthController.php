<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class AuthController extends Controller
{

    protected $client;
    public function __construct()
    {
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
            return redirect()->route('login')
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

        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseData = json_decode($responseBodyAsString, true);
            $errorMessage = $responseData['message'] ?? 'Invalid email or password.';

            return back()->with('error', $errorMessage);

        } catch (\Exception $e) {

            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }





    public function logout(Request $request)
    {
        try {
            // Optional: Call API to invalidate token
            // Assuming the API has a logout endpoint that accepts the token
            $token = session('token');
            if ($token) {
                $this->client->post('http://127.0.0.1:8001/api/logout', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                    ],
                ]);
            }
        } catch (\Exception $e) {
            // Ignore API errors during logout
        }

        // Flush session
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function forgotpw(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            // Send API Request
            $response = $this->client->post('http://127.0.0.1:8001/api/forgot-password', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    'email' => $request->email,
                ]
            ]);

            return back()->with('success', 'Password reset link sent to your email.');

        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseData = json_decode($responseBodyAsString, true);
            $errorMessage = $responseData['message'] ?? 'Failed to send reset link.';

            if (isset($responseData['errors']) && is_array($responseData['errors'])) {
                foreach ($responseData['errors'] as $fieldErrors) {
                    if (is_array($fieldErrors)) {
                        $errorMessage .= ' ' . implode(' ', $fieldErrors);
                    } else {
                        $errorMessage .= ' ' . $fieldErrors;
                    }
                }
            }

            return back()->with('error', $errorMessage);

        } catch (\Exception $e) {
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }

    }
}






