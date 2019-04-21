<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 16:10
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AktivitasModel extends CI_Model
{
//Models
//for column view
    const v_id_aktivitas = "id_aktivitas";
    const v_id_user = "id_user";
    const v_kode_aktivitas = "kode_aktivitas";
    const v_tgl_aktivitas = "tgl_aktivitas";
    const v_nama_aktivitas = "nama_aktivitas";
    const v_keterangan_aktivitas = "keterangan_aktivitas";
    const v_pengerjaan_aktivitas = "pengerjaan_aktivitas";
    const v_status_aktivitas = "status_aktivitas";
    const v_file = "file";
    const v_keterangan_status_aktivitas = "keterangan_status_aktivitas";
    const v_deleted = "deleted";
    const v_date_created = "date_created";
    const v_date_modified = "date_modified";
    const v_kode_user = "kode_user";
    const v_username = "username";
    const v_password = "password";
    const v_nama = "nama";
    const v_jenis_kelamin = "jenis_kelamin";
    const v_tempat_lahir = "tempat_lahir";
    const v_tgl_lahir = "tgl_lahir";
    const v_alamat = "alamat";
    const v_telp = "telp";
    const v_email = "email";
    const v_bagian = "bagian";
    const v_periode_kontrak = "periode_kontrak";
    const v_tgl_awal_kontrak = "tgl_awal_kontrak";
    const v_tgl_akhir_kontrak = "tgl_akhir_kontrak";
    const v_tugas = "tugas";
    const v_foto = "foto";
    const v_user_deleted = "user_deleted";
    const v_user_date_created = "user_date_created";
    const v_user_date_modified = "user_date_modified";
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
    const t_id_aktivitas = "id_aktivitas";
    const t_id_user = "id_user";
    const t_kode_aktivitas = "kode_aktivitas";
    const t_tgl_aktivitas = "tgl_aktivitas";
    const t_nama_aktivitas = "nama_aktivitas";
    const t_keterangan_aktivitas = "keterangan_aktivitas";
    const t_pengerjaan_aktivitas = "pengerjaan_aktivitas";
    const t_status_aktivitas = "status_aktivitas";
    const t_file = "file";
    const t_deleted = "deleted";
    const t_date_created = "date_created";
    const t_date_modified = "date_modified";

    public $id_aktivitas;
    public $id_user;
    public $kode_aktivitas;
    public $tgl_aktivitas;
    public $nama_aktivitas;
    public $keterangan_aktivitas;
    public $pengerjaan_aktivitas;
    public $status_aktivitas;
    public $file;
    public $keterangan_status_aktivitas;
    public $deleted;
    public $date_created;
    public $date_modified;

    public $kode_user;
    public $username;
    public $password;
    public $nama;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tgl_lahir;
    public $alamat;
    public $telp;
    public $email;
    public $bagian;
    public $periode_kontrak;
    public $tgl_awal_kontrak;
    public $tgl_akhir_kontrak;
    public $tugas;
    public $foto;
    public $user_deleted;
    public $user_date_created;
    public $user_date_modified;
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

    var $table = 'aktivitas';
    var $table_data = 'v_aktivitas';
    var $primary_key = 'id_aktivitas';

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

    function generate_kode_aktivitas()
    {
        $this->db->select_max('RIGHT('.$this::t_kode_aktivitas.',3)', 'kd_max');//select
        $this->db->where(['date('.AktivitasModel::t_date_created.')' => date('Y-m-d')]);
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
        return 'AKTVS'.date('Ymd').$kd;
    }

}
