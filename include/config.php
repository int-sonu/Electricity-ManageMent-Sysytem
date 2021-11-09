<?php

session_start();

class Db{

	private $db = "electricity";
	Private $user = "root";
	private $host = "localhost";
	private $pass = "";
	protected $con;

	public function __construct(){
		$this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
	}
}

class Datawork extends Db{
	
	function __construct(){
		parent::__construct();
	}

	public function insertData($table,$fields){
		$query = $this->con->query("INSERT INTO $table $fields");

		return ($query)? true : false;
	}


    public function checkData($table,$cond=null){
         
        $query = "SELECT * FROM $table WHERE $cond";
		$data = $this->con->query($query);
		$row = $data->fetch_array();
		$count = $data->num_rows;

		if($count > 0):
			return true;
		else:
			return false;
		endif;
	}

	public function callingData($table,$cond=null){
		$array = array();

		if ($cond==null) {
			$query = "SELECT * FROM $table";
		}
		else{
			$query = "SELECT * FROM $table WHERE $cond";
		}

		$data = $this->con->query($query);

		while ($row = $data->fetch_array()){
			$array[] = $row;
		}
		
		return $array;
	}

   public function redirect($page){
	echo "<script>window.open('$page.php','_self')</script>";
    }

    public function updateData($table,$fields,$cond){
		$query = $this->con->query("UPDATE $table SET $fields WHERE $cond");
		return ($query)? true : false;
	}
	
}
//creating new object
$data = new Datawork();
?>
