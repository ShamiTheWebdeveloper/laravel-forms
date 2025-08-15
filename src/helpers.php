<?php

use ShamiTheWebdeveloper\LaravelForms\Form;

if (!function_exists('form')) {
    function form(): Form
    {
        return app(Form::class);
    }
}
