
# Mail-merge tool Coding Exam.

This repository is a coding exam for Promo Veritas that can use API using lumen laravel. This test can send email using mailtrap.

## Installation

Clone the repository 

```bash
git clone https://github.com/Damnval/brassrabit.git
```

## Install dependencies

Go to project folder and run 

```bash
composer install
```

## Development Setup

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Test Project

Go to browser and type http://127.0.0.1:8000/

## Others

To boost framework speed run and get .env variables to config

```bash
php artisan config:cache
```

## Other Quest

1. Provides the list of headers upon uploading file.
2. Slightly made the UI attactive
3. Automation - ??
4. Enables to send email in mailtrap.io - U:val@gemango.com, P:Myseventhjob07
5. None.

## CSV sample for uploading

public/csv/joshua_email.xlsx
