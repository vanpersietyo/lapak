<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 27/10/2018
 * Time: 11:16
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property login_model     $login_model
 * @property admin_model     $admin_model
 * @property Conversion      $conversion
 */
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')==FALSE){
            show_404();
        }
        $this->load->model('UserModel');
        $this->load->model('JabatanModel');
    }

	public function index()
	{
	    $data = [
            'page'              => 'pages/master/user/user_list',
            'title'             => 'Daftar',
            'subtitle'          => 'User',
            'list_jabatan'      => $this->JabatanModel->find_view()->result()
        ];
        $this->load->view('templates/layout', $data);
	}

	public function ajax_list() {
		header('Content-Type: application/json');
		$where  =   [
		                UserModel::t_deleted => 0
                    ];
		$order  =   [
		                'column' => UserModel::t_date_created,
                        'option' => 'desc'
                    ];
		$list   = $this->UserModel->find_view($where,$order)->result();
		$data   = [];
		/** @var UserModel $d */
		$no =1 ;
		foreach ($list as $d) {
			$row = array();
			$row[] = $no++;
			$row[] = $d->kode_user;
			$row[] = $d->username;
			$row[] = $d->nama;
			$row[] = $d->nama_level;
			$row[] = $d->nama_jabatan;
			//add html for action
			$row[] = '
                <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="Reset Password User" data-original-title="Reset Password User" onclick="reset('."'".$d->id_user."',"."'".$d->kode_user."',"."'".$d->username."'".')"><i class="fa fa-key"></i></button>
                <button type="button" class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" title="Ubah Data User" data-original-title="Ubah Data User" onclick="edit('."'".$d->id_user."'".')"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" title="Hapus Data User" data-original-title="Hapus Data User" onclick="remove('."'".$d->id_user."',"."'".$d->kode_user."',"."'".$d->username."'".')"><i class="fa fa-close"></i></button>
				';
			$data[] = $row;
		}

		$output = array(
			"recordsTotal"      => $this->UserModel->find_view()->num_rows(),
			"recordsFiltered"   => $this->UserModel->find_view()->num_rows(),
			"data"              => $data,
		);
		//output to json format
		echo json_encode($output);
	}

    public function ajax_edit($id)
    {
        $data = $this->UserModel->get_view_by_id($id);
        echo json_encode($data);
    }

	public function ajax_do()
	{
        $input  = [
            'update'                        =>$this->input->post('update'),
            UserModel::t_id_user            =>$this->input->post(UserModel::t_id_user),
            UserModel::t_id_jabatan         =>$this->input->post(UserModel::t_id_jabatan),
            UserModel::t_kode_user          =>$this->input->post(UserModel::t_kode_user),
            UserModel::t_username           =>$this->input->post(UserModel::t_username),
            UserModel::t_password           =>$this->input->post(UserModel::t_password),
            UserModel::t_nama               =>$this->input->post(UserModel::t_nama),
            UserModel::t_jenis_kelamin      =>$this->input->post(UserModel::t_jenis_kelamin),
            UserModel::t_tempat_lahir       =>$this->input->post(UserModel::t_tempat_lahir),
            UserModel::t_tgl_lahir          =>$this->input->post(UserModel::t_tgl_lahir),
            UserModel::t_alamat             =>$this->input->post(UserModel::t_alamat),
            UserModel::t_telp               =>$this->input->post(UserModel::t_telp),
            UserModel::t_email              =>$this->input->post(UserModel::t_email),
            UserModel::t_bagian             =>$this->input->post(UserModel::t_bagian),
            UserModel::t_periode_kontrak    =>$this->input->post(UserModel::t_periode_kontrak),
            UserModel::t_tgl_awal_kontrak   =>$this->input->post(UserModel::t_tgl_awal_kontrak),
            UserModel::t_tgl_akhir_kontrak  =>$this->input->post(UserModel::t_tgl_akhir_kontrak),
            UserModel::t_tugas              =>$this->input->post(UserModel::t_tugas),
            UserModel::t_foto               =>$this->upload_foto(),
            UserModel::t_deleted            =>$this->input->post(UserModel::t_deleted),
            UserModel::t_date_created       =>$this->input->post(UserModel::t_date_created),
            UserModel::t_date_modified      =>$this->input->post(UserModel::t_date_modified),
        ];
		$this->_validate($input);
		if($input['update']==='true')
		{
            $this->ajax_update($input);
        }else{
            $this->ajax_add($input);
		}
	}

    /**
     * @param array $input
     */
    public function ajax_add($input = [])
    {
        $data = [
            UserModel::t_id_jabatan         =>$input[UserModel::t_id_jabatan],
            UserModel::t_username           =>$input[UserModel::t_username],
            UserModel::t_kode_user          =>$this->UserModel->generate_kode_user(),
            UserModel::t_password           =>md5($input[UserModel::t_password] ?: $input[UserModel::t_username]),
            UserModel::t_nama               =>$input[UserModel::t_nama],
            UserModel::t_jenis_kelamin      =>$input[UserModel::t_jenis_kelamin],
            UserModel::t_tempat_lahir       =>$input[UserModel::t_tempat_lahir],
            UserModel::t_tgl_lahir          =>$input[UserModel::t_tgl_lahir],
            UserModel::t_alamat             =>$input[UserModel::t_alamat],
            UserModel::t_telp               =>$input[UserModel::t_telp],
            UserModel::t_email              =>$input[UserModel::t_email],
            UserModel::t_bagian             =>$input[UserModel::t_bagian],
            UserModel::t_periode_kontrak    =>$input[UserModel::t_periode_kontrak],
            UserModel::t_tgl_awal_kontrak   =>$input[UserModel::t_tgl_awal_kontrak],
            UserModel::t_tgl_akhir_kontrak  =>$input[UserModel::t_tgl_akhir_kontrak],
            UserModel::t_tugas              =>$input[UserModel::t_tugas],
            UserModel::t_foto               =>$input[UserModel::t_foto]['file_name']
        ];

        $this->UserModel->save($data);
        echo json_encode([
            "status"    => TRUE,
            "messages"  => 'Data User <b>'.$data[UserModel::t_kode_user].' - '.$data[UserModel::t_username].'</b> Berhasil Di Tambahkan!'
        ]);
    }

    /**
     * @param array $input
     */
    public function ajax_update($input = [])
    {
        $data = [
            UserModel::t_id_jabatan         =>$input[UserModel::t_id_jabatan],
            UserModel::t_username           =>$input[UserModel::t_username],
            UserModel::t_nama               =>$input[UserModel::t_nama],
            UserModel::t_jenis_kelamin      =>$input[UserModel::t_jenis_kelamin],
            UserModel::t_tempat_lahir       =>$input[UserModel::t_tempat_lahir],
            UserModel::t_tgl_lahir          =>$input[UserModel::t_tgl_lahir],
            UserModel::t_alamat             =>$input[UserModel::t_alamat],
            UserModel::t_telp               =>$input[UserModel::t_telp],
            UserModel::t_email              =>$input[UserModel::t_email],
            UserModel::t_bagian             =>$input[UserModel::t_bagian],
            UserModel::t_periode_kontrak    =>$input[UserModel::t_periode_kontrak],
            UserModel::t_tgl_awal_kontrak   =>$input[UserModel::t_tgl_awal_kontrak],
            UserModel::t_tgl_akhir_kontrak  =>$input[UserModel::t_tgl_akhir_kontrak],
            UserModel::t_tugas              =>$input[UserModel::t_tugas],
            UserModel::t_foto               =>$input[UserModel::t_foto]['file_name']
        ];
        $this->UserModel->update($input[UserModel::t_id_user], $data);
        echo json_encode([
            "status" => TRUE,
            "messages"  => 'Karyawan <b>'.$input[UserModel::t_kode_user].' - '.$data[UserModel::t_username].'</b> Berhasil Diubah!'
        ]);
    }

    public function ajax_delete($id)
    {
        $user = $this->UserModel->get_by_id($id);
        if($user){
            $data = [
                UserModel::t_deleted => 1
            ];
            $this->UserModel->update($id, $data);
            /** @var UserModel $data */
            echo json_encode([
                "status"    => TRUE,
                "messages"  => 'Data User <b>'.$user->kode_user.' - '.$user->username.'</b> Berhasil Dihapus!',
            ]);
        }else{
            echo json_encode([
                "status"    => FALSE,
                "messages"  => 'Data Karyawan Tidak Berhasil Dihapus!',
            ]);
        }
    }

    public function ajax_reset($id)
    {
        $user = $this->UserModel->get_by_id($id);
        /** @var UserModel $user */
        if($user){
            $data = [
                UserModel::t_password => md5($user->username)
            ];
            $this->UserModel->update($id, $data);
            /** @var UserModel $data */
            echo json_encode([
                "status"    => TRUE,
                "messages"  => 'Passwordd User <b>'.$user->kode_user.' - '.$user->username.'</b> Berhasil Direset!',
            ]);
        }else{
            echo json_encode([
                "status"    => FALSE,
                "messages"  => 'Password User Tidak Berhasil Direset!',
            ]);
        }
    }

    /**
     * @param array $input
     */
    private function _validate($input =[])
    {
        $this->load->library('form_validation');
        $data                   = [];
        $data['error_string']   = array();
        $data['inputerror']     = array();
        $data['notiferror']     = array();
        $data['status']         = TRUE;

        //Custom Validation
        if($input['update']=='true')
        {
            $where  =   [
                UserModel::t_username       => $input[UserModel::t_username],
                UserModel::t_deleted        => 0,
                UserModel::t_id_user.' !='  => $input[UserModel::t_id_user]
            ];
            $user   = $this->UserModel->find_view($where);
        }else{
            $where  =   [
                UserModel::t_username   => $input[UserModel::t_username],
                UserModel::t_deleted    => 0
            ];
            $user   = $this->UserModel->find_view($where);
        }

        //set messages validation for every rule
        $this->form_validation->set_message('alpha_numeric', '{field} Hanya Boleh Huruf Dan Angka {param}!');
        $this->form_validation->set_message('numeric', '{field} Hanya Boleh Berisi Angka {param}!');

        //validasi input
        $this->form_validation->set_rules(UserModel::t_username, ucfirst(UserModel::t_username), 'trim|alpha_numeric|min_length[5]|max_length[12]');
        $this->form_validation->set_rules(UserModel::t_password, ucfirst(UserModel::t_password), 'trim|min_length[8]');
        $this->form_validation->set_rules(UserModel::t_email, ucfirst(UserModel::t_email), 'valid_email');

        $this->form_validation->set_rules(
            UserModel::t_telp,
            'Telepon',
            'trim|numeric|min_length[11]|max_length[13]',
                [
                    'max_length' => 'Nomor {field} Maksimal {param} Angka!',
                    'min_length' => 'Nomor {field} Minimal {param} Angka!'
                ]
        );


        if ($this->form_validation->run() == FALSE){

            if(form_error(UserModel::t_password)){
                $error                  = form_error(UserModel::t_password,'<small class="help-block">','</small>');
                $data['inputerror'][]   = UserModel::t_password;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }

            if(form_error(UserModel::t_username)){
                $error                  = form_error(UserModel::t_username,'<small class="help-block">','</small>');
                $data['inputerror'][]   = UserModel::t_username;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }elseif ($user->num_rows() >= 1) {
                $error                  = 'Username Sudah Digunakan!';
                $template               = '<small class="help-block">'.$error.'</small>';
                $data['inputerror'][]   = UserModel::t_username;
                $data['notiferror'][]   = $template;
                $data['status']         = FALSE;
            }

            //cek untuk kolom email
            if(form_error(UserModel::t_email)){
                $error                  = form_error(UserModel::t_email,'<small class="help-block">','</small>');
                $data['inputerror'][]   = UserModel::t_email;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }

            //cek untuk kolom telepom
            if(form_error(UserModel::t_telp)){
                $error                  = form_error(UserModel::t_telp,'<small class="help-block">','</small>');
                $data['inputerror'][]   = UserModel::t_telp;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }
        }

        //vaidasi upload foto
        if($this->input->post(UserModel::t_foto)){

            if (!$input[UserModel::t_foto]) {
                $error                  = $this->upload->display_errors('<span class="help-block">','</span>');//'Username Sudah Digunakan!';
                $data['inputerror'][]   = UserModel::t_foto;
                $data['notiferror'][]   = $error;
                $data['status']         = FALSE;
            }
        }


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
        $config['max_size']             = 1000;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload(UserModel::t_foto)) //important!
        {
            return false; //associate view variable $error with upload errors
        }
        else
        {
            return $this->upload->data();
        }
    }

    /**
     * @param $id_jabatan
     */
    function get_hak_akses($id_jabatan = null){
        if($id_jabatan){
            /** @var JabatanModel $jabatan */
            $jabatan = $this->JabatanModel->get_view_by_id($id_jabatan);
            if($jabatan){
                $data   = [
                    'status'                        => true,
                    'messages'                      => $jabatan->nama_level,
                    JabatanModel::v_nama_level      => $jabatan->nama_level
                ];
            }else{
                $data   = [
                    'status'        => false,
                    'messages'      => 'Data Tidak Ditemukan',
                ];
            }
            echo json_encode($data);
        }
    }


}
