<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/25/17
 * Time: 09:42
 */
class Migration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // can only be called from the command line
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed. This is a command line tool, use the terminal');
        }

    }

    public function generate()
    {

    }

}