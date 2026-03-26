<?php

namespace Modules\TalentoHumano\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\Employee;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('talentohumano::contracts.index');
    }


    public function manageContract(): View
    {
        $contractId = session()->get('contractId');

        $contract = Contract::findOrFail($contractId);

        return view('talentohumano::contracts.manage-contract', compact('contract'));
    }
}
