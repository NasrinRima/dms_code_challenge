<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ShoppingCartInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "shopping_cart_info";
    protected $fillable = [
        'user_id','book_id'
    ];

}
