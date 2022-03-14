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
    public function quiz_sonuc($slug,$puanlar){
        $quiz = Quiz::with('sorulars')->whereSlug($slug)->first();
        $puan=(100/count($quiz->sorulars))*$puanlar;
        $yanlis=$puanlar-count($quiz->sorulars);
        Sonuc::create([
        'user_id'=>auth()->user()->id,
        'quiz_id'=>$quiz->id,
        'puan'=>$puan,
        'dogru'=>$puanlar,
        'yanlis'=>$yanlis,
]);
    }

    public function sorular($slug)
    {
        return Quiz::whereSlug($slug)->with('sorulars')->first();
    }
}
