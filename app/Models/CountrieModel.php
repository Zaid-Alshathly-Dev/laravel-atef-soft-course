<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountrieModel extends Model
{
    protected $table = '_countries';
    protected $fillable = ['name', 'created_at','updated_at','active'];
}
