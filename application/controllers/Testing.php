<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function tabel($table = null){
		$this->load->library('Conversion');

		$result         = $this->db->list_fields($table);
		$primarykey     = $result[0];
		$query          = $this->db->list_fields($table);
		echo "//Models<br>";

		if (strpos(strtolower($table),'v') == 0){
			echo '//for column view<br>';
			foreach ($query as $value){
				echo 'const v_'.$value.'   =   "'.$value.'";<br>';
			}

			echo '<br>//for column table<br>';
			$query2      = $this->db->list_fields(str_replace('v_','',$table));
			foreach ($query2 as $value){
				echo 'const t_'.$value.'   =   "'.$value.'";<br>';
			}

			echo '<br>';

			foreach ($query as $value){
				echo 'public $'.$value.';<br>';
			}

			$hasil =$query2;
		}else{
			echo '//for column table<br>';
			foreach ($query as $value){
				echo 'const '.$value.'   =   "'.$value.'";<br>';
			}

			echo '<br>';

			foreach ($query as $value){
				echo 'public $'.$value.';<br>';
			}
            $hasil =$query;
		}

		echo '<br>var $table        = '."'".str_replace("v_","",$table)."';";
		echo '<br>';
		echo 'var $table_data   = '."'".$table."';";
		echo '<br>';
		echo 'var $primary_key  = '."'".$primarykey."';";
		echo '<br>';

		echo "<br><br>//Controllers<br>";
		echo "private".'$layout'."     = 'template/layout';";
		echo '<br>';
		echo "private".'$index_path'." = 'master/".strtolower(str_replace("v_","",$table))."/';";
		echo '<br>';
		echo "private".'$path_view'."  = 'pages/master/".strtolower(str_replace("v_","",$table))."/';<br><br>";

        echo '$input = [<br>'."'update'          =>".' $this->input->post'."('update'),<br>";
        foreach ($hasil as $value){
            echo ucfirst(str_replace('v_','',$table)).'Model'.'::t_'.$value.'=> $this->input->post'."(".ucfirst(str_replace('v_','',$table)).'Model'.'::t_'.$value."),<br>";
        }
        echo "];<br><br>";


        echo '$data = [<br>'."'update'          => ".'$input['."'update'],<br>";
        foreach ($hasil as $value){
            echo ucfirst(str_replace('v_','',$table)).'Model'.'::t_'.$value.'=> $input['.ucfirst(str_replace('v_','',$table)).'Model'.'::t_'.$value."],<br>";
        }
        echo "];";

	}


}
