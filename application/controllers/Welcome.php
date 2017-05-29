<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

use OAuth2\Autoloader;

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    private $signer;
    private $server;
    private $storage;


    public function __construct()
    {
        parent::__construct();
        $this->signer = new Sha256();
        $dsn = "mysql:dbname=work-ci;host=localhost";
        $username = "root";
        $password = "12341234";

        Autoloader::register();

        $this->storage = new OAuth2\Storage\Pdo(array(
            'dsn' => $dsn,
            'username' => $username,
            'password' => $password
        ));

        $this->server = new OAuth2\Server($this->storage, array(
            'always_issue_new_refresh_token' => true,
            'refresh_token_lifetime'         => 2419200,
        ));

        // Add the "Client Credentials"
        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($this->storage));

        // Add the "Authorization Code"
        $this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($this->storage));


    }

    public function index()
    {
//        $this->load->view('welcome_message');
        $this->config->load('ResourceModel');
        echo json_encode($this->config->item('dsn'));

    }

    private function _generate_token()
    {

        $token = (new Builder())->setIssuer('http://example.com')// Configures the issuer (iss claim)
        ->setAudience('http://example.org')// Configures the audience (aud claim)
        ->setId('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
        ->setIssuedAt(time())// Configures the time that the token was issue (iat claim)
        ->setNotBefore(time() + 60)// Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + 3600)// Configures the expiration time of the token (nbf claim)
        ->set('uid', 1)// Configures a new claim, called "uid"
        ->set('name', 'agung')
            ->sign($this->signer, 'testing')// creates a signature using "testing" as key
            ->getToken(); // Retrieves the generated token

        return $token;
    }

    public function generate_token()
    {

        $token = $this->_generate_token();
        echo $token;
    }

    public function verify_token()
    {

        $headers = $this->input->request_headers();


        echo $this->_generate_token()->verify($this->signer, 'testing');
    }

    public function oauth_token()
    {





        // Generate token
        $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
    }

    public function test_api(){
        // Handle a request to a resource and authenticate the access token
        if (!$this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
            $this->server->getResponse()->send();
            die;
        }
        echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
    }
}
