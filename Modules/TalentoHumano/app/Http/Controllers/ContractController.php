<?php

namespace Modules\TalentoHumano\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Modules\TalentoHumano\App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('talentohumano::contracts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function manageContract(): View
    {
        $contractId = session()->get('contractId');

        $contract = Contract::findOrFail($contractId);

        return view('talentohumano::contracts.manage-contract', compact('contract'));
    }

    /**
     * Show the form for generating PDF the contract.
     */
    public function showContract(Contract $contract)
    {
        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('talentohumano::Pdf.Contracts.' . $contract->format->value, [
            'contract' => $contract
        ]);
        $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled'      => true,  // Para logos desde URL
                'defaultFont'          => 'Arial',
                'dpi'                  => 150,
                'defaultPaperMargins'  => [0, 0, 0, 0]
            ])->setPaper('letter', 'portrait');
        return $pdf->stream();
    }
}
