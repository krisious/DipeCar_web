<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'tb_transaksi';
    public $table_detail = 'tb_detail_transaksi';
    public $table_mobil = 'tb_mobil';
    public $table_user = 'tb_users';
    public $id  = 'KODE_TRANSAKSI';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('KODE_TRANSAKSI,ID_USER,TGL_ORDER,TOTAL_PEMBAYARAN,TGL_PEMBAYARAN,BUKTI_PEMBAYARAN,STATUS_PEMBAYARAN,STATUS_TRANSAKSI');
        $this->datatables->from('tb_transaksi');
        //add this line for join
        //$this->datatables->join('table2', 'tb_transaksi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi/read/$1'),'Read')." | ".anchor(site_url('transaksi/update/$1'),'Update')." | ".anchor(site_url('transaksi/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'KODE_TRANSAKSI');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->select("*")->from($this->table);
        $this->db->join($this->table_user,$this->table_user.".ID_USER=".$this->table.".ID_USER");
        return $this->db->get()->row();
    }

    // get data by id
    function get_detail_id($id)
    {

        $this->db->where($this->id, $id);
        $this->db->select("*,".$this->table_detail.".HARGA_MOBIL,".$this->table_detail.".STATUS_MOBIL,")->from($this->table_detail);
        $this->db->join($this->table_mobil,$this->table_mobil.".ID_MOBIL=".$this->table_detail.".ID_MOBIL");
        return $this->db->get()->result();
    }


    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('KODE_TRANSAKSI', $q);
	$this->db->or_like('ID_USER', $q);
	$this->db->or_like('TGL_ORDER', $q);
	$this->db->or_like('TOTAL_PEMBAYARAN', $q);
	$this->db->or_like('TGL_PEMBAYARAN', $q);
	$this->db->or_like('BUKTI_PEMBAYARAN', $q);
	$this->db->or_like('STATUS_PEMBAYARAN', $q);
	$this->db->or_like('STATUS_TRANSAKSI', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('KODE_TRANSAKSI', $q);
	$this->db->or_like('ID_USER', $q);
	$this->db->or_like('TGL_ORDER', $q);
	$this->db->or_like('TOTAL_PEMBAYARAN', $q);
	$this->db->or_like('TGL_PEMBAYARAN', $q);
	$this->db->or_like('BUKTI_PEMBAYARAN', $q);
	$this->db->or_like('STATUS_PEMBAYARAN', $q);
	$this->db->or_like('STATUS_TRANSAKSI', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function cancel($data,$id){
        $transaksi=$this->db->select("KODE_TRANSAKSI,TOTAL")->from($this->table_detail)->where("ID_DETAIL_TRANSAKSI",$id)->get()->row();
        $this->db->query("Update tb_transaksi set DANA_KEMBALI=DANA_KEMBALI+".$transaksi->TOTAL." where KODE_TRANSAKSI='".$transaksi->KODE_TRANSAKSI."'",FALSE);
        $this->db->where("ID_DETAIL_TRANSAKSI",$id);
        $this->db->update($this->table_detail,$data);
        return $transaksi->KODE_TRANSAKSI;
    }

    function confirm($data,$id){
        $transaksi=$this->db->select("KODE_TRANSAKSI,TOTAL,ID_MOBIL")->from($this->table_detail)->where("ID_DETAIL_TRANSAKSI",$id)->get()->row();
        $this->db->query("Update tb_mobil set STATUS_MOBIL=1 where ID_MOBIL='".$transaksi->ID_MOBIL."'",FALSE);
        $this->db->where("ID_DETAIL_TRANSAKSI",$id);
        $this->db->update($this->table_detail,$data);
        return $transaksi->KODE_TRANSAKSI;
    }

    function selesai($data,$id){
        $this->db->where("ID_DETAIL_TRANSAKSI",$id);
        $this->db->update($this->table_detail,$data);
        return $transaksi->KODE_TRANSAKSI;   
    }
}
