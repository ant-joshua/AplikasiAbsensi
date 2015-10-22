<?php
class Database{
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $db_name="db_absensi";
	private $conn;

	public function __construct()
	{
		try{
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->user,$this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "error".$e->getMessage();
		}
	}

	public function proses_login($username,$password)
	{
		session_start();
		$login = $this->conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
		$login->execute(array(
				':username' => $username,
				':password' => $password
			));
		$row = $login->fetch(PDO::FETCH_ASSOC);
		if(empty($row['username']))
		{
			echo "your login name or password is invalid";
		}
		else
		{
			$_SESSION['username'] = $username;
			header('location:../index.php');
		}
	}

	public function cek_login()
	{
		session_start();
		$user_check = $_SESSION['username'];
		$login = $this->conn->prepare("SELECT * FROM user WHERE username = :username");
		$login->execute(array(
				':username' => $user_check
			));
		$row = $login->fetch(PDO::FETCH_ASSOC);
		$login_session = $row['username'];
		if(!isset($login_session))
		{
			header("location:login.php");
		}
	}

	public function logout()
	{

		session_unset("username");
		
		session_destroy();
		//header("location:login.php");
		echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	}

	public function select($query)
	{
		$this->sql = $this->conn->prepare($query);
		$this->sql->execute();
		return $this->sql;
	}

	public function show_data($query)
	{
		try{
			$q = $this->conn->query($query) or die("failed");

			while($row = $q->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}

			return $data;
		}catch(PDOException $e){
			echo "Error".$e->getMessage();
		}

		
	}

	public function getID($id,$table,$field)
	{
		$stmt = $this->conn->prepare("SELECT * FROM $table WHERE $field=:id");
		$stmt->BindParam(":id",$id);
		$stmt->execute();
		$editRow =$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;

	}

	public function Update()
	{
		
	}

}



?>