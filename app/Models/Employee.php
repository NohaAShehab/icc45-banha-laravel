<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    #allow passing these key-value pairs
    protected $fillable=['name', 'email', 'gender', 'salary', 'image','department_id'];

    # by default laravel consider table name by default employees
    # you specify table name explicitly in model class.
//    protected $table='employees';

    function department(){
        # this emp belongs to one dept ???
        return $this->belongsTo(Department::class);
    }
}
