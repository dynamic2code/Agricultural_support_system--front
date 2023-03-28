<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function main(){
        return view('main');
    }

    public function sign_up(Request $request){
        
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

        return redirect()->route('main')->with('success', 'Form submitted successfully.');
    }
}
