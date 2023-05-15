<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use App\Services\Ads\Service;

class BaseController extends Controller
{
        public $service;

        public function __construct(Service $service)
        {
            $this->service = $service;
        }
}
