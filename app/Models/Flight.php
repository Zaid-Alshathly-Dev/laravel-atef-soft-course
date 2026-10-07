<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CreateFlightsFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'flights';
    protected $fillable = ['name', 'created_at'];

    // أضف هذه الدالة هنا ليعرف لارفيل الفاكتوري المخصص
    protected static function newFactory()
    {
        return CreateFlightsFactory::new();
    }

    public function scopeActive($query){

    return $query->where('active',1);

    }


    public function destinations()
    {
        return $this->hasOne(flight_destination::class);
    }


    public function booking()
    {
        return $this->hasMany(flight_booking::class,'flight_id');
    }
}