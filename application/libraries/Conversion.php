<?php
/**
 * Created by PhpStorm.
 * User: Candra Dewi
 * Date: 12/12/2018
 * Time: 15:27
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversion {

    public function __construct()
    {
        $this->CI =& get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    function hak_akses_admin() // hak akses level 1 = superadmin ; 2=admin ; 3=gudang
    {
        $level = $this->CI->session->userdata('level');
        if ($level==1 or $level==2 or $level==3 or $level==6){
            $this->CI->load->model('admin_model');
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function hak_akses_pelanggan() // hak akses level 5 = pelanggan
    {
        $level = $this->CI->session->userdata('level');
        if ($level==5){
            $this->CI->load->model('pelanggan_model');
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_level($level_id = null)
    {
        if ($level_id == null){
            $level = $this->CI->session->userdata('level');
        } else {
            $level = $level_id;
        }

        if ($level==1){
            return 'root';
        }elseif ($level==2){
            return 'kabag';
        }elseif ($level==3){
            return 'kasubag';
        }elseif ($level==4){
            return 'pelaksana';
        }else{
            return false;
        }
    }

    /**
     * @param $value
     * @return string
     * Function spell untuk mengeja nominal uang
     */
    public static function spell($value){
        $str = '';
        if ($value == 0) {
            $str = "nihil";
        } else {
            $basic = array(1=>'satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan');
            $number = array(1000000000000,1000000000,1000000,1000,100,10,1);
            $unit = array('triliun','milyar','juta','ribu','ratus','puluh','');

            $i=0;
            while($value!=0){
                $count = (int)($value/$number[$i]);
                if($count>=10) $str .=  self::spell($count). " ".$unit[$i]." ";
                else if($count > 0 && $count < 10)
                    $str .= $basic[$count] . " ".$unit[$i]." ";
                $value -= $number[$i] * $count;
                $i++;
            }
            $str = preg_replace("/satu puluh (\w+)/i","\\1 belas",$str);
            $str = preg_replace("/satu (ribu|ratus|puluh|belas)/i","se\\1",$str);
        }
        return ucwords($str);
    }

    /**
     * @param $tanggal
     * @param int $jenis
     * @return string
     */
    public static function dateIndo($tanggal, $jenis = 0){
        $iMonth= date('n',strtotime($tanggal));
        if($jenis)
        {
            $bulan= array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
        }
        else
        {
            $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nop','Des');
        }
        $hari  = date('d',strtotime($tanggal));
        $bln   = $bulan[$iMonth];
        $tahun = date('Y',strtotime($tanggal));

        return $hari." ".$bln." ".$tahun;
    }

    public static function hariIndo($date = null){
//        if ($date){
//            $hari = self::convert_date($date.'D');
//        }else{
            $hari = date('D');
//        }

        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;

    }

    /**
     * @param $kode
     * @param int $jenis
     * @return mixed
     */
    public static function monthIndo($kode, $jenis = 0){
        if($jenis)
        {$bulan= array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');}
        else
        {$bulan= array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nop','Des');}

        return $bulan[(int)$kode];
    }

    /**
     * @param $tgl
     * @param $format
     * @return false|string
     */
    public static function convert_date($tgl, $format = 'd-m-Y H:i'){
        if($tgl === '0000-00-00 00:00:00'){
            return '-';
        }
        return date_format(date_create($tgl),$format);
    }

    /**
     * @param $tgl
     * @param $format
     * @return false|string
     */
    public static function get_date($format = null){
        if(empty($format)){
            return date('d-m-Y H:i:s');
        }else{
            return date($format);
        }
    }

    public static function convert_local_datetime($data,$format){
        list($date,$time) = explode('T',$data);
        $newdate =  date_create($date.' '.$time.':'.date('s'));
        return date_format($newdate,$format);
    }

    public static function convert_to_local_datetime($date = null){
        if (empty($date)){
            return date('Y-m-d').'T'.date('H:i');
        }else{
            return Conversion::convert_date($date,'Y-m-d').'T'.Conversion::convert_date($date,'H:i');
        }
    }

    /**
     * @param $value
     * @return string
     */
    public static function numberFormat($value)
    {
        return number_format($value, 0, ',', '.');
    }

    /**
     * @param $nilai
     * @return string
     */
    public static function formatMinus($nilai){
        if($nilai>0){
            return self::numberFormat($nilai);
        }else if($nilai==0){
            return "-";
        }else{
            $nilai = substr($nilai,1, strlen($nilai));
            return '('.self::numberFormat($nilai).')';
        }
    }

    /**
     * @param string|int|float $value
     * @return int */
    public static function toInteger($value) {
        $array      = explode('.', $value);
        $separator   = ( strlen(end($array)) !== 2 ) ? '.' : ',';
        $decimal     = ( strlen(end($array)) === 2 ) ? '.' : ',';
        return (int) str_replace($decimal, '.', str_replace($separator, '',  $value));
    }

    public static function romawi($num){
        $n = intval($num);
        $res = '';
        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1);
        foreach ($roman_numerals as $roman => $number){
            /*** divide to get  matches ***/
            $matches = intval($n / $number);
            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);
            /*** substract from the number ***/
            $n = $n % $number;
        }
        /*** return the res ***/
        return $res;
    }

    public static function show_debug($data,$die = false){
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
        if($die){
            die();
        }
    }

}