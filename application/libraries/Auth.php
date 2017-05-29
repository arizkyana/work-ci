<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/26/2017
 * Time: 2:50 PM
 */

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class Auth
{
    private $acl;
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();

        // instance ACL
        $this->acl = new Acl();

    }

    /**
     * Fetch ACL data (role, resource, user) from database
     */
    private function init(){

    }

    public function addRole(){

    }


}