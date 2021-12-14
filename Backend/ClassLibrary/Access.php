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
    // $error = array( "alert alert-danger":"Account exist proceed to login here", "alert alert-warning":"You're not registered, please register first" );

    // Db connection
    public $connect;

    public function __construct($connect)
    {

        $this->connect = $connect;
        //$this->username = $username;
        //$this->password = $password;

    }

    public function getUserRoleID($username)
    {
        try {
            $query = $this->connect->prepare("SELECT roleID FROM role WHERE username='$username'");
            if ($query->execute()) {
                if ($query->rowCount() > 0) {
                    $role = $query->fetch(PDO::FETCH_ASSOC);
                    return $role['roleID'];
                } else {
                    return "doesn't exist";
                }

            } else {
                return 'failed';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getRole($username)
    {
        try {
            $query = $this->connect->prepare("SELECT students.name,role.role FROM `students` INNER JOIN role ON role.username=students.admissionNO AND role.username='$username'");
            if ($query->execute()) {
                if ($query->rowCount() > 0) {
                    $role = $query->fetch(PDO::FETCH_ASSOC);
                    return $role;
                } else {
                    return "doesn't exist";
                }

            } else {
                return 'failed';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfUserExists($username, $password)
    {
        try {
            $query = $this->connect->prepare("SELECT `password` FROM `logindetails` WHERE `username` = '$username'");
            if ($query->execute()) {
                if ($query->rowCount() > 0) {
                    return 1;
                } else {
                    return 0;
                }

            }


            return $query->rowCount();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function checkIfRegistered($username)
    {
        try {
            $query = $this->connect->prepare("SELECT `username` FROM `role` WHERE `username`='$username'");
            if ($query->execute()) {
                return $query->rowCount();
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function createloginAccount($username, $password): string
    {

        try {
            $registeredStatus = $this->checkIfRegistered($username);
            $accountCreatedStatus = $this->checkIfUserExists($username, $password);
            $roleID = $this->getUserRoleID($username);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if ($registeredStatus > 0) {
                if ($accountCreatedStatus > 0) {
                    return "exists";
                    //header( "location: ../../Access/daily_attendance.php" );
                } else {
                    $sql = $this->connect->prepare("INSERT INTO `logindetails`(`loginID`, `username`, `password`, `roleID`) VALUES (null,'$username','$hashedPassword',$roleID)");
                    if ($sql->execute()) {
                        return "true";
                    }
                }

            } else {
                return "You're not registered yet, please proceed to register";
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        try {

            $accountCreatedStatus = $this->checkIfUserExists($username, $password);
            $role = $this->getRole($username);
            if ($accountCreatedStatus > 0) {
                $query = $this->connect->prepare("SELECT `password` FROM `logindetails` WHERE `username` = '$username'");
                if ($query->execute()) {
                    $savedPassword = $query->fetch(PDO::FETCH_ASSOC);
                    $hashedPassword = $savedPassword['password'];
                    if (isset($_SESSION['password'])) {
                        $sessionPassword = $_SESSION['password'];
                        if (password_verify($password, $hashedPassword) && password_verify($password, $sessionPassword)) {
                            return $role;
                        } else {
                            return array('error' => 'Wrong login details, try again');
                        }
                    } else {
                        if (password_verify($password, $hashedPassword)) {
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
                            $_SESSION['login_time'] = time();
                            return $role;
                        } else {
                            return array('error' => 'Wrong login details, try again');
                        }
                    }

                }
                //header( "location: ../../Access/daily_attendance.php" );
                //AGM/SEC/2021/1/306913
            } else {
                return array('error' => 'Invalid login details');
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function logout()
    {
        try {
            session_unset();
            session_destroy();
            return 'login';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function welcome()
    {
        try {
            if (isset($_SESSION["username"]) && isset($_SESSION['password'])) {
                if (time() - $_SESSION["login_time"] >= 1800) {
                    $this->logout();
                } else {
                    return 'continue';
                }
            } else {
                return 'login';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function registerRedirect($username)
    {
        $role = $this->getUserRole($username);
        if ($role === 'Student') {
            windows . location . registration . php;
        } else if ($role === 'Teacher') {
            $this->welcome() . windows . location . student . index . php;
        } else {
            echo "Contact school admin to register you";
        }

    }

}