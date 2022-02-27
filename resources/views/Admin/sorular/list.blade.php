@php
    $setting = \App\Http\Controllers\Admin\SettingController::getsetting()
@endphp
<x-app-layout>
    <x-slot name="header">{{$sorulars->title}} Dersi Soruları</x-slot>
  <div class="card">
      <div class="card-body">
          <h5 class="card-title"><a href="{{route('sorulars.create',$sorulars->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Soru Oluştur</a></h5>
          <table class="table">
              <thead class="thead-dark">
              <tr>
                  <th scope="col" style="background-color:#0dcaf0">Soru</th>
                  @foreach($sorulars->sorulars as $sorular)
                      @if($sorular->image_question!==null)
                  <th scope="col" style="background-color:#0dcaf0">Resim</th>
                      @endif
                  @endforeach
                  <th scope="col" style="background-color:#0dcaf0">A</th>
                  <th scope="col" style="background-color:#0dcaf0">B</th>
                  <th scope="col" style="background-color:#0dcaf0">C</th>
                  <th scope="col" style="background-color:#0dcaf0">D</th>
                  <th scope="col" style="background-color:#0dcaf0">Doğru Şık</th>
                  <th scope="col" style="background-color:#0dcaf0">Ayarlar</th>
              </tr>
              </thead>
              <tbody>
              @foreach($sorulars->sorulars as $sorular)
                  <tr>
                      <th>{{$sorular->question}}</th>
                      @if($sorular->image_question!==null)
                      <th>{{$sorular->image_question}}</th>
                      @endif
                      <th>{{$sorular->answer1}}</th>
                      <th>{{$sorular->answer2}}</th>
                      <th>{{$sorular->answer3}}</th>
                      <th>{{$sorular->answer4}}</th>
                      <th>{{$sorular->correctanswer}}</th>

                      <td>

                          <a href="{{route('quizzes.edit',$sorular->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Düzenle</a>
                          <a href="{{route('quizzes.destroy',$sorular->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>Sil</a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
  </div>
</x-app-layout>
