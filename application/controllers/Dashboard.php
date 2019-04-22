<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property login_model     $login_model
 * @property admin_model     $admin_model
 * @property Conversion      $conversion
 */
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
		$this->load->model('UserModel');
		$this->load->model('AktivitasModel');
    }

    public function index(){
        $file = strtolower($this->role->nama_level());
        $data=[
            'page'      => 'pages/dashboard/'.$file,//untuk set path halaman view yang di load
            'title'     => 'Dashboard', // untuk set title halaman
            'subtitle'  => $this->session->userdata('username') // untuk set  subtitle
        ];
        $this->load->view('templates/layout',$data);
    }

    public function profile(){
            $data=array(
                'page'      => 'pages/master/user/profile',
                'title'     => 'Profile',
                'subtitle'  => $this->conversion->get_level(),
                'user'      => $this->admin_model->cek_data(['kode_user'=>$this->session->userdata('kode_user')],'user')->row()
            );
            $this->load->view('templates/layout',$data);
    }

    public function ubah_profile(){
        $data=array(
            'page'      => 'pages/master/user/ubah_user',
            'title'     => 'Ubah Profile',
            'subtitle'  => $this->conversion->get_level(),
            'user'      => $this->admin_model->cek_data(['kode_user'=>$this->session->userdata('kode_user')],'user')->row()

        );
        $this->load->view('templates/layout',$data);
    }


}
