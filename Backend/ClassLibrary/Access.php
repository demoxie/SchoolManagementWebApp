<?php
//namespace School;
require("../../Backend/server/Database.php");
$connect = new Db();

class Access extends Db
{
    public $username;
    public $password;
    public $role;
    public $accountCreatedStatus;
    public $registeredStatus;
    // $error=array("alert alert-danger":"Account exist proceed to login here", "alert alert-warning":"You're not registered, please register first");
    
    // Db connection
    public $connect;


    public function __construct($connect)
    {

        $this->connect = $connect;
        //$this->username= $username;
        //$this->password= $password;

    }
    public function getUserRole($username)
    {
        try{
            $query = $this->connect->prepare("SELECT role FROM role WHERE username='$username'");
            $query->execute();
            $role=$query->fetch();
            return $role['role'];
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function checkIfUserExists($username, $password)
    {
        try {
            $query = $this->connect->prepare("SELECT `id`, `username` FROM `logindetails` WHERE `username` = '$username'");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfRegistered($username)
    {
        try {
            $query = $this->connect->prepare("SELECT username FROM role WHERE username='$username'");
            $query->execute();
            return $query->rowCount();

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    

    public function createloginAccount($username, $password)
    {
        
        try {
            $registeredStatus=$this->checkIfRegistered($username);
            $accountCreatedStatus=$this->checkIfUserExists($username, $password);
            $role = $this->getUserRole($username);
            //print_r($accountCreatedStatus);
            //die();
            if(($registeredStatus > 0) && ($accountCreatedStatus <= 0 )){
            $sql = $this->connect->prepare("INSERT INTO `logindetails`(`id`, `username`, `password`, `role`) VALUES (null,'$username','$password','$role')");
            $sql->execute();
            echo "Account created Successfully";
                //$this->loginRedirect($username);
            }else if(($registeredStatus <= 0) && ($accountCreatedStatus > 0 )){
                echo "You're unauthorized to access";
            }else if(($registeredStatus > 0) && ($accountCreatedStatus > 0)){
               echo " Account exists already you may login here...";
                //header("location: ../../Access/daily_attendance.php");
            }else{
                echo "You're not registered yet, please proceed to register first";
            }
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        
        //if(isset($_SESSION['username']) && isset($_SESSION['password'])){
           // echo "welcome";
//$this->welcome();
        //}else{
            $registeredStatus=$this->checkIfRegistered($username);
            $accountCreatedStatus=$this->checkIfUserExists($username, $password);
            $role = $this->getUserRole($username);
            //print_r($accountCreatedStatus);
        if(($registeredStatus > 0) && ($accountCreatedStatus <= 0 )){
            echo "Create first before login in";
                //$this->loginRedirect($username);
            }else if(($registeredStatus <= 0) && ($accountCreatedStatus > 0 )){
                echo "You're unauthorized to access";
            }else if(($registeredStatus > 0) && ($accountCreatedStatus > 0)){
               echo "Welcome";
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            $_SESSION['role']=$role;
                //header("location: ../../Access/daily_attendance.php");
            }else{
                echo "You're not registered yet, please proceed to register first";
            }
       // }
        
        
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
    }

    public function welcome()
    {

    }

    public function loginRedirect($username)
    {
        $role=$this->getUserRole($username);
        switch ($role) {
            case 'Student':
                echo "Hi $role";
                //header("location: daily_attendance.php");
                break;
            case 'AcademicStaff':
                 echo "Hi $role";
                //header("location: login.php");
                break;
            case 'NonAcademyStaff':
                 echo "Hi $role";
                //header("location: login.php");
                break;
            default:
                 echo "Hi $role";
                header("location: login.php");
        }
    }

    public function registerRedirect($username)
    {
        $role=$this->getUserRole($username);
        if ($role === 'Student') {
            windows.location.registration.php;
        } else if($role === 'Teacher'){
            $this->welcome() . windows.location.student.index.php;
        }else {
            echo "Contact school admin to register you";
        }

    }

}
