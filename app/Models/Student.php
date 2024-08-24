<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'grade', 'email', 'gender', 'image','creator_id'];

    function creator(){
        return $this->belongsTo(User::class);
    }
}
