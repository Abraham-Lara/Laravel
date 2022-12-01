<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['user_id','post_id','nombre_chat','mensaje','titulo'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
   

    
}