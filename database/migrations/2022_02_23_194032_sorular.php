<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorulars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');//quiz id kesinlikle doğru olmak zorunda.
            $table->longText('question');
            $table->longText('image_question')->nullable();//quiz resimli olabilir ama biz bunu null atıyoruz resim olmasına gerek yok ama sorusu olmak zorunda
            //sorular 4 şıklı
            $table->longText('a');
            $table->longText('b');
            $table->longText('c');
            $table->longText('d');
            $table->enum('correctanswer',['a','b','c','d']);//4ünden 1 ni alır enum olduğundan
            $table->timestamps();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');//quizler tablosuyla sorular tablosunu bağlıyoruz quiz idleri birbirine;
            //cascade eğer quizi silersek onun içindeki sorularıda siliyor.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorular');
    }
};
