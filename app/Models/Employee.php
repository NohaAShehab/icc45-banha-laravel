<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    # by default laravel consider table name by default employees
    # you specify table name explicitly in model class.
//    protected $table='employees';
}
