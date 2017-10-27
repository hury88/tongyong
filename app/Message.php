<?php

namespace App;

use Exception;
use App\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    public $timestamps = false;

    public function feedback(Array $data)
	{
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
		$this->type = 1;
		$this->ip = Request()->ip();
		$this->sendtime = time();
		return $this->save();
	}

}
