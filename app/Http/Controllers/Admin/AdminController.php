<?php

namespace App\Http\Controllers\Admin;
use App\Http\Services\Admin\AdminService;
use Illuminate\Http\Request;
class AdminController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (AdminService $Service)
    {
        $this->Service = $Service;
    }
}
