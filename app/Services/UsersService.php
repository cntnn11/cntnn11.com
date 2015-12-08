<?php

namespace App\Services;

use App\Models\Users;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Log;

class UsersService extends Users
{
	public function add(array $data) {
		try {
			return parent::create($data);
		} catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
	}

	public function updateById($id, array $data) {
		try {
			return parent::updateById($id, $data);
		} catch (ModelNotFoundException $e) {
			Log::error($e->getMessage());
			return false;
		} catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
	}

	public function updateByCondition(array $condition, array $data) {
		try {
			return parent::updateByCondition($condition, $data);
		} catch (Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
	}

	// 根据用户名和密码获取用户信息
	public function getUInfo($username, $password)
	{
		$info	= false;
		if( !empty($username) && !empty($password) )
		{
			$info	= $this->where('user_status', 1)->where('user_login', $username)->where('password', $password)->first();
			$info	= empty($info) ? false : $info->toArray();
		}
		return $info;
	}


	protected static function rules()
	{
		return [
			'username'	=> 'required',
			'passwd'	=> 'required'
		];
	}
}
