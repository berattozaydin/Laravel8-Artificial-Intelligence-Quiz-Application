@php
    $setting = \App\Http\Controllers\Admin\SettingController::getsetting()
@endphp
<x-app-layout>
    <x-slot name="header">Admin Panel</x-slot>
  <div class="card">
      <div class="card-body">
          <h5 class="card-title"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Quiz Oluştur</a></h5>
          <table class="table">
              <thead class="thead-dark">
              <tr>
                  <th scope="col" style="background-color:#0dcaf0"> Quiz</th>
                  <th scope="col" style="background-color:#0dcaf0">Durum</th>
                  <th scope="col" style="background-color:#0dcaf0">Bitiş Tarihi</th>
                  <th scope="col" style="background-color:#0dcaf0"> İşlemler</th>
              </tr>
              </thead>
              <tbody>
              @foreach($quizzes as $quiz)
              <tr>
                  <th>{{$quiz->title}}</th>
                  <td>{{$quiz->status}}</td>
                  <td>{{$quiz->finished_at}}</td>
                  <td>

                      <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Düzenle</a>
                      <a href="{{route('sorulars.index',$quiz->id)}}" class="btn btn-sm btn-Question"><i class="fa fa-edit"></i>Sorular</a>
                      <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>Sil</a>
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          {{$quizzes->links()}}
      </div>
  </div>
</x-app-layout>
