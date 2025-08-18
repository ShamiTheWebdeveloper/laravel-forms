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

{!! form()->open('createPage','PATCH',false,true,['class'=>'page-form']) !!}

    {!! form()->label('Title','title') !!}
    {!! form()->text('title') !!}

    {!! form()->label('Link:','link') !!}
    {!! form()->url('link') !!}

    {!! form()->label('Description:','body') !!}
    {!! form()->textarea('body',null,10,60) !!}

    {!! form()->label('Seclude Page:','time') !!}
    {!! form()->time('time') !!}

    {!! form()->label('Background color of page:','bg_color') !!}
    {!! form()->color('bg_color') !!}

    {!! form()->label('Published Now?','publish') !!}
    {!! form()->checkbox('publish',true) !!}

    {!! form()->submit('Save',['class'=>'btn btn-save']) !!}

    {!! form()->reset('reset','Reset Form') !!}

{!! form()->close() !!}

```
