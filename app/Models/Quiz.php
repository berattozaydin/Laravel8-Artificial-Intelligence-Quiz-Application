<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Quiz extends Model
{
    use HasFactory;
    use Sluggable;
     protected $fillable=['title','description','slug','finished_at','status'];
     public function sorulars(){
         return $this->hasMany('App\Models\Sorular');
     }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
