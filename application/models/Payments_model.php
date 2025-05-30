<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payments_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    // Mengambil semua data pembayaran
    function get_all()
    {
        $this->db->order_by('id_payment', 'DESC');
        return $this->db->get('payments')->result();
    }
    
    // Mengambil pembayaran berdasarkan peserta
    function get_by_peserta($id_peserta)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->order_by('id_payment', 'DESC');
        return $this->db->get('payments')->result();
    }
    
    // Mendapatkan detail pembayaran berdasarkan ID
    function get_by_id($id)
    {
        $this->db->where('id_payment', $id);
        return $this->db->get('payments')->row();
    }
    
    // Menyimpan data pembayaran baru
    function insert($data)
    {
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }
    
    // Memperbarui data pembayaran
    function update($id, $data)
    {
        $this->db->where('id_payment', $id);
        return $this->db->update('payments', $data);
    }
    
    // Menghapus data pembayaran
    function delete($id)
    {
        $this->db->where('id_payment', $id);
        return $this->db->delete('payments');
    }
    
    // Mengambil total pembayaran yang sudah terverifikasi untuk peserta
    function get_total_verified($id_peserta)
    {
        $this->db->select_sum('jumlah');
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('status', 'verified');
        $query = $this->db->get('payments');
        return $query->row()->jumlah ?: 0;
    }
}