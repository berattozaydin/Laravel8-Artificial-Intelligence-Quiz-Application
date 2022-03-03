@php
    $setting = \App\Http\Controllers\Admin\SettingController::getsetting()
@endphp
<x-app-layout>
    <x-slot name="header">{{$sorulars->title}} Dersi Soruları</x-slot>
  <div class="card">
      <div class="card-body">
          <h5 class="card-title"><a href="{{route('sorulars.create',$sorulars->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Soru Oluştur</a></h5>
          <table class="table">

              <tr>
                  <th scope="col" style="background-color:#0dcaf0">Soru</th>
                  <th scope="col" style="background-color:#0dcaf0">Resim</th>
                  <th scope="col" style="background-color:#0dcaf0">A Şıkkı</th>
                  <th scope="col" style="background-color:#0dcaf0">B Şıkkı</th>
                  <th scope="col" style="background-color:#0dcaf0">C Şıkkı</th>
                  <th scope="col" style="background-color:#0dcaf0">D Şıkkı</th>
                  <th scope="col" style="background-color:#0dcaf0">Doğru Şık</th>
                  <th scope="col" style="background-color:#0dcaf0">Ayarlar</th>
              </tr>

              <tbody>
              @foreach($sorulars->sorulars as $sorular)
                  <tr>
                      <td>{!! $sorular->question!!}</td>
                      @if($sorular->image_question)
                          <td><img src="{{asset($sorular->image_question)}}" style="height: 50px;width: 50px;"></td>
                      @endif
                      @if($sorular->image_question==null)
                      <td>Resim Yok</td>
                      @endif
                      <td>{!! $sorular->a !!} </td>
                      <td>{!!  $sorular->b !!} </td>
                      <td>{!! $sorular->c !!}</td>
                      <td>{!! $sorular->d !!}</td>
                      <td>{!! $sorular->correctanswer !!}</td>

                      <td>

                          <a href="{{route('sorulars.edit',[$sorular->quiz_id,$sorular->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Düzenle</a>
                          <a href="{{route('sorulars.destroy',[$sorular->quiz_id,$sorular->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Sil</a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
  </div>
</x-app-layout>
