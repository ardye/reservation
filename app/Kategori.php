<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idKategori';
    protected $fillable = ['namaKategori'];

    public function setNamaKategoriAttribute($namaKategori) {
    	$this->attributes['namaKategori'] = strtolower($namaKategori);
    }

    public function getNamaKategoriAttribute($namaKategori){
    	return ucwords($namaKategori);
    }

    public function menu() {
    	return $this->hasMany('App\Menu', 'idKategori');
    }
}
