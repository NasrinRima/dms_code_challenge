<?php

namespace App\Models\BasicPart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KnowledgeToolkit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "knowledge_toolkits";
    protected $fillable = [
        'category_id','order','status','created_by','updated_by'
    ];

    public function getKnowledheToolkitTranslateAll(){
        return $this->hasMany(KnowledgeToolkitTranslate::class, 'ntkit_id', 'id');
    }

    public function getKnowledheToolkitTranslate(){
        return $this->hasOne(KnowledgeToolkitTranslate::class, 'ntkit_id', 'id')->where('lang_key',app()->getLocale());
    }
    public function getCategoryName(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
