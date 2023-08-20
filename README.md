# Mortgage Calculator Web Application

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- - [Calculating Monthly Payments](#calculating-monthly-payments)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Setting Up with Laravel Sail](#setting-up-with-laravel-sail)
- [Usage](#usage)
- - [Inputting Loan Details](#inputting-loan-details)
  - [Generating Amortization Schedules](#generating-amortization-schedules)
  - [Applying Extra Repayments](#applying-extra-repayments)
- [API Endpoints](#api-endpoints)
- [Controllers and Services](#controllers-and-services)
- [Models and Migrations](#models-and-migrations)
- [Contributing](#contributing)
- [License](#license)

## Introduction

Welcome to the Mortgage Calculator web application built using Laravel 10. This application enables users to calculate mortgage loan details, generate amortization schedules, and handle extra repayments. Whether you're a borrower looking to plan your loan payments or a developer seeking insights into building financial tools, this app has you covered.

## Features

- Calculate monthly mortgage payments based on loan details.
- Generate an amortization schedule with principal and interest breakdowns.
- Apply fixed extra repayments, updating schedules accordingly.

### Calculating Monthly Payments

The application uses the provided loan amount, interest rate, and loan term to calculate the monthly mortgage payment using the given formula.

● Monthly interest rate = (Annual interest rate / 12) / 100 <br>
● Number of months = Loan term * 12 <br>
● Monthly payment = (Loan amount * Monthly interest rate) / (1 - (1 + Monthly interest rate)^(-Number of months)) <br>

## Getting Started

### Prerequisites

- PHP 8.2.9
- Composer
- Laravel
- MySQL

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/mortgage-calculator.git
   cd mortgage-calculator
   ```

### Setting Up with Laravel Sail

1. Install Laravel Sail (if not already installed):

   ```bash
   composer require laravel/sail --dev
   ```

2. Initialize Laravel Sail:

   ```bash
   php artisan sail:install
   ```

3. Start the development environment using Sail:

   ```bash
   ./vendor/bin/sail up
   ```

## Usage

1. Run the command to list docker containers

   ```bash
   docker ps
   ```

2. Run the laravel container named, 'dashing-assessment-laravel.test-1' as follows:

   ```bash
   docker exec -it dashing-assessment-laravel.test-1 bash
   ```

3. Run the migrations with the command

   ```bash
   php artisan migrate
   ```

  If you come accross any failure in migrations or testing, please consider changing the DB_HOST value in the .env

   ```bash
   DB_HOST=mysql OR DB_HOST=127.0.0.1
   ```


## Endpoints

- **GET** `/welcome`
   a welcome screen with brief introduction about the application

- **GET** `/loan/{id}`
   view a loan setup, amortization and repayment schedule

- **POST** `/loan`
  Store a loan setup, amortization and repayment schedule

- **Delete** `/loan`
  Delete a loan setup, amortization and repayment schedule


### Inputting Loan Details

1. Access the web application by navigating to `http://localhost` in your browser.
2. Input loan details like loan amount, interest rate, and loan term.

### Generating Amortization Schedules

1. Calculate monthly mortgage payment and generate an amortization schedule.

### Applying Extra Repayments

1. Optionally, apply fixed extra repayments to observe recalculated schedules.

## Controllers and Services

The application uses controllers and services to handle logic and interactions.

## Models and Migrations

The application uses models and migrations to define data structure and manage the database.

## Contributing

Contributions are welcome! Fork the repository and create pull requests with your proposed changes.
