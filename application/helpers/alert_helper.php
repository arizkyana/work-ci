<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 7/31/2017
 * Time: 10:20 AM
 */

function alert($type = 'danger', $title = 'Error!', $message = null) {
    $ci =& get_instance();

    $ci->session->set_flashdata('alert_type', $type);
    $ci->session->set_flashdata('alert_title', $title);
    $ci->session->set_flashdata('alert_message', $message);
}