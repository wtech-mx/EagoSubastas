<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitaciones extends Model
{
    protected $table = "invitaciones";
    protected $primarykey = "id";

    public $timestamps = false;

    protected $fillable = [
        'auction_id',
    	'name',
    	'email',
    ];

    protected $guarded=[

    ];
}

