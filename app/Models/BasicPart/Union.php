<?php

namespace App\Models\BasicPart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    protected $table = 'unions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'geo_union_id',
        'upazilla_id',
        'name',
        'bn_name',
        'url'
    ];
}
