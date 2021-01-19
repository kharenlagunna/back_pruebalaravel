<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'Departments';
    protected $primaryKey = 'id';
    protected $fillable = ['department','code', 'country_id'];
}
