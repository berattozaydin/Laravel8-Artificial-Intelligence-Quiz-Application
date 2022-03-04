<x-app-layout>
    <x-slot name="header">
Anasayfa
    </x-slot>
   Quize Giren Öğrencilerin Sonuçları (100 Puanlık Sistem Üzerinden)
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Ad Soyad</th>
            <th scope="col">Aldığı Puan</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quiz->sonuclar as $sinav)
        <tr>
            <th scope="row">{{$sinav->user->name}}</th>
            <td>{{$sinav->puan}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</x-app-layout>
