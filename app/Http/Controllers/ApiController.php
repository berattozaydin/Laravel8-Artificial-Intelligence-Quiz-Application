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
       return response()->json(Quiz::where('status','publish')->paginate(5));
   }
    public function quiz_katil($slug){
       return response()->json($sinav=Quiz::whereSlug($slug)->with('sorulars')->first());

    }
   public function sorular($slug){
       return Quiz::whereSlug($slug)->with('sorulars')->first();
   }
}
