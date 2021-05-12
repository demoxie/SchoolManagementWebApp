<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Upload.php");
require_once("../../Backend/ClassLibrary/School.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $schoolObject = new School($conn);
    //$uploadObject = new Upload($conn);
    $school_logo = Upload::uploadSchoolLogo($_FILES["school_logo"]["name"]);
    //print_r( $school_logo);
    $head_teach_sign = Upload::uploadHeadTeacherSignature($_FILES["head_teach_sign"]["name"]);
    //print_r( $head_teach_sign);
    if(is_array($school_logo) && is_array($head_teach_sign)){
        echo 'Error adding data!: '.' '.$school_logo[1]['message'].'! '.$head_teach_sign[1]['message'].'!!';
    }else{
        //$schoolName, $schoolAddress, $schoolPhone, $schoolEmail, $schoolPostalBox, $schoolMotto, $school_logo, $headTeacherID, $headTeachersign,
        $result = $schoolObject->createSchoolData($_POST['school_name'],$_POST['school_address'],$_POST['school_phone'],$_POST['school_email'],$_POST['school_postal_box'],$_POST['school_motto'],$school_logo,$_POST['head_teacher'],$head_teach_sign);
        echo $result;

    }

    //echo $result;

    //print_r($_POST);


} else {
    print_r("not sent");
    die();
}
?>