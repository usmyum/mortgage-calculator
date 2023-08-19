<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<h1 style="text-align: center">Mortgage Calculator Web Application</h1>
<h3 style="text-align: center"><a href="{{ route('loan.store') }}">Create Loan Setup</a></h3>

<h2>Table of Contents</h2>
<ul>
    <li><a href="#introduction">Introduction</a></li>
    <li><a href="#features">Features</a></li>
    <li>
        <ul>
            <li><a href="#calculating-monthly-payments">Calculating Monthly Payments</a></li>
        </ul>
    </li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li>
        <ul>
            <li><a href="#prerequisites">Prerequisites</a></li>
            <li><a href="#installation">Installation</a></li>
        </ul>
    </li>
    <li><a href="#setting-up-with-laravel-sail">Setting Up with Laravel Sail</a></li>
    <li><a href="#usage">Usage</a></li>
    <li>
        <ul>
            <li><a href="#inputting-loan-details">Inputting Loan Details</a></li>
            <li><a href="#generating-amortization-schedules">Generating Amortization Schedules</a></li>
            <li><a href="#applying-extra-repayments">Applying Extra Repayments</a></li>
        </ul>
    </li>
    <li><a href="#api-endpoints">API Endpoints</a></li>
    <li><a href="#controllers-and-services">Controllers and Services</a></li>
    <li><a href="#models-and-migrations">Models and Migrations</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
</ul>

<h2 id="introduction">Introduction</h2>
<p>Welcome to the Mortgage Calculator web application built using Laravel 10. This application enables users to calculate mortgage loan details, generate amortization schedules, and handle extra repayments. Whether you're a borrower looking to plan your loan payments or a developer seeking insights into building financial tools, this app has you covered.</p>

<h2 id="features">Features</h2>
<h3 id="calculating-monthly-payments">Calculating Monthly Payments</h3>
<p>The application uses the provided loan amount, interest rate, and loan term to calculate the monthly mortgage payment using the given formula:</p>
<!-- ... (Monthly Payments formula) ... -->

<h2 id="getting-started">Getting Started</h2>
<h3 id="prerequisites">Prerequisites</h3>
<p>To run this application, you'll need the following:</p>
<ul>
    <li>PHP 8.2.9</li>
    <li>Composer</li>
    <li>Laravel</li>
    <li>MySQL</li>
</ul>

<h3 id="installation">Installation</h3>
<p>Follow these steps to install the application:</p>
<ol>
    <li>Clone the repository:
        <pre><code>git clone https://github.com/your-username/mortgage-calculator.git
cd mortgage-calculator</code></pre>
    </li>
</ol>

<h2 id="setting-up-with-laravel-sail">Setting Up with Laravel Sail</h2>
<p>If you want to use Laravel Sail for development, follow these steps:</p>
<ol>
    <li>Install Laravel Sail (if not already installed):
        <pre><code>composer require laravel/sail --dev</code></pre>
    </li>
    <li>Initialize Laravel Sail:
        <pre><code>php artisan sail:install</code></pre>
    </li>
    <li>Start the development environment using Sail:
        <pre><code>./vendor/bin/sail up</code></pre>
    </li>
</ol>

<h2 id="usage">Usage</h2>
<p>To use the application, follow these steps:</p>
<ol>
    <li>Access the web application by navigating to <a href="http://localhost" target="_blank">http://localhost</a> in your browser.</li>
    <li>Input loan details like loan amount, interest rate, and loan term.</li>
    <li>Calculate monthly mortgage payment and generate an amortization schedule.</li>
    <li>Optionally, apply fixed extra repayments to observe recalculated schedules.</li>
</ol>

<h2 id="api-endpoints">API Endpoints</h2>
<ul>
    <li><strong>GET</strong> <code>/Welcome</code>: View a loan setup, amortization, and repayment schedule.</li>
    <li><strong>GET</strong> <code>/loan/{id}</code>: View a loan setup, amortization, and repayment schedule.</li>
    <li><strong>POST</strong> <code>/loan</code>: Store a loan setup, amortization, and repayment schedule.</li>
    <li><strong>Delete</strong> <code>/loan</code>: Delete a loan setup, amortization, and repayment schedule.</li>
</ul>

<!-- ... (Other sections) ... -->

<!-- End of content -->
</body>
</html>
