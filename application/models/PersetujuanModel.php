<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 16:10
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PersetujuanModel extends CI_Model
{
    //Models
//for column view
    const v_id_persetujuan = "id_persetujuan";
    const v_id_user = "id_user";
    const v_id_aktivitas = "id_aktivitas";
    const v_jenis_persetujuan = "jenis_persetujuan";
    const v_alasan = "alasan";
    const v_tgl_persetujuan = "tgl_persetujuan";

//for column table
    const t_id_persetujuan = "id_persetujuan";
    const t_id_user = "id_user";
    const t_id_aktivitas = "id_aktivitas";
    const t_jenis_persetujuan = "jenis_persetujuan";
    const t_alasan = "alasan";
    const t_tgl_persetujuan = "tgl_persetujuan";

    public $id_persetujuan;
    public $id_user;
    public $id_aktivitas;
    public $jenis_persetujuan;
    public $alasan;
    public $tgl_persetujuan;

    var $table = 'persetujuan';
    var $table_data = 'v_persetujuan';
    var $primary_key = 'id_persetujuan';

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
