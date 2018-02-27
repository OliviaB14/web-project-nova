<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'client';

    public $timestamps = false;

    protected $connection = 'mysql';

    protected $guarded = ['id'];
}
