<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 16:10
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class JabatanModel extends CI_Model
{
//Models
//for column view
    const v_id_jabatan = "id_jabatan";
    const v_id_level = "id_level";
    const v_nama_level = "nama_level";
    const v_kode_jabatan = "kode_jabatan";
    const v_id_parent_jabatan = "id_parent_jabatan";
    const v_kode_parent_jabatan = "kode_parent_jabatan";
    const v_nama_parent_jabatan = "nama_parent_jabatan";
    const v_keterangan_parent_jabatan = "keterangan_parent_jabatan";
    const v_nama_jabatan = "nama_jabatan";
    const v_keterangan_jabatan = "keterangan_jabatan";

//for column table
    const t_id_jabatan = "id_jabatan";
    const t_id_level = "id_level";
    const t_kode_jabatan = "kode_jabatan";
    const t_id_parent_jabatan = "id_parent_jabatan";
    const t_nama_jabatan = "nama_jabatan";
    const t_keterangan_jabatan = "keterangan_jabatan";

    public $id_jabatan;
    public $id_level;
    public $nama_level;
    public $kode_jabatan;
    public $id_parent_jabatan;
    public $kode_parent_jabatan;
    public $nama_parent_jabatan;
    public $keterangan_parent_jabatan;
    public $nama_jabatan;
    public $keterangan_jabatan;

    var $table = 'jabatan';
    var $table_data = 'v_jabatan';
    var $primary_key = 'id_jabatan';

	function __construct()
	{
		parent::__construct();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_view_by_id($id)
	{
		$this->db->from($this->table_data);
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get();
		return $query->row();
	}

    /**
     * @param null $where
     * @param array $order
     * @return CI_DB_result
     */
    public function find($where = null, $order = ['column' => [], 'option' => 'asc'])
	{
		if (!empty($order['column'])) {
			$this->db->order_by($order['column'], $order['option']);
		}
		return $this->db->get_where($this->table, $where);
	}

    /**
     * @param string|object $where
     * @param array $order
     * @return CI_DB_result
     */
    public function find_view($where = null, $order = ['column' => [], 'option' => 'asc'])
	{
		if (!empty($order['column'])) {
			$this->db->order_by($order['column'], $order['option']);
		}
		return $this->db->get_where($this->table_data, $where);
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($valueid, $data)
	{
		$this->db->where($this->primary_key, $valueid);
		$this->db->update($this->table, $data);
	}

	public function delete_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
	}

}
