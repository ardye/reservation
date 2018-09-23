<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'idEvent';
    protected $fillable = ['namaEvent', 'deskEvent', 'tanggalMulai', 'tanggalSelesai','gambar'];
    protected $dates = ['tanggalMulai', 'tanggalSelesai'];

   	public function setNamaEventAttribute($namaEvent) {
    	$this->attributes['namaEvent'] = strtolower($namaEvent);
    }

    public function getNamaEventAttribute($namaEvent){
    	return ucwords($namaEvent);
    }
}
