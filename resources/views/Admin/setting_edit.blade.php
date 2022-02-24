@php
    $setting = \App\Http\Controllers\Admin\SettingController::getsetting()
@endphp
<x-app-layout>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <x-slot name="header">Site Ayarları</x-slot>
    <form action="{{route('admin_setting_update')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" id="first-name" name="id" value="{{$data->id}}" class="form-control col-md-7 col-xs-12">
        <div class="form-group">
            <label for="exampleInputEmail1">Email Adresi</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Site Başlığı</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="title" value="{{$data->title}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Site Açıklaması</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{$data->description}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Sitenin Kurucusu </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="company" value="{{$data->company}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Facebook Adresi</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="facebook" value="{{$data->facebook}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">İnstagram Adresi</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="instagram" value="{{$data->instagram}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Twitter Adresi</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="twitter" value="{{$data->twitter}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Hakkında</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="aboutus" id="aboutus" cols="30" rows="10">{!! $data->aboutus !!}</textarea>
                <script>
                    CKEDITOR.replace( 'aboutus' );
                </script>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Referanslar</label>
            <textarea name="references" id="references" cols="30" rows="10">{!! $data->references !!}</textarea>
            <script>
                CKEDITOR.replace( 'references' );
            </script>
        </div>
        <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
    </form>
    <script>
        CKEDITOR.replace( 'aboutus' );
        CKEDITOR.replace( 'references' );
    </script>
</x-app-layout>
