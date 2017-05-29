<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/25/17
 * Time: 14:39
 */

use OAuth2\Autoloader;

class Oauth2
{

    private $ci;

    private $server;
    private $storage;

    private $response;

    public function __construct()
    {
        $this->ci =& get_instance();

        $this->ci->config->load('Oauth2');

        Autoloader::register();

        $this->storage = new OAuth2\Storage\Pdo(array(
            'dsn' => $this->ci->config->item('dsn')['mysql'],
            'username' => $this->ci->config->item('crendentials')['mysql']['username'],
            'password' => $this->ci->config->item('crendentials')['mysql']['password']
        ));

        $this->server = new OAuth2\Server($this->storage, [
            'access_lifetime' => $this->ci->config->item('access_lifetime'), // 86400, // 1 day
            'refresh_token_lifetime' => $this->ci->config->item('refresh_token_lifetime'), // 28 days
            'always_issue_new_refresh_token' => $this->ci->config->item('always_issue_new_refresh_token'),

        ]);

        $this->response = new OAuth2\Response();

        $users = array('agung' => array('password' => '12341234', 'first_name' => 'agung', 'last_name' => 'rizkyana'));

        $storage_user = new OAuth2\Storage\Memory(array('user_credentials' => $users));

        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($this->storage));
        $this->server->addGrantType(new OAuth2\GrantType\UserCredentials($storage_user));
        $this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($this->storage));
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

    public function authorize_2(){
        // validate the authorize request
        $res = new OAuth2\Response();
        echo !$this->server->validateAuthorizeRequest(OAuth2\Request::createFromGlobals(), $res) ? $res->send() : 'lolos' ;
    }

    public function authorize_code(){
        $this->server->handleAuthorizeRequest(OAuth2\Request::createFromGlobals(), $this->response, TRUE);
        $code = substr($this->response->getHttpHeader('Location'), strpos($this->response->getHttpHeader('Location'), 'code=')+5, 40);
        echo $code;
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