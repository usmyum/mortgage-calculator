<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Services\LoanService;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index()
    {
        return view('loan.form');
    }

    public function show(Request $request, int $id)
    {
        $data = $this->loanService->show($id);

        return view('loan.view')->with('loan', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:0',
            'annual_interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|integer|min:1',
            'extra_payment' => 'nullable|numeric|min:0'
        ]);

        $loanDetails = $request->only(['loan_amount', 'annual_interest_rate', 'loan_term', 'extra_payment']);

        $data = $this->loanService->store($loanDetails);

        return view('loan.view')->with('loan', $data);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:0',
            'annual_interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|integer|min:1',
            'extra_payment' => 'nullable|numeric|min:0',
        ]);

        $data = $this->loanService->update($id, $request->all());

        return view('loan.view')->with('loan', $data);
    }

    /**
     * this is the f
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function calculateLoan(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:0',
            'annual_interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|integer|min:1',
            'extra_payment' => 'nullable|numeric|min:0',
        ]);

        $loanDetails = [
            'loan_amount' => $request->input('loan_amount'),
            'annual_interest_rate' => $request->input('annual_interest_rate'),
            'loan_term' => $request->input('loan_term'),
            'extra_payment' => $request->input('extra_payment'),
        ];

        $data = $this->loanService->save($loanDetails);

        return view('loan.result', ['data' => $data]);
    }

    public function delete(Request $request, int $id): bool
    {
        $data = $this->loanService->delete($id);

        return true;
    }
}
