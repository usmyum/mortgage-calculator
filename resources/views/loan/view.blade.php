<a href="{{ route('loan.store') }}">Create Another Loan Setup</a>

<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Loan Details') }}</div>

                <div class="card-body">
                    <!-- Display Loan Data -->
                    <h5>Loan Information</h5>
                    <p>Loan Amount: {{ $loan->loan_amount }}</p>
                    <p>Annual Interest Rate: {{ $loan->annual_interest_rate }}</p>
                    <p>Loan Term (years): {{ $loan->loan_term }}</p>

                    <br>
                    <!-- Display Amortization Schedule -->
                    <h2>Amortization Schedule</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Month Number</th>
                            <th>Starting Balance</th>
                            <th>Monthly Payment</th>
                            <th>Principal Component</th>
                            <th>Interest Component</th>
                            <th>Ending Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($loan->amortizationSchedules as $schedule)
                            <tr>
                                <td>{{ $schedule->month_number }}</td>
                                <td>{{ $schedule->starting_balance }}</td>
                                <td>{{ $schedule->monthly_payment }}</td>
                                <td>{{ $schedule->principal_component }}</td>
                                <td>{{ $schedule->interest_component }}</td>
                                <td>{{ $schedule->ending_balance }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <br>
                    <!-- Display Extra Repayment Schedule -->
                    <h2>Extra Repayment Schedule</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Month Number</th>
                            <th>Starting Balance</th>
                            <th>Monthly Payment</th>
                            <th>Principal Component</th>
                            <th>Interest Component</th>
                            <th>Extra Repayment</th>
                            <th>Ending Balance</th>
                            <th>Remaining Loan Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($loan->extraRepaymentSchedules as $schedule)
                            <tr>
                                <td>{{ $schedule->month_number }}</td>
                                <td>{{ $schedule->starting_balance }}</td>
                                <td>{{ $schedule->monthly_payment }}</td>
                                <td>{{ $schedule->principal_component }}</td>
                                <td>{{ $schedule->interest_component }}</td>
                                <td>{{ $schedule->extra_repayment }}</td>
                                <td>{{ $schedule->ending_balance }}</td>
                                <td>{{ $schedule->remaining_loan_term }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
