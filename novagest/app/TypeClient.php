<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClient extends Model
{

    protected $table = 'type_client';

    public $timestamps = false;

    protected $connection = 'mysql';

    protected $guarded = ['id'];
}
