<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //paginate 5 tane gönderiyor;
        $quizzes = Quiz::paginate(5);
        return view('Admin.Quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Ekleme Başarılı Oldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz =Quiz::find($id) ?? abort(404,'Veritabanın da Böyle Bir Quiz Yok'); // yoksa 404 hatası veriyor
        return view('Admin.Quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz =Quiz::find($id) ?? abort(404,'Veritabanın da Böyle Bir Quiz Yok'); // yoksa 404 hatası veriyor
        Quiz::where('id',$id)->first()->update($request->except(['_method','_token']));
        return redirect()->route('quizzes.index')->withSuccess('Güncelleme Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'Veritabanın da Böyle Bir Quiz Yok');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('İşlem Başarılı');
    }
}
