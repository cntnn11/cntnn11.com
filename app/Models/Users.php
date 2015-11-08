<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends _BaseModel
{

	protected $table = 'users';

	protected $fillable = ['id', 'user_login', 'user_pass', 'user_nickname', 'user_email', 'user_url', 'user_registered', 'user_activation_key', 'user_status', 'display_name', ''];
}
