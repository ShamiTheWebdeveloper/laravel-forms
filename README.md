# Laravel Forms

A lightweight Laravel package for generating HTML forms easily.

## Usage

use ShamiTheWebdeveloper\LaravelForms\Form;

echo Form::open('home');
echo Form::label('Name', 'name');
echo Form::text('name');
echo Form::submit('Send');
echo Form::close();


## Installation

```bash
composer require shamithewebdeveloper/laravel-forms

