<?php

namespace App\Http\Controllers\Library\Admin;

use App\Http\Controllers\Library\BaseController as MainBaseController;

/**
 * AdminBaseController
 */
abstract class AdminBaseController extends MainBaseController
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }

}
