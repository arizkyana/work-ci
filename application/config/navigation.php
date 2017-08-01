<?php

/** 
 * Main Navigation.
 * Primarily being used in views/layout/admin.php
 *
 */
$config['navigation'] = array(
    'dashboard' => array(
        'uri' => 'dashboard',
        'title' => 'Dashboard',
        'icon' => 'fa fa-dashboard',
    ),
    'user_management' => array(

        'title' => 'User Management',
        'icon' => 'fa fa-user',
        'children' => array(
            'role' => array(
                'uri' => 'user/role',
                'title' => 'Role'
            ),
            'resource' => array(

                'title' => 'Resource',
                'children' => array(
                    'best' => array(
                        'uri' => 'user/best',
                        'title' => 'Best'
                    )
                )
            )
        )
    ),


);
