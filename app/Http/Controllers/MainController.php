<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
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

    function handle($famerData){
        $filePath = '/home/grrhrwh/PycharmProjects/pythonProject1/main.py';
        $command = "python {$filePath} {$famerData}";
        exec($command, $output);
        $response = implode("\n", $output);
        return $response;
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

        $farmerModel = new Farmer();
        //$farmerModel->sign_up($famerData);
        $farmerModel->create($famerData);

        $to_model = $this->handle($famerData);

        if($to_model){
            return redirect()->route('main')->with('success', 'Form submitted successfully.');
        }else{
            return redirect()->back()->with('success', 'Form submitted successfully.');
        }
    }

}
