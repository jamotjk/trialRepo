<?php 

/**
 * 
 */
class DbConnect
{

	public function connect()
	{
		$this->servername="JAMOTJOHNKEVIN";
		$this->username="";
		$this->password="";
		$this->dbname="hrms_rate_management_DB";
		try {
			$dsn="sqlsrv:server=".$this->servername.";database=".$this->dbname;
			$pdo= new PDO($dsn, $this->username,$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;

		} catch (PDOException $e) {
			echo "Connection Failed" .$e->getMessage();
		}

	}
}


 ?>