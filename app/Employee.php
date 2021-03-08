<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table='employees';

    public $id = 'id';

    public $timestamps = true;

    protected $fillable = [
       'id',
       'name',
       'email',
       'gender'

    ];

}
