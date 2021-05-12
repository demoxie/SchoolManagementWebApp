<?php
require("../../Backend/server/Database.php");
//$connect = new Db();
class Upload extends Db
{
    public $file;
    public $role;
    public $function;
    public $connect;
    public $uploadOk;

    public function __construct($connect)
    {
        $this->connect = $connect;
        $uploadOk = 0;
        $this->uploadOk = $uploadOk;
    }

    /* public function roleRedirect($role)
     {


         $role = $this->getUserRole($_SESSION['username']);
         switch ($role) {
             case 'Student':
                 $this->uplaodStudentPassort();
                 break;
             case 'Staff':
                 $this->uploadStaffPassort();
                 break;
             default:
         }
     }*/

    public static function uplaodStudentPassort($file)
    {
        try {
            /*print_r($file);
            die();*/
            $target_dir = "../Src/uploads/students/";
            $target_file = $target_dir . basename($_FILES["passport"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_FILES["passport"]["name"])) {
                $check = getimagesize($_FILES["passport"]["tmp_name"]);
                if ($check == false) {
                    return parent::giveWarningAlert("File is not an image.");

                } else {
                    if (file_exists($target_file)) {

                        return parent::giveInfoAlert("Sorry, file already exists.");
                    } else if ($_FILES["passport"]["size"] > 500000) {

                        return parent::giveDangerAlert("Sorry, your file is too large.");
                    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        return parent::giveWarningAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    } else {

                        if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) {
                            //echo parent::giveSuccessAlert("The file " . basename($_FILES["file"]["name"]) . " has been uploaded.");
                            return basename($_FILES["passport"]["name"]);
                        } else {
                            return parent::giveDangerAlert("Sorry, there was an error uploading your file.");
                        }

                    }

                }


            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());
        }
    }


    public static function uploadStaffPassort($file)
    {

        try {
            /*print_r($file);
            die();*/
            $target_dir = "../Src/uploads/staffs/";
            $target_file = $target_dir . basename($_FILES["passport"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_FILES["passport"]["name"])) {
                $check = getimagesize($_FILES["passport"]["tmp_name"]);
                if ($check == false) {
                    return parent::giveWarningAlert("File is not an image.");

                } else {
                    if (file_exists($target_file)) {

                        return parent::giveInfoAlert("Sorry, file already exists.");
                    } else if ($_FILES["passport"]["size"] > 500000) {

                        return parent::giveDangerAlert("Sorry, your file is too large.");
                    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        return parent::giveWarningAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    } else {

                        if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) {
                            //echo parent::giveSuccessAlert("The file " . basename($_FILES["file"]["name"]) . " has been uploaded.");
                            return basename($_FILES["passport"]["name"]);
                        } else {
                            return parent::giveDangerAlert("Sorry, there was an error uploading your file.");
                        }

                    }

                }


            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());
        }
    }
    public static function uploadSchoolLogo($file)
    {

        try {
            /*print_r($file);
            die();*/
            $target_dir = "../Src/uploads/school/";
            $target_file = $target_dir . basename($_FILES["school_logo"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_FILES["school_logo"]["name"])) {
                $check = getimagesize($_FILES["school_logo"]["tmp_name"]);
                if ($check == false) {
                    return parent::giveWarningAlert("File is not an image.");

                } else {
                    if (file_exists($target_file)) {

                        return parent::giveInfoAlert("Sorry, file already exists.");
                    } else if ($_FILES["school_logo"]["size"] > 500000) {

                        return parent::giveDangerAlert("Sorry, your file is too large.");
                    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        return parent::giveWarningAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    } else {

                        if (move_uploaded_file($_FILES["school_logo"]["tmp_name"], $target_file)) {
                            //echo parent::giveSuccessAlert("The file " . basename($_FILES["school_logo"]["name"]) . " has been uploaded.");
                            return basename($_FILES["school_logo"]["name"]);
                        } else {
                            return parent::giveDangerAlert("Sorry, there was an error uploading your file.");
                        }

                    }

                }


            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());
        }
    }
    public static function uploadHeadTeacherSignature($file)
    {

        try {
            /*print_r($file);
            die();*/
            $target_dir = "../Src/uploads/school/";
            $target_file = $target_dir . basename($_FILES["head_teach_sign"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_FILES["head_teach_sign"]["name"])) {
                $check = getimagesize($_FILES["head_teach_sign"]["tmp_name"]);
                if ($check == false) {
                    return parent::giveWarningAlert("File is not an image.");

                } else {
                    if (file_exists($target_file)) {

                        return parent::giveInfoAlert("Sorry, file already exists.");
                    } else if ($_FILES["head_teach_sign"]["size"] > 500000) {

                        return parent::giveDangerAlert("Sorry, your file is too large.");
                    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        return parent::giveWarningAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    } else {

                        if (move_uploaded_file($_FILES["head_teach_sign"]["tmp_name"], $target_file)) {
                            //echo parent::giveSuccessAlert("The file " . basename($_FILES["head_teach_sign"]["name"]) . " has been uploaded.");
                            return basename($_FILES["head_teach_sign"]["name"]);
                        } else {
                            return parent::giveDangerAlert("Sorry, there was an error uploading your file.");
                        }

                    }

                }


            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());
        }
    }
    public static function uploadFormMasterSignature($file): string
    {

        try {
            /*print_r($file);
            die();*/
            $target_dir = "../Src/uploads/school/";
            $target_file = $target_dir . basename($_FILES["passport"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_FILES["passport"]["name"])) {
                $check = getimagesize($_FILES["passport"]["tmp_name"]);
                if ($check == false) {
                    return parent::giveWarningAlert("File is not an image.");

                } else {
                    if (file_exists($target_file)) {

                        return parent::giveInfoAlert("Sorry, file already exists.");
                    } else if ($_FILES["passport"]["size"] > 500000) {

                        return parent::giveDangerAlert("Sorry, your file is too large.");
                    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        return parent::giveWarningAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    } else {

                        if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) {
                            //echo parent::giveSuccessAlert("The file " . basename($_FILES["file"]["name"]) . " has been uploaded.");
                            return basename($_FILES["passport"]["name"]);
                        } else {
                            return parent::giveDangerAlert("Sorry, there was an error uploading your file.");
                        }

                    }

                }


            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());
        }
    }


    /*public function copyToAdminFolder($role, $function)
    {
        if ($role === $function) {

        }
    }*/

    public function upLoadBook($file)
    {
        try {
            $target_dir = "../../Backend/Src/uploads/books/";
            $target_file = $target_dir . basename($_FILES["$file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
            if (isset($_FILES["$file"]["name"])) {
                $check = getimagesize($_FILES["$file"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

// Check file size
            if ($_FILES["file"]["size"] > 100000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

// Allow certain file formats
            if ($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx"
                && $imageFileType != "gif") {
                echo "Sorry, only pdf, doc, docx files are allowed.";
                $uploadOk = 0;
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                    return basename($_FILES["file"]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }


        } catch (PDOException $e) {
            return parent::giveDangerAlert($e->getMessage());

        }
    }

    /*private function getUserRole(mixed $username)
    {
    }*/
}