<?php

namespace Modules\TalentoHumano\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\TalentoHumano\App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('talentohumano::employee.index');
    }


    public function manageProfile(): View
    {
        $employeeId = session()->get('employeeId');

        // $employee = Employee::findOrFail($employeeId)->toArray();
        $employee = Employee::findOrFail($employeeId);

        return view('talentohumano::employee.manage-profile', compact('employee'));
    }
}
