<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_mobil extends CI_Model
{

    public $table = 'tb_mobil';
    public $table_gallery = 'tb_gallery_mobil';
    public $table_fasilitas = 'tb_fasilitas_mobil';
    public $id = 'ID_MOBIL';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_MOBIL,NAMA_MOBIL,MERK_MOBIL,DESKRIPSI_MOBIL,TAHUN_MOBIL,KAPASITAS_MOBIL,HARGA_MOBIL,WARNA_MOBIL,BENSIN_MOBIL,PLAT_NO_MOBIL,STATUS_SEWA,STATUS_MOBIL,CREATED_MOBIL');
        $this->datatables->from('tb_mobil');
        //add this line for join
        //$this->datatables->join('table2', 'tb_mobil.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mobil/read/$1'),'Read')." | ".anchor(site_url('mobil/update/$1'),'Update')." | ".anchor(site_url('mobil/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_MOBIL');
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
        $this->db->where($this->table.".".$this->id, $id);
        $this->db->select('*')->from($this->table);
        $this->db->join($this->table_gallery,$this->table_gallery.".ID_MOBIL=".$this->table.".ID_MOBIL");
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_MOBIL', $q);
	$this->db->or_like('NAMA_MOBIL', $q);
	$this->db->or_like('MERK_MOBIL', $q);
	$this->db->or_like('DESKRIPSI_MOBIL', $q);
	$this->db->or_like('TAHUN_MOBIL', $q);
	$this->db->or_like('KAPASITAS_MOBIL', $q);
	$this->db->or_like('HARGA_MOBIL', $q);
	$this->db->or_like('WARNA_MOBIL', $q);
	$this->db->or_like('BENSIN_MOBIL', $q);
	$this->db->or_like('PLAT_NO_MOBIL', $q);
	$this->db->or_like('STATUS_SEWA', $q);
	$this->db->or_like('STATUS_MOBIL', $q);
	$this->db->or_like('CREATED_MOBIL', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_MOBIL', $q);
    	$this->db->or_like('NAMA_MOBIL', $q);
    	$this->db->or_like('MERK_MOBIL', $q);
    	$this->db->or_like('DESKRIPSI_MOBIL', $q);
    	$this->db->or_like('TAHUN_MOBIL', $q);
    	$this->db->or_like('KAPASITAS_MOBIL', $q);
    	$this->db->or_like('HARGA_MOBIL', $q);
    	$this->db->or_like('WARNA_MOBIL', $q);
    	$this->db->or_like('BENSIN_MOBIL', $q);
    	$this->db->or_like('PLAT_NO_MOBIL', $q);
    	$this->db->or_like('STATUS_SEWA', $q);
    	$this->db->or_like('STATUS_MOBIL', $q);
    	$this->db->or_like('CREATED_MOBIL', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data['data']);
        $id=$this->db->insert_id();

        foreach ($data["fasilitas"] as $key => $value) {
            $data["fasilitas"][$key]["ID_MOBIL"]=$id;
        }
        
        $data["photo"]["ID_MOBIL"]=$id;
        
        $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        $this->db->insert($this->table_gallery, $data['photo']);
    }

    // update data
    function update($id, $data)
    {

        $this->db->where($this->id, $id)->update($this->table, $data['data']);

        $this->db->where($this->id, $id)->delete($this->table_fasilitas);
        foreach ($data["fasilitas"] as $key => $value) {
            $data["fasilitas"][$key]["ID_MOBIL"]=$id;
        }
        
        if ($data["fasilitas"]) {
            $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        }

        if ($data["photo"]) {
            $this->db->where($this->id, $id)->delete($this->table_gallery);
            // $this->db->delete($this->table_gallery);
            $data["photo"]["ID_MOBIL"]=$id;
            $this->db->insert($this->table_gallery, $data['photo']);
        }
        
    


    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table_fasilitas);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table_gallery);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
