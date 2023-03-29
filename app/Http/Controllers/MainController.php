<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){
        return view('welcome');
    }
    function main(){
        return view('main');
    }

    // sends data to the flask app containing the model
    function handle($famerData){
            // Convert the data to JSON
            $jsonData = json_encode($famerData);

            // Send a POST request to the Flask app
            $client = new Client();
            $response = $client->post('http://localhost:5000/process-data', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $jsonData,
            ]);

            // Get the response status code
            $statusCode = $response->getStatusCode();

            // Return a response to the client
            return response()->json(['message' => 'Data sent to Flask app.']);
        
    }

    function sign_up(Request $request){
        
        $name = $request->input('name');
        $location = $request->input('location');
        $land_size = $request->input('land_size');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $password = $request->input('password');

        $famerData = [
            'name' => $name,
            'location' => $location,
            'land_size' => $land_size,
            'phone_number' => $phone_number,
            'email' => $email,
            'hashedPassword' => Hash::make($password),
            'crop' => ''
        ];

        $to_model = $this->handle($famerData);


        if($to_model){
            $farmerModel = new Farmer();
            //$farmerModel->sign_up($famerData);
            $farmerModel->create($famerData);

            return redirect()->route('main')->with('success', 'Form submitted successfully.');
        }
        

        // if($to_model){
        //     $farmerModel = new Farmer();
        //     //$farmerModel->sign_up($famerData);
        //     $farmerModel->create($famerData);

        //     return redirect()->route('main')->with('success', 'Form submitted successfully.');
        // }else{
        //     return redirect()->back()->with('fail', 'Form not submitted.');
        // }
    }

}
