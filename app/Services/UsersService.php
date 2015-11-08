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
}
