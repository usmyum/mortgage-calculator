<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['loan_amount', 'annual_interest_rate', 'loan_term', 'extra_payment'];

    public function amortizationSchedules()
    {
        return $this->hasMany(LoanAmortizationSchedule::class);
    }

    public function extraRepaymentSchedules()
    {
        return $this->hasMany(ExtraRepaymentSchedule::class);
    }
}
