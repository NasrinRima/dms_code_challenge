<?php

namespace App\Models\BasicPart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    use HasFactory;

    protected $table = 'upazillas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'geo_upazilla_id',
        'district_id',
        'name',
        'bn_name',
        'url'
    ];
}
