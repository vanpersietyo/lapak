<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 27/10/2018
 * Time: 11:16
 */

/**
 * @property login_model     $login_model
 * @property admin_model     $admin_model
 * @property Conversion      $conversion
 */
class Aktivitas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->role->is_login();
        $this->load->model('UserModel');
        $this->load->model('AktivitasModel');
        $this->load->model('PersetujuanModel');
    }

	public function index($id_user = null)
	{
	    $data = [
            'page'              => 'pages/transaksi/aktivitas/aktivitas_list',
            'title'             => 'Daftar',
            'subtitle'          => 'Aktivitas',
            'id_user'           => $id_user
        ];
        $this->load->view('templates/layout', $data);
	}

	public function ajax_list($id_user = null) {
		header('Content-Type: application/json');

        $where  =   [
            AktivitasModel::t_deleted => 0
        ];

		if($id_user!=null){
            $where  =   [
                AktivitasModel::t_id_user   => $id_user,
                AktivitasModel::t_deleted   => 0
            ];
        }

		$order  =   [
		                'column' => AktivitasModel::t_date_created,
                        'option' => 'desc'
                    ];
		$list   = $this->AktivitasModel->find_view($where,$order)->result();
		$data   = [];
		/** @var AktivitasModel $d */
		$no =1 ;
		foreach ($list as $d) {
			$row = array();

            $button_setujui = '<button type="button" class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" title="Setujui Aktivitas" data-original-title="Setujui Aktivitas" onclick="approve('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama."'".')"><i class="fa fa-check"></i></button>';
            $button_tolak   = '<button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="Lihat Data Aktivitas" data-original-title="Lihat Data Aktivitas" onclick="detail('."'".$d->id_aktivitas."'".')"><i class="fa fa-share-square"></i></button>';
            $button_lihat   = '<button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" title="Tolak Aktivitas" data-original-title="Tolak Aktivitas" onclick="reject('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama."'".')"><i class="fa fa-close"></i></button>';
            $button_ubah    = '<button type="button" class="btn btn-warning btn-xs btn-flat" data-toggle="tooltip" title="Ubah Data Aktivitas" data-original-title="Ubah Data Aktivitas" onclick="edit('."'".$d->id_aktivitas."'".')"><i class="fa fa-edit"></i></button>';
            $button_hapus   = '<button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" title="Hapus Data Aktivitas" data-original-title="Hapus Data Aktivitas" onclick="remove('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama_aktivitas."'".')"><i class="fa fa-close"></i></button>';

            if($this->role->level()==4){//level pelaksana

                if($d->status_aktivitas==0){ //jika aktivitas sedang menunggu disetujui
                    $status = '<span class="label label-warning">'.$d->keterangan_status_aktivitas.'</span>';
                    $button ='<div class="btn-group">'.$button_ubah.''.$button_hapus.'</div>';
                }elseif($d->status_aktivitas==1){//jika aktivitas di setujui
                    $status = '<span class="label label-success">'.$d->keterangan_status_aktivitas.'</span>';
                    $button = $button_lihat;
                }elseif($d->status_aktivitas==2){//jika aktivitas di tolak
                    $status = '<span class="label label-danger">'.$d->keterangan_status_aktivitas.'</span>';
                    $button = $button_lihat;
                }

            }elseif ($this->role->level()==3){//level kasubag

            }elseif ($this->role->level()==2){//level kabag

            }elseif ($this->role->level()==1){ //level root
                if($d->status_aktivitas==0){
                    $status = '<span class="label label-warning">'.$d->keterangan_status_aktivitas.'</span>';
                    $button = '
                        <button type="button" class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" title="Setujui Aktivitas" data-original-title="Setujui Aktivitas" onclick="approve('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama."'".')"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" title="Tolak Aktivitas" data-original-title="Tolak Aktivitas" onclick="reject('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama."'".')"><i class="fa fa-close"></i></button>
                        <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="Lihat Data Aktivitas" data-original-title="Lihat Data Aktivitas" onclick="detail('."'".$d->id_aktivitas."'".')"><i class="fa fa-share-square"></i></button>
                        <button type="button" class="btn btn-warning btn-xs btn-flat" data-toggle="tooltip" title="Ubah Data Aktivitas" data-original-title="Ubah Data Aktivitas" onclick="edit('."'".$d->id_aktivitas."'".')"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" title="Hapus Data Aktivitas" data-original-title="Hapus Data Aktivitas" onclick="remove('."'".$d->id_aktivitas."',"."'".$d->kode_aktivitas."',"."'".$d->nama_aktivitas."'".')"><i class="fa fa-close"></i></button>
                        ';
                }elseif($d->status_aktivitas==1){
                    $status = '<span class="label label-success">'.$d->keterangan_status_aktivitas.'</span>';
                    $button = '
                <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="Lihat Data Aktivitas" data-original-title="Lihat Data Aktivitas" onclick="detail('."'".$d->id_aktivitas."'".')"><i class="fa fa-share-square"></i></button>
				';
                }else{
                    $status = '<span class="label label-danger">'.$d->keterangan_status_aktivitas.'</span>';
                    $button = '
                <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="Lihat Data Aktivitas" data-original-title="Lihat Data Aktivitas" onclick="detail('."'".$d->id_aktivitas."'".')"><i class="fa fa-share-square"></i></button>
				';
                }
            }
			else{
            }

			$row[] = $no++;
			$row[] = $d->kode_aktivitas;
			$row[] = $d->nama_aktivitas;
			$row[] = Conversion::convert_date($d->tgl_aktivitas,'d-m-Y');
            $row[] = $d->username;
            $row[] = $status;
            $row[] = $d->nama_jabatan;
            //add html for action
			$row[] = $button;
			$data[] = $row;
		}

		$output = array(
			"recordsTotal"      => $this->AktivitasModel->find_view()->num_rows(),
			"recordsFiltered"   => $this->AktivitasModel->find_view()->num_rows(),
			"data"              => $data,
		);
		//output to json format
		echo json_encode($output);
	}

    public function ajax_edit($id)
    {
        $data = $this->AktivitasModel->get_view_by_id($id);
        echo json_encode($data);
    }

    /**
     * @param array $input
     */
    public function ajax_add()
    {
        $input = [
            AktivitasModel::t_id_user               => $this->role->user_id_yang_login(),
            AktivitasModel::t_kode_aktivitas        => $this->AktivitasModel->generate_kode_aktivitas(),
            AktivitasModel::t_tgl_aktivitas         => $this->input->post(AktivitasModel::t_tgl_aktivitas),
            AktivitasModel::t_nama_aktivitas        => $this->input->post(AktivitasModel::t_nama_aktivitas),
            AktivitasModel::t_keterangan_aktivitas  => $this->input->post(AktivitasModel::t_keterangan_aktivitas),
            AktivitasModel::t_pengerjaan_aktivitas  => $this->input->post(AktivitasModel::t_pengerjaan_aktivitas),
            AktivitasModel::t_status_aktivitas      => 0, //default = 0 => pengajuan, belum di setujui
            AktivitasModel::t_deleted               => 0 //default = 0 => aktif, belum di delete,
        ];
        $this->_validate($input);
        $this->AktivitasModel->save($input);
        echo json_encode([
            "status"    => TRUE,
            "messages"  => 'Data User <b>'.$input[AktivitasModel::t_kode_aktivitas].' - '.$input[AktivitasModel::t_nama_aktivitas].'</b> Berhasil Di Tambahkan!'
        ]);
    }

    /**
     * @param array $input
     */
    public function ajax_update()
    {
        $data = [
            AktivitasModel::t_keterangan_aktivitas  => $this->input->post(AktivitasModel::t_keterangan_aktivitas),
            AktivitasModel::t_nama_aktivitas        => $this->input->post(AktivitasModel::t_nama_aktivitas),
            AktivitasModel::t_pengerjaan_aktivitas  => $this->input->post(AktivitasModel::t_pengerjaan_aktivitas),
            AktivitasModel::t_tgl_aktivitas         => $this->input->post(AktivitasModel::t_tgl_aktivitas),
        ];
        $this->_validate($data,true);
        $this->AktivitasModel->update($this->input->post(AktivitasModel::t_id_user), $data);
        echo json_encode([
            "status" => TRUE,
            "messages"  => 'Karyawan <b>'.$this->input->post(AktivitasModel::t_kode_aktivitas).'</b> Berhasil Diubah!'
        ]);
    }

    public function ajax_delete($id)
    {
        $aktivitas = $this->AktivitasModel->get_by_id($id);
        if($aktivitas){
            $data = [
                AktivitasModel::t_deleted => 1
            ];
            $this->AktivitasModel->update($id, $data);
            /** @var AktivitasModel $aktivitas */
            echo json_encode([
                "status"    => TRUE,
                "messages"  => 'Data Aktivitas <b>'.$aktivitas->kode_aktivitas.'</b> Berhasil Dihapus!',
            ]);
        }else{
            echo json_encode([
                "status"    => FALSE,
                "messages"  => 'Data Aktivitas Tidak Berhasil Dihapus!',
            ]);
        }
    }

    public function ajax_approve($id)
    {
        $aktivitas = $this->AktivitasModel->get_by_id($id);
        /** @var AktivitasModel $aktivitas */
        if($aktivitas){

            $alasan     = $this->input->post('alasan');
            //input penolakan ke tabel persetujuan
            $input = [
                'id_user'           => $this->role->user_id_yang_login(),
                'id_aktivitas'      => $aktivitas->id_aktivitas,
                'jenis_persetujuan' => 1, // 0=penolakan | 1 = persetujuan
                'alasan'            => $alasan
            ];
            $this->PersetujuanModel->save($input);//input data ke tabel persetujuan


            $data = [
                AktivitasModel::t_status_aktivitas => 1
            ];
            $this->AktivitasModel->update($id, $data);
            /** @var AktivitasModel $aktivitas */
            echo json_encode([
                "status"    => TRUE,
                "messages"  => 'Aktivitas <b>'.$aktivitas->kode_aktivitas.'</b> Berhasil Disetujui!',
            ]);
        }else{
            echo json_encode([
                "status"    => FALSE,
                "messages"  => 'Aktivitas Gagal Disetujui!',
            ]);
        }
    }

    public function ajax_reject($id)
    {
        //post data alasan
        $alasan     = $this->input->post('alasan');

        //cari dataaktivitas by id aktivitas
        $aktivitas  = $this->AktivitasModel->get_by_id($id);

        /** @var AktivitasModel $aktivitas */
        if($aktivitas){

            //input penolakan ke tabel persetujuan
            $input = [
                'id_user'           => $this->role->user_id_yang_login(),
                'id_aktivitas'      => $aktivitas->id_aktivitas,
                'jenis_persetujuan' => 0, // 0=penolakan | 1 = persetujuan
                'alasan'            => $alasan
            ];
            $this->PersetujuanModel->save($input);//input data ke tabel persetujuan

            //update status aktivitas  = 2
            $data = [
                AktivitasModel::t_status_aktivitas => 2
            ];
            $this->AktivitasModel->update($id, $data); // input data ke tabel aktivitas
            /** @var AktivitasModel $aktivitas */
            echo json_encode([
                "status"    => TRUE,
                "messages"  => 'Aktivitas <b>'.$aktivitas->kode_aktivitas.'</b> Berhasil Ditolak!',
            ]);
        }else{
            echo json_encode([
                "status"    => FALSE,
                "messages"  => 'Aktivitas Gagal Ditolak. Hubungi Admin!',
            ]);
        }
    }

    /**
     * @param array $input
     */
    private function _validate($input =[],$update = false)
    {
        $this->load->library('form_validation');
        $data                   = [];
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['notiferror']     = array();
        $data['status']         = TRUE;

        //Custom Validation
        if($update) //validasi update data
        {

        }else{//validasi add data

        }

        //set messages validation for every rule
        //validasi input
        $prefix = '<small class="help-block">';
        $suffix = '</small>';
        $this->form_validation->set_rules(AktivitasModel::t_nama_aktivitas, 'Nama AKtivitas', 'trim|min_length[5]|required');
        $this->form_validation->set_rules(AktivitasModel::t_tgl_aktivitas, 'Tanggal Aktivitas', 'required');
        $this->form_validation->set_rules(AktivitasModel::t_pengerjaan_aktivitas, 'Pengerjaan Aktivitas', 'required');

        if ($this->form_validation->run() == FALSE){

            if(form_error(AktivitasModel::t_nama_aktivitas)){
                $error                  = form_error(AktivitasModel::t_nama_aktivitas,$prefix,$suffix);
                $data['inputerror'][]   = AktivitasModel::t_nama_aktivitas;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }

            if(form_error(AktivitasModel::t_tgl_aktivitas)){
                $error                  = form_error(AktivitasModel::t_tgl_aktivitas,$prefix,$suffix);
                $data['inputerror'][]   = AktivitasModel::t_tgl_aktivitas;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }

            //cek untuk kolom email
            if(form_error(AktivitasModel::t_pengerjaan_aktivitas)){
                $error                  = form_error(AktivitasModel::t_pengerjaan_aktivitas,$prefix,$suffix);
                $data['inputerror'][]   = AktivitasModel::t_pengerjaan_aktivitas;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }
        }

        //kirim status validasi error
        if(!$data['status'])
        {
            $data['sw_alert'] = FALSE;
            echo json_encode($data);
            exit();
        }
    }

    /**
     * @return mixed
     */
    function upload_foto(){
        $config['upload_path']          = './assets/uploads/foto_profile';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000; //maksimal 2mb
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload(AktivitasModel::t_foto)) //important!
        {
            return false; //associate view variable $error with upload errors
        }
        else
        {
            return $this->upload->data();
        }
    }

    public function tes($id = 6){
        print_r($this->cek_user_aktivitas_persetujuan($id));
    }

    function cek_user_aktivitas_persetujuan($id_aktivitas = 0){
        $level_login    = $this->role->level();
        $id_user_login  = $this->role->user_id_yang_login();
        /** @var UserModel $jabatan */
        $jabatan        = $this->UserModel->get_view_by_id($id_user_login);
        /** @var AktivitasModel $aktivitas */
        $aktivitas      = $this->AktivitasModel->get_view_by_id($id_aktivitas);
        if($level_login == 3){ // yang login harus dengan level KASUBAG untuk bisa setujui / tolak
            if($aktivitas){
                return $aktivitas->id_parent_jabatan == $jabatan->id_jabatan;
            }
            return false;
        }
            return false;
    }


}
