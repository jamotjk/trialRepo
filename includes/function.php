<?php 

/**
 * 
 */
class MyQuery extends DbConnect
{
public $name;
public function try($roomType){

	$roomType =	$this->roomType=$roomType;
		$sql="SELECT room_id from room_mng where room_type=?";
		
		$result=$this->connect()->prepare($sql);
		
		$result->execute([$roomType]);
		
		if ($result->rowCount()) {
	
		while ($row = $result->fetch()) {

		$data[] = $row;

		}return $data;
	}
}
	public function select_roomType()
	{

		$sql="SELECT distinct room_type from room_mng";

		$result=$this->connect()->query($sql);

		if ($result->rowCount()) {
	
		while ($row = $result->fetch()) {

			$data[] = $row;

		}return $data;
	}
}
public function insert_data($user,$pass){

	if((!empty($user)||!empty($pass))){
$sql="INSERT INTO users VALUES (:username, :password)";
		
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(array(':username'=>$user, ':password'=>$pass));

		echo '<script>alert("record Susccessfully")</script>';
		echo '<script>window.location.href = "index.php";</script>';
	}else{
		echo '<script>alert("Failed")</script>';
		echo '<script>window.location.href = "index.php";</script>';
	}
}

	public function insert_standardRate($room_id,$weekend,$weekly,$monthly,$date,$time){
		$sql="INSERT INTO standard_rate_tbl VALUES (:room_id, :weekend, :weekly, :monthly, :date_created, :time_created, :descript, :rate_status)";
		
		$stmt=$this->connect()->prepare($sql);
$stmt->execute(array(':room_id'=>$room_id, ':weekend'=>$weekend, ':weekly'=>$weekly,':monthly'=>$monthly,':date_created'=>$date,':time_created'=>$time,':decript'=>'standard', ':rate_status'=>' '));

		echo '<script>alert("record Susccessfully")</script>';
		echo '<script>window.location.href = "RM_standardRate.php";</script>';

	}


}
 ?>