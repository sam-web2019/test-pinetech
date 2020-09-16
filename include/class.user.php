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

/*** for login process ***/
public function check_login($email, $password){
    $conn = db();
    $password = md5($password);
    $sql="SELECT id from users WHERE email='$email' and upassword='$password'";
    
    //checking if the username is available in the table
    $result    = $conn->query($sql);
    $user_data = $result->fetch_assoc();
    $count_row = $result->num_rows;
    
    if ($count_row == 1) {
    // this login variable will use for the session thing
    $_SESSION['login'] = true;
    $_SESSION['uid'] = $user_data['id'];
    return true;
    }
    else{
    return false;
    }
    }
    
    /*** for showing the username or fullname ***/
    public function get_fullname($uid)
    {
        $conn = db();
        $sql="SELECT first_name,last_name FROM users WHERE id = $uid";
        $result = $conn->query($sql);
        $user_data = $result->fetch_assoc();
        echo $user_data['first_name'];
    }
    
    /*** starting the session ***/
    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

    


}

?>
