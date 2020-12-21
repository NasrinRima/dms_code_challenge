<?php

namespace App\Models\BasicPart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'geo_district_id',
        'division_id',
        'name',
        'bn_name',
        'lat',
        'lon',
        'url'
    ];
}
