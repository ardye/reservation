<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'idReview';
    protected $fillable = ['idUser', 'review', 'rating', 'idMenu'];
}
