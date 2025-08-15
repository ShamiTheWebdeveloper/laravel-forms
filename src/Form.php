<?php

namespace ShamiTheWebdeveloper\LaravelForms;

class Form
{
    /**
     * Build HTML attributes from an array.
     */
    private static function attributes(array $parameters): string
    {
        $html = '';
        foreach ($parameters as $key => $value) {
            $html .= ' ' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '="'
                . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
        }
        return $html;
    }

    public static function submit($text, $parameters = []): string
    {
        return '<button' . self::attributes($parameters) . '>'
            . htmlspecialchars($text, ENT_QUOTES, 'UTF-8')
            . '</button>';
    }

    public static function label($text, $for = ''): string
    {
        return '<label for="' . htmlspecialchars($for, ENT_QUOTES, 'UTF-8') . '">'
            . htmlspecialchars($text, ENT_QUOTES, 'UTF-8')
            . '</label>';
    }

    public static function text($name, $value = null, $parameters = []): string
    {
        return self::input('text', $name, $value, $parameters);
    }

    public static function textarea($name, $value = null, $parameters = []): string
    {
        $parameters['id'] = $parameters['id'] ?? $name;
        $parameters['name'] = $parameters['name'] ?? $name;

        return '<textarea' . self::attributes($parameters) . '>'
            . htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8')
            . '</textarea>';
    }

    public static function checkbox($name, $check = false, $value = null, $parameters = []): string
    {
        if ($check) $parameters['checked'] = 'checked';
        return self::input('checkbox', $name, $value, $parameters);
    }

    public static function input($type, $name, $value = null, $parameters = []): string
    {
        $parameters['type'] = $type;
        $parameters['id'] = $parameters['id'] ?? $name;
        $parameters['name'] = $parameters['name'] ?? $name;
        if ($value !== null) {
            $parameters['value'] = $value;
        }

        return '<input' . self::attributes($parameters) . ' />';
    }

    public static function file($name, $parameters = []): string
    {
        return self::input('file', $name, null, $parameters);
    }

    public static function email($name, $value = null, $parameters = []): string
    {
        return self::input('email', $name, $value, $parameters);
    }

    public static function password($name, $parameters = []): string
    {
        return self::input('password', $name, null, $parameters);
    }

    public static function radio($name, $checked = false, $value = null, $parameters = []): string
    {
        if ($checked) $parameters['checked'] = 'checked';
        return self::input('radio', $name, $value, $parameters);
    }

    public static function hidden($name, $value = null, $parameters = []): string
    {
        return self::input('hidden', $name, $value, $parameters);
    }

    public static function number($name, $value = null, $parameters = []): string
    {
        return self::input('number', $name, $value, $parameters);
    }

    public static function date($name, $value = null, $parameters = []): string
    {
        return self::input('date', $name, $value, $parameters);
    }

    public static function url($name, $value = null, $parameters = []): string
    {
        return self::input('url', $name, $value, $parameters);
    }

    public static function select($name, array $options, $default = null, $parameters = []): string
    {
        $parameters['id'] = $parameters['id'] ?? $name;
        $parameters['name'] = $parameters['name'] ?? $name;

        $output = '<select' . self::attributes($parameters) . '>';
        foreach ($options as $value => $label) {
            // Support non-associative arrays
            if (is_int($value)) {
                $value = $label;
            }
            $output .= '<option value="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"'
                . ($default == $value ? ' selected' : '') . '>'
                . htmlspecialchars($label, ENT_QUOTES, 'UTF-8')
                . '</option>';
        }
        $output .= '</select>';

        return $output;
    }

    public static function open($route, $method = 'POST', $files = false, $useCsrf = true, $parameters = []): string
    {
        // Resolve route
        if (is_array($route)) {
            $route = route($route[0], $route[1]);
        } else {
            $route = route($route);
        }

        // Always use post unless it's GET
        $formMethod = strtoupper($method);
        $parameters['action'] = $route;
        $parameters['method'] = $formMethod === 'GET' ? 'GET' : 'POST';

        if ($files) {
            $parameters['enctype'] = 'multipart/form-data';
        }

        $output = '<form' . self::attributes($parameters) . '>';

        if ($useCsrf && $formMethod !== 'GET') {
            $output .= csrf_field();
        }

        if (in_array($formMethod, ['PUT', 'PATCH', 'DELETE'])) {
            $output .= method_field($formMethod);
        }

        return $output;
    }

    public static function close(): string
    {
        return '</form>';
    }
}
