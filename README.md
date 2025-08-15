# Laravel Forms

A lightweight Laravel package for generating HTML forms easily.

## Installation

`composer require shamithewebdeveloper/laravel-forms`


## Usage

```php

use ShamiTheWebdeveloper\LaravelForms\Form;

echo Form::open('home');
echo Form::label('Name', 'name');
echo Form::text('name');
echo Form::submit('Send');
echo Form::close();

// For blade files

{!! form()->open('home') !!}
{!! form()->text('name') !!}
{!! form()->submit('Send') !!}
{!! form()->close() !!}
```
