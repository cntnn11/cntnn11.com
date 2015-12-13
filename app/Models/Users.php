<?php

namespace App\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\GenericUser;

class Users extends _BaseModel implements AuthenticatableContract
{
	use EntrustUserTrait, Authenticatable;

	protected $table = 'users';

	protected $primaryKey = 'id';

	protected $fillable = ['id', 'user_login', 'password', 'user_nickname', 'user_email', 'user_url', 'user_registered', 'user_activation_key', 'user_status', 'display_name', ''];

	protected $hidden = ['remember_token'];

	public $incrementing = false;


}
