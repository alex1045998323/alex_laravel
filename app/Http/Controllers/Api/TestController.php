<?php

namespace App\Http\Controllers\Api;
use App\Http\Services\Api\TestService;
use Illuminate\Http\Request;
class TestController extends \App\Http\Controllers\Common\BaseController
{
    public function __construct (TestService $Service)
    {
        $this->Service = $Service;
    }
}
