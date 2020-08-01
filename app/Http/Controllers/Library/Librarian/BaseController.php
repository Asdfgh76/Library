<?php

namespace App\Http\Controllers\Library\Librarian;

use App\Http\Controllers\Controller;

/**
 * BaseController
 */
class BaseController extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

}
