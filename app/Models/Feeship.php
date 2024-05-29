<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Wards;
use App\Models\City;
class Feeship extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'fee_matp', 'fee_maqh','fee_xaid', 'fee_feeship',
    ];
    public function city(){
        return $this->belongsTo(City::class, 'fee_matp', 'matp');
    }
    public function district(){
        return $this->belongsTo(District::class,'fee_maqh','maqh');
    }
    public function wards(){
        return $this->belongsTo(Wards::class,'fee_xaid','xaid');
    }

    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';
}
