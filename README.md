# Laravel Forms

A lightweight Laravel package for generating HTML forms easily.

## Installation

```bash
composer require shamithewebdeveloper/laravel-forms

## Usage

use ShamiTheWebdeveloper\LaravelForms\Form;

echo Form::open('home');
echo Form::label('Name', 'name');
echo Form::text('name');
echo Form::submit('Send');
echo Form::close();
