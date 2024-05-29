<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_user_id',  'provider',  'user'
    ];
 
    protected $primaryKey = 'user_id';
 	protected $table = 'tbl_social';
 	
 	public function login(){
 		return $this->belongsTo('App\Login', 'user');
 	}

}
