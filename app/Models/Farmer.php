<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Farmer extends Model
{
    use HasFactory;
    protected $table = 'Farmers';
    protected $fillable = ['name', 'location', 'land_size', 'phone_number', 'email', 'hashedPassword','updated_at','created_at', 'crop'];
    // public function sign_up($famerData){
    //         DB::insert($famerData);
    // }
}
