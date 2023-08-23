<?php

namespace App\Services;

use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoanService
{

    protected $mortgageCalculatorService;

    public function __construct(MortgageCalculatorService $mortgageCalculatorService)
    {
        $this->mortgageCalculatorService = $mortgageCalculatorService;
    }

    /**
     * @param int $id
     * @return Loan
     */
    public function show(int $id): Loan
    {
        return Loan::with('amortizationSchedules', 'extraRepaymentSchedules')->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Loan
     */
    public function store(array $data): Loan
    {
        return DB::transaction(function () use ($data) {
            $loanData = Loan::create($data);
            $mortgageCalculation = $this->mortgageCalculatorService->calculateLoan($loanData->id, $data);

            $loanData->load('amortizationSchedules', 'extraRepaymentSchedules');
            return $loanData;
        });
    }

    /**
     * @param int $id
     * @param array $newData
     * @return string
     */
    public function update(int $id, array $newData): Loan
    {
        $loan = Loan::findOrFail($id);
        $loan->update($newData);

        return $loan;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return true;
    }
}
