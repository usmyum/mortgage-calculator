<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\LoanAmortizationSchedule;
use App\Models\ExtraRepaymentSchedule;
use Illuminate\Support\Facades\DB;

class MortgageCalculatorService
{
    /**
     * this function generates and stores amortization and repayment schedules for loans
     *
     * @param int $loanId
     * @param array $loanDetails
     * @return array
     */
    public function calculateLoan(int $loanId, array $loanDetails): array
    {
        $monthlyPayment = $this->calculateMonthlyPayment($loanDetails);
        $amortizationSchedule = $this->generateAmortizationSchedule($loanId, $loanDetails, $monthlyPayment);
        $repaymentSchedule = $this->generateRepaymentSchedule($loanId, $monthlyPayment);

        return [
            'monthly_payment' => $monthlyPayment,
            'amortization_schedule' => $amortizationSchedule,
            'repayment_schedule' => $repaymentSchedule,
        ];
    }

    /**
     * @param array $loanDetails
     * @return float|int
     */
    public function calculateMonthlyPayment(array $loanDetails): float|int
    {
        // Calculate monthly interest rate
        $monthlyInterestRate = ($loanDetails['annual_interest_rate'] / 12) / 100;

        // Calculate the number of months
        $numberOfMonths = $loanDetails['loan_term'] * 12;

        // Calculate the denominator part of the formula
        $denominator = 1 - pow(1 + $monthlyInterestRate, -$numberOfMonths);

        // Calculate the monthly payment
        return ($loanDetails['loan_amount'] * $monthlyInterestRate) / $denominator;
    }

    /**
     * @param int $loanId
     * @param array $loanDetails
     * @param float $monthlyPayment
     * @return array
     */
    public function generateAmortizationSchedule(int $loanId, array $loanDetails, float $monthlyPayment): array
    {
        $loanAmount = $loanDetails['loan_amount'];
        $annualInterestRate = $loanDetails['annual_interest_rate'] / 100; // Convert to decimal
        $loanTermMonths = $loanDetails['loan_term'] * 12;

        $monthlyInterestRate = $annualInterestRate / 12;
        $remainingLoanBalance = $loanAmount;
        $amortizationSchedule = [];

        foreach (range(1, $loanTermMonths) as $month) {
            $interestPayment = $remainingLoanBalance * $monthlyInterestRate;
            $principalPayment = $monthlyPayment - $interestPayment;
            $endingBalance = $remainingLoanBalance - $principalPayment;

            $scheduleData = [
                'loan_id' => $loanId,
                'month_number' => $month,
                'starting_balance' => $remainingLoanBalance,
                'monthly_payment' => $monthlyPayment,
                'principal_component' => $principalPayment,
                'interest_component' => $interestPayment,
                'ending_balance' => $endingBalance,
            ];

            $amortizationSchedule[] = $scheduleData;
            $remainingLoanBalance = $endingBalance;
        }

        LoanAmortizationSchedule::insert($amortizationSchedule);

        return $amortizationSchedule;
    }

    /**
     * @param int $loanId
     * @param float $extraRepaymentAmount
     * @return array
     */
    public function generateRepaymentSchedule(int $loanId, float $extraRepaymentAmount): array
    {
        $loan = Loan::findOrFail($loanId);
        $monthlyPayment = $this->calculateMonthlyPayment([
            'loan_amount' => $loan->loan_amount,
            'annual_interest_rate' => $loan->annual_interest_rate,
            'loan_term' => $loan->loan_term,
        ]);

        $remainingBalance = $loan->loan_amount;
        $updatedSchedules = [];

        foreach (range(1, $loan->loan_term * 12) as $month) {
            $interestPayment = $remainingBalance * ($loan->annual_interest_rate / 12) / 100;
            $principalPayment = $monthlyPayment - $interestPayment;
            $extraRepayment = min($extraRepaymentAmount, $remainingBalance);

            $endingBalance = $remainingBalance - ($principalPayment + $extraRepayment);
            $remainingBalance = $endingBalance;

            $updatedSchedules[] = [
                'loan_id' => $loanId,
                'month_number' => $month,
                'starting_balance' => $remainingBalance + ($principalPayment + $extraRepayment),
                'monthly_payment' => $monthlyPayment,
                'principal_component' => $principalPayment,
                'interest_component' => $interestPayment,
                'extra_repayment' => $extraRepayment,
                'ending_balance' => $endingBalance,
                'remaining_loan_term' => ($loan->loan_term * 12) - $month,
            ];
        }

        ExtraRepaymentSchedule::insert($updatedSchedules);

        return $updatedSchedules;
    }
}
