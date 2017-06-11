<?php
/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/25/17
 * Time: 14:42
 */

$config['dsn'] = array(
    'mysql' => "mysql:dbname=work-ci;host=localhost"
);
$config['crendentials'] = array(
    'mysql' => array(
        'username' => 'root',
        'password' => '12341234'
    )
);

$config['access_lifetime'] = (86400 * 28); // 28 hari
$config['refresh_token_lifetime'] = 2419200; // 28 hari
$config['always_issue_new_refresh_token'] = TRUE;