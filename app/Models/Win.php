<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Win extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type_id', 'value', 'status'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function prize()
    {
        return $this->belongsTo(PrizeObject::class, 'value', 'id');
    }

}
