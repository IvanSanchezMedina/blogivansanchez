<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
       'id',
       'titulo',
       'descripcion',
       'id_autor',
    ];

    public function autor() {
        return $this->belongsTo('App\User','id_autor');
    }
    
    public function comments() {
        return $this->hasMany('App\Comments','id_post');
    }

    // public function facturas() {
    //     return $this->hasOne('App\Models\Facturas','id_adquisicion');
    // }
}
