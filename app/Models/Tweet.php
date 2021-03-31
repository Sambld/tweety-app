<?php

namespace App\Models;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory , Likable;

    protected $fillable = ['user_id','body'];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }


}



