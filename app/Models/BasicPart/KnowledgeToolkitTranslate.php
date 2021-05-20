<?php

namespace App\Models\BasicPart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KnowledgeToolkitTranslate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "knowledge_toolkit_translates";
    protected $fillable = [
        'ntkit_id','lang_key','title','content','thumb_image','cover_image','audio','video','files'
    ];

}
