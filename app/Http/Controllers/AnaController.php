<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class AnaController extends Controller
{
    public function index(){
        $quizzes=Quiz::where('status','publish')->paginate(5);
        return view('home.index',compact('quizzes'));
    }
    public function adminpanel(){
        return view('dashboard');
    }
    public function quiz_detay($slug){
         $quiz=Quiz::whereSlug($slug)->withCount('sorulars')->first();
         return view('home.quiz_detay',compact('quiz'));

    }
    public function quiz_katil($slug){
        $sinav=Quiz::whereSlug($slug)->with('sorulars')->first();
        return view('home.sinav',compact('sinav'));
    }
        public function quiz_sonuc(Request $request,$slug){
        return $request->post();
        }
}
