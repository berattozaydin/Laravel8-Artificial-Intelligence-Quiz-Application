<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Cevap;
use App\Models\Sonuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AnaController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index(){
        $quizzes=Quiz::where('status','publish')->paginate(5);
        return view('home.index',compact('quizzes'));
    }
    public function adminpanel(){
        return view('dashboard');
    }
    public function quiz_detay($slug){
        $quiz=Quiz::whereSlug($slug)->with('sonuc')->withCount('sorulars')->first();
        $userid = auth()->user()->sonuc;
        $quizsonuc = Quiz::with('sorulars')->whereSlug($slug)->first();
        $quizvarmi=0;
        if($quizsonuc->sonuc){
            $quizvarmi=1;
        }
         return view('home.quiz_detay',compact('quiz','userid','quizvarmi'));

    }
    public function quiz_katil($slug){
        $sinav=Quiz::whereSlug($slug)->with('sorulars')->first();
        return view('home.sinav',compact('sinav'));
    }
    public function quiz_sonuc(Request $request,$slug){
       $puanlar=0;
        $quiz = Quiz::with('sorulars')->whereSlug($slug)->first();
        $slugdegeri=$quiz->slug;
        foreach($quiz->sorulars as $sorucevap){
            $sorucevap->id.'-'.$sorucevap->correctanswer.'/'.$request->post($sorucevap->id).'<br>';
            Cevap::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$sorucevap->id,
                'cevap'=>$request->post($sorucevap->id)

            ]);

            if($sorucevap->correctanswer===$request->post($sorucevap->id)){
                $puanlar+=1;
            }

        }
    $puan=(100/count($quiz->sorulars))*$puanlar;
    $yanlis=count($quiz->sorulars)-$puanlar;
        Sonuc::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'puan'=>$puan,
            'dogru'=>$puanlar,
            'yanlis'=>$yanlis,
        ]);
        return redirect()->route('quiz.detay',[$quiz->slug]);

    }
}
