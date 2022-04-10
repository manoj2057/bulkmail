<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'slug',
        'parent_id',
        'status'
    ];
    public static function getCategory(){
        $records = DB::table('categories')->select('id', 'category_name', 'slug')->get()->toArray();
        return $records;
    }
}
