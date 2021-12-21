<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'exp',
        'field1',
        'field2',
        'field3',
        'field4',
        'field5',
        'overall',
        'from',
        'to',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'from');
    }
}
