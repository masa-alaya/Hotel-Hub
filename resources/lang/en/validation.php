<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute It must be accepted',
    'accepted_if' => ':attribute It must be accepted when :other equal to :value.',
    'active_url' => ':attribute it is nor valeid URL ',
    'after' => ':attribute Must be a date after :date.',
    'alpha' => ':attribute should be char only',
    'alpha_dash' => ':attribute should including chars, number and marks (- , _)',
    'alpha_num' => ':attribute should including chars, number',
    'array' => ':attribute should be array',

    'boolean' => ':attribute should be  true or false.',
    'confirmed' => ':attribute The confirmation field does not match the original field.',
    'current_password' => 'incorrect password',
    'date' => ':attribute not valid date',

    'email' => ':attribute should be valid email address',
    'ends_with' => ':attribute should end up with the following values: :values.',
    'enum' => ' :attribute The selected value is invalid.',
    'exists' => ':must be greater than or equal to',
    'file' => ':attribute should be file.',
    'filled' => ':attribute should have a value.',

    'image' => ':attribute should be image.',
    'in' => ' :attribute The selected value is invalid.',
    'in_array' => ':attribute not exist in :other.',
    'integer' => ':attribute should be integer .',


    'numeric' => ':attribute should be number.',
    'password' => 'incorect password',
    'present' => ':attribute should be exist.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
