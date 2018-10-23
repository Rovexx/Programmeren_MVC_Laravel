<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    // table name
    protected $table = 'occasions';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = false;
}
