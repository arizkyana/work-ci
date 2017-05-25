<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/25/17
 * Time: 14:39
 */

use OAuth2\Autoloader;

class Oauth
{

    private $ci;

    private $server;
    private $storage;

    public function __construct()
    {
        $this->ci =& get_instance();

        $this->ci->config->load('oauth');

        Autoloader::register();

        $this->storage = new OAuth2\Storage\Pdo(array(
            'dsn' => $this->ci->config->item('dsn')['mysql'],
            'username' => $this->ci->config->item('crendentials')['mysql']['username'],
            'password' => $this->ci->config->item('crendentials')['mysql']['password']
        ));

        $this->server = new OAuth2\Server($this->storage, [
            'access_lifetime' => 3600, // 86400, // 1 day
            'refresh_token_lifetime' => 2419200, // 28 days
            'always_issue_new_refresh_token' => true,

        ]);

        $users = array('agung' => array('password' => '12341234', 'first_name' => 'agung', 'last_name' => 'rizkyana'));

        $storage_user = new OAuth2\Storage\Memory(array('user_credentials' => $users));

        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($this->storage));
        $this->server->addGrantType(new OAuth2\GrantType\UserCredentials($storage_user));
        $this->server->addGrantType(new OAuth2\GrantType\RefreshToken($this->storage, [
            'always_issue_new_refresh_token' => true
        ]));


    }

    public function client_credentials()
    {
        // Generate token


        $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
    }

    public function authorize()
    {
        if (!$this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
            $this->server->getResponse()->send();
            die;
        }
        echo TRUE;

    }


    public function refresh_token()
    {


        $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
    }


    public function get_server()
    {
        return $this->server;
    }
}