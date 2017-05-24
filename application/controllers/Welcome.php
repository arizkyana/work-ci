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


    public function __construct()
    {
        parent::__construct();
        $this->signer = new Sha256();
    }

    public function index()
    {
        $this->load->view('welcome_message');

    }

    private function _generate_token(){

        $token = (new Builder())->setIssuer('http://example.com')// Configures the issuer (iss claim)
        ->setAudience('http://example.org')// Configures the audience (aud claim)
        ->setId('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
        ->setIssuedAt(time())// Configures the time that the token was issue (iat claim)
        ->setNotBefore(time() + 60)// Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + 3600)// Configures the expiration time of the token (nbf claim)
        ->set('uid', 1)// Configures a new claim, called "uid"
        ->sign($this->signer, 'testing')// creates a signature using "testing" as key
        ->getToken(); // Retrieves the generated token

        return $token;
    }

    public function generate_token()
    {

        $token = $this->_generate_token();
        echo $token;
    }

    public function verify_token(){
        header('Content-type: application/json');
        $headers = $this->input->request_headers();


        echo $this->_generate_token()->verify($this->signer, 'testing');
    }

    public function oauth_token(){
        $dsn = "mysql:dbname=work-ci;host=localhost";
        $username = "root";
        $password = "";

        Autoloader::register();

        $storage = new OAuth2\Storage\Pdo(array(
            'dsn' => $dsn,
            'username' => $username,
            'password' => $password
        ));

        $server = new OAuth2\Server($storage);

        // Add the "Client Credentials"
        $server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));

        // Add the "Authorization Code"
        $server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));

        // Generate token
        $server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
    }

}
