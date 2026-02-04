<?php

namespace Modules\TalentoHumano\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('talentohumano::employee.index');
    }
}
