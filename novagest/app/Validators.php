<?php

/*Extensions customs NOVA pour les validations des saisies de données */

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[a-zA-Z .\-]+$/i', $value);
});

Validator::extend('alphanum_spaces', function($attribute, $value)
{
    return preg_match('/^[a-zA-Z0-9 .\-]+$/i', $value);
});