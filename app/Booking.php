<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $table = 'booking';
    protected $primaryKey = 'idBooking';
    protected $fillable = ['idUser', 'waktu', 'jumlah','pesan', 'jenis', 'status'];
    //	protected $dates = ['waktu'];

    public function user() {
    	return $this->belongsTo('App\User', 'idUser');
    }
}
