<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'idMenu';
    protected $fillable = ['namaMenu', 'deskMenu', 'rating', 'harga', 'gambar','idKategori'];

   	public function setNamaMenuAttribute($namaMenu) {
    	$this->attributes['namaMenu'] = strtolower($namaMenu);
    }

    public function getNamaMenuAttribute($namaMenu){
    	return ucwords($namaMenu);
    }

    public function kategori() {
    	return $this->belongsTo('App\Kategori', 'idKategori');
    }

    public function user() {
        return $this->belongsToMany('App\User', 'review', 'idMenu', 'idUser')->withPivot('review','rating', 'idReview');
    }
}
