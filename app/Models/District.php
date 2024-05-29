<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_district', 'type', 'matp'
    ];
    protected $primaryKey = 'maqh';
 	protected $table = 'tbl_quanhuyen';
}
