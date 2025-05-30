<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail_model extends CI_Model
{

    public $table = 'mail';
    public $id = 'id_mail';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get data by id 1
    function get_by_id_1()
    {
        $this->db->where($this->id, '1');
        return $this->db->get($this->table)->row();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }          

}