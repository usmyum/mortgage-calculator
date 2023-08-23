<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoanControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_store_function_creates_loan()
    {
        $data = [
            'loan_amount' => 100000,
            'annual_interest_rate' => 5,
            'loan_term' => 30,
            'extra_payment' => 10
        ];

        // Forward request
        $response = $this->post(route('loan.store'), $data);

        // Asserts
        $response->assertStatus(200);
        $this->assertDatabaseHas('loans', $data);
    }

    public function test_store_function_missing_loan_values()
    {
        $data = [
            'loan_amount' => 100000,
        ];
        $response = $this->post(route('loan.store'), $data);

        $response->assertStatus(302); // Expecting a redirect
        $response->assertSessionHasErrors(['annual_interest_rate', 'loan_term']);
    }
}
