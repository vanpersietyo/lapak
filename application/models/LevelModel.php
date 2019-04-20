<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 16:10
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LevelModel extends CI_Model
{
//Models
//for column table
    const id_level = "id_level";
    const kode_level = "kode_level";
    const nama_level = "nama_level";
    const keterangan = "keterangan";
    const deleted = "deleted";
    const date_created = "date_created";
    const date_modified = "date_modified";

    public $id_level;
    public $kode_level;
    public $nama_level;
    public $keterangan;
    public $deleted;
    public $date_created;
    public $date_modified;

    var $table = 'level';
    var $table_data = 'level';
    var $primary_key = 'id_level';


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

    function generate_kode_user()
    {
        $this->db->select_max('RIGHT('.$this::t_kode_user.',3)', 'kd_max');//select
        $query = $this->db->get($this->table);
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return 'USR'.$kd;
    }

}
