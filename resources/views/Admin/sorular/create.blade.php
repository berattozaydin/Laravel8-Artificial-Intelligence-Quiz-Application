<x-app-layout>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('sorulars.store',$quiz->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" id="question"> </textarea>
                </div>
                <div class="form-group">
                    <label>Resim Ekle</label>
                   <input type="file" name="image_question" class="form-control" rows="4" >
                </div>
                <div class="row">
                    <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputPassword1">A Şıkkı</label>
                    <textarea name="a" id="answer1" cols="5" rows="5"></textarea>
                </div>
                    </div>
                    <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputPassword1">B Şıkkı</label>
                    <textarea name="b" id="answer2" cols="5" rows="5"></textarea>
                </div>
                </div>
                    <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputPassword1">C Şıkkı</label>
                   <textarea name="c" id="answer3" cols="5" rows="5"></textarea>
                </div>
                    </div>
                    <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputPassword1">D Şıkkı</label>
                    <textarea name="d" id="answer4" cols="5" rows="5"></textarea>
                </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Doğru Cevap</label>
                        <input type="text" name="correctanswer">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block" >Kaydet</button>
                </div>
            </form>
            <script>
                CKEDITOR.replace( 'question' );
                CKEDITOR.replace( 'answer1' );
                CKEDITOR.replace( 'answer2' );
                CKEDITOR.replace( 'answer3' );
                CKEDITOR.replace( 'answer4' );
            </script>
        </div>
    </div>
</x-app-layout>
