<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Sonuc;
use App\Models\Sorular;
USE App\Models\User;
class ApiController extends Controller
{
   public function liste(){
       return Quiz::where('status','publish')->paginate(5);
   }
   public function sorular($slug){
       return Quiz::whereSlug($slug)->with('sorulars')->first();
   }
}
