<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 8/1/2017
 * Time: 2:31 PM
 */

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class Auth
{
    protected $ci;
    protected $acl;

    function __construct()
    {
        $this->ci =& get_instance();
        $this->init();
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }


    function init(){
        $this->acl = new Acl();

        // query roles
        $roles = $this->ci->db->get('auth_roles')->result();

        foreach ($roles as $key => $role) {
           $this->acl->addRole(new Role($role->name));
        }

        // query resources
        $resources = $this->ci->db->get('auth_resources')->result();
        foreach ($resources as $key => $resource) {
            $this->acl->addResource(new Resource($resource->name));
        }

        // map resources
        $this->ci->db->select('auth_roles.name as role_name, auth_resources.name as resource_name, auth_resources.uri, auth_map_resources.access');
        $this->ci->db->join('auth_roles', 'auth_map_resources.role_id = auth_roles.id', 'left');
        $this->ci->db->join('auth_resources', 'auth_map_resources.resource_id = auth_resources.id', 'left');
        $map_resources = $this->ci->db->get('auth_map_resources')->result();
        foreach ($map_resources as $key => $map) {
            if ($map->access == 1) {
                $this->acl->allow($map->role_name, $map->resource_name);
            } else {
                $this->acl->deny($map->role_name, $map->resource_name);
            }
        }
    }

}