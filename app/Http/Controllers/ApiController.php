<?php

namespace App\Http\Controllers;

use App\Models\Cevap;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Sonuc;
use App\Models\Sorular;
USE App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ApiController extends Controller
{
    public function liste()
    {
        return response()->json(Quiz::where('status', 'publish')->paginate(5));
    }

    public function quiz_katil($slug)
    {
        return response()->json(Quiz::whereSlug($slug)->with('sorulars')->first());

    }
   /* public function liste_user(Request $request,$slug){
        $quiz = Quiz::with('sorulars')->whereSlug($slug)->first();
        Sonuc::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'puan'=>$request->puan,
            'dogru'=>$request->dogru,
            'yanlis'=>$request->yanlis,
        ]);
    }*/
   public function quiz_sonuc(Request $request){
        $quiz = Quiz::with('sorulars')->whereSlug($request->slug)->first();
       $puan=(100/count($quiz->sorulars))*$request->dogrusayisi;
        $yanlis=count($quiz->sorulars)-$request->dogrusayisi;

       $result= Sonuc::create([
        'user_id'=>auth()->user()->id,
        'quiz_id'=>$quiz->id,
        'puan'=>$puan,
        'dogru'=>$request->dogrusayisi,
        'yanlis'=>$yanlis,
]);
       return $result;
    }

    public function sorular($slug)
    {
        return Quiz::whereSlug($slug)->with('sorulars')->first();
    }
}
