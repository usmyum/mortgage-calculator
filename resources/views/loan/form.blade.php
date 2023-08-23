<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>
                        {{ __('Loan Details') }}</h2></div>
                <br>

                <div class="card-body">
                    <form method="POST" action="{{ route('loan.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="loan_amount"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Loan Amount') }}</label>
                            <div class="col-md-6">
                                <input id="loan_amount" type="number"
                                       class="form-control @error('loan_amount') is-invalid @enderror"
                                       name="loan_amount" value="{{ old('loan_amount') }}" required autofocus>
                                @error('loan_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="mb-3 row">
                            <label for="annual_interest_rate"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Annual Interest Rate') }}</label>
                            <div class="col-md-6">
                                <input id="annual_interest_rate" type="number" step="0.01"
                                       class="form-control @error('annual_interest_rate') is-invalid @enderror"
                                       name="annual_interest_rate" value="{{ old('annual_interest_rate') }}" required>
                                @error('annual_interest_rate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="mb-3 row">
                            <label for="loan_term"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Loan Term (years)') }}</label>
                            <div class="col-md-6">
                                <input id="loan_term" type="number"
                                       class="form-control @error('loan_term') is-invalid @enderror"
                                       name="loan_term" value="{{ old('loan_term') }}" required>
                                @error('loan_term')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="mb-3 row">
                            <label for="extra_payment"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Extra Payment') }}</label>
                            <div class="col-md-6">
                                <input id="extra_payment" type="number"
                                       class="form-control @error('extra_payment') is-invalid @enderror"
                                       name="extra_payment" value="{{ old('extra_payment') }}">
                                @error('extra_payment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
