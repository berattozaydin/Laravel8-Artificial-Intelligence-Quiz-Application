<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sorular;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Quiz;
class SorularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //soru listeleme
//quiz bilgisiyle sorular gönderiliyor.
        $sorulars=Quiz::whereId($id)->with('sorulars')->first();
        return view('admin.sorular.list',compact('sorulars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz=Quiz::find($id);
        return view('Admin.sorular.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        if($request->hasFile('image_question')){
            $dosyaadi =Str::slug($request->question).'.'.$request->image_question->extension();
            $dosyayüklemeyeri='uploads/'.$dosyaadi;
            $request->image_question->move(public_path('uploads'),$dosyaadi);
            $request->merge(['image_question'=>$dosyayüklemeyeri]);
        }
        Quiz::find($id)->sorulars()->create($request->post());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id,$id)
    {
        return $quiz_id.'-'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id,$id)
    {
        $data=Quiz::find($quiz_id)->sorulars()->whereId($id)->first();
        return view('admin.sorular.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quiz_id,$id)
    {
        if($request->hasFile('image_question')){
            $dosyaadi =Str::slug($request->question).'.'.$request->image_question->extension();
            $dosyayüklemeyeri='uploads/'.$dosyaadi;
            $request->image_question->move(public_path('uploads'),$dosyaadi);
            $request->merge(['image_question'=>$dosyayüklemeyeri]);
        }
        $data = Quiz::find($quiz_id)->sorulars()->whereId($id)->first()->update($request->post());
        return redirect()->route('sorulars.index',$quiz_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
