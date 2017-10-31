<?php
namespace App\Http\Controllers\business;
use App\User;
use App\Helpers\File;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CertificateController extends controller
{
    /**
     * 证书管理
     */
    public function certificate($action = '', $id= '')
    {
        $table = __FUNCTION__;
        return $this->relatedToNewsCats($table, $action, $id);
    }
}
