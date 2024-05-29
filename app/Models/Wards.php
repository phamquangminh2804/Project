<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Wards extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_wards', 'type', 'maqh'
    ];
    protected $primaryKey = 'xaid';
 	protected $table = 'tbl_xaphuongthitran';
}
