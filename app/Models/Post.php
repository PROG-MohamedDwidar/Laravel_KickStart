<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class post extends Model
{
    use SoftDeletes;
    use HasFactory;
    // protected $table = 'post';
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
// 'App\Models\User'