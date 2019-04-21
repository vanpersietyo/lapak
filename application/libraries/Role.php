<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 20/02/2019
 * Time: 13:18
 */

class Role
{
    /** MAPPING level di table level */
    const LEVEL_ROOT		= 1;
    const LEVEL_KABAG		= 2;
    const LEVEL_KASUBAG     = 3;
    const LEVEL_PELAKSANA   = 4;

    public function __construct()
    {
        $this->CI =& get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function is_login(){
        if($this->CI->session->userdata('logged_in') != true) redirect(site_url('login'));
    }

    public function user_yang_login(){
        if($this->CI->session->userdata('username')){
            return $this->CI->session->userdata('username');
        }else{
            return 'nouser';
        }
    }
    public function nama_user_login(){
        if($this->CI->session->userdata('nama')){
            return $this->CI->session->userdata('nama');
        }else{
            return '-';
        }
    }

    public function user_id_yang_login(){
        if($this->CI->session->userdata('id_user')){
            return $this->CI->session->userdata('id_user');
        }else{
            return 'nouser';
        }
    }

    public function level()
    {   if($this->CI->session->userdata('level')){
            return $this->CI->session->userdata('level');
        }else{
            return 999;
        }
    }

    public function nama_level()
    {   if($this->CI->session->userdata('nama_level')){
            return $this->CI->session->userdata('nama_level');
        }else{
            return 'no_level';
        }
    }

    public function jabatan()
    {   if($this->CI->session->userdata('jabatan')){
            return $this->CI->session->userdata('jabatan');
        }else{
            return false;
        }
    }

    public function nama_jabatan()
    {   if($this->CI->session->userdata('nama_jabatan')){
            return $this->CI->session->userdata('nama_jabatan');
        }else{
            return null;
        }
    }

    public function show_session($name)
    {
        return $this->CI->session->userdata($name);
    }


}