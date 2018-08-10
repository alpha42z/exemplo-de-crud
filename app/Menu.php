<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name_pt','name_en','name_cn', 'link', 'position', 'parent_id'];
}