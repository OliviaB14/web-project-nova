<?php

/*namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{

    protected $table = 'utilisateur';

    public $timestamps = false;
}
*/

namespace App;


use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Utilisateur extends \Eloquent implements Authenticatable
{
	use AuthenticableTrait;
	protected $table = 'utilisateur';

    public $timestamps = false;
}