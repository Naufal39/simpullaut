<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinterlandTab extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'region',
        'tab_name',
        'content',
        'user_id'
    ];
}
