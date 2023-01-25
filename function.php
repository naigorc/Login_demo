<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS' ,'root');
define('DB_NAME', 'members');
define('PORT', '3306');

//$mysqli -> new mysqli(host, username, password, dbname, port, socket)
class DB_con
{
	function __construct()
	{
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME, PORT);
		$this->dbh = $con;
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
 		}
	}

	// user availability
	public function usernameavailblty($uname) 
	{
		$result =mysqli_query($this->dbh,"SELECT Username FROM tblusers WHERE Username='$uname'");
		return $result;
	}

	// Registration
	public function registration($fname,$uname,$uemail,$pasword)
	{
	$ret=mysqli_query($this->dbh,"insert into tblusers(FullName,Username,UserEmail,Password) values('$fname','$uname','$uemail','$pasword')");
	return $ret;
	}

	// Sign in
	public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->dbh,"select id,FullName from tblusers where Username='$uname' and Password='$pasword'");
	return $result;
	}

}

?>