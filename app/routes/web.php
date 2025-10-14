<?php
$routes = [
    '/' => 'BudgetController@index',
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',
    '/logout' => 'AuthController@logout',
    '/income' => 'IncomeController@index',
    '/expenditure' => 'ExpenditureController@index',
    '/summary' => 'BudgetController@summary',
    '/expenditure-report' => 'ExpenditureReportController@show',
    '/income-report' => 'IncomeReportController@show',

];
