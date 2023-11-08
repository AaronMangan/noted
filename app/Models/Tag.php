<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id', 'search'];
    protected $visible = ['name', 'description', 'user_id', 'search', 'created_at', 'updated_at'];

}