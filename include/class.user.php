<?php  
	include 'connection.php';

	class User{
	public $db;

	/*** for registration process ***/
public function reg_user($firstname, $lastname,$password, $email,$dob){
$conn = db();
$password = md5($password);
$var = $dob;
$date = str_replace('/', '-', $var);
$dob = date('Y-m-d', strtotime($date));
$sql="SELECT * FROM users WHERE  email='$email'";

//checking if the username or email is available in db
$check = $conn->query($sql);
$count_row = $check->num_rows;

//if the username is not in db then insert to the table
if ($count_row == 0){
$sql="INSERT INTO users SET first_name='$firstname', last_name='$lastname', email='$email', upassword='$password', dob='$dob'";
$result = $conn->query($sql);
return $result;
}
else {
	return false;
 }
}


}

?>
