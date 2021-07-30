<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
       'id',
       'descripcion',
       'id_post',
       'id_autor',
    ];

    public function post() {
        return $this->belongsTo('App\Post','id_post');
    }
    public function autor() {
        return $this->belongsTo('App\User','id_autor');
    }

}
