<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 5/17/2017
 * Time: 10:30 AM
 */
class Rekon extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function datatables(){

        $select = "t_rekon.id_table,";
        $select .= "t_rekon.total_record_dana_match, ";
        $select .= "t_rekon.total_record_sms_match, ";
        $select .= "t_rekon.total_rupiah_sms_match, ";
        $select .= "t_rekon.total_record_sms_only, ";
        $select .= "t_rekon.total_rupiah_dana_match, ";
        $select .= "t_rekon.total_record_dana_only, ";
        $select .= "t_rekon.tanggal_recon, ";
        $select .= "t_rekon.process_id ";

        $this->datatables->select($select);
        $this->datatables->from('t_rekon');
        echo $this->datatables->generate();
    }
}