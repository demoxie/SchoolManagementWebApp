<?php

//require("../../Backend/server/Database.php");
$connect = new Db();

class CodeGenerator extends Db
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;

    }

    public static function createStaffNumber()
    {
        try {
            $year = date("Y");
            $deptID = 1;
            $last_three = self::rand_chars("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2, TRUE);
            $first_five = self::generateRandomString(false, true, false, '', 6);
            $serial_code = $first_five . $last_three;
            return "AGSTF/" . $year . "/$deptID/" . $serial_code;
        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }
    }

    public static function rand_chars($c, $l, $u = FALSE): string
    {
        if (!$u) {
            for ($s = '', $i = 0, $z = strlen($c) - 1; $i < $l; $x = rand(0, $z), $s .= $c[$x], $i++) {

            }
        } else {
            for ($i = 0, $z = strlen($c) - 1, $s = $c[rand(0, $z)], $i = 1; $i != $l; $x = rand(0, $z), $s .= $c[$x], $s = ($s[$i] == $s[$i - 1] ? substr($s, 0, -1) : $s), $i = strlen($s)) {

            }
        }
        return $s;
    }

    public static function generateRandomString($alpha = true, $nums = true, $usetime = false, $string = '', $length = 120): string
    {
        $alpha = ($alpha == true) ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        $nums = ($nums == true) ? '1234567890' : '';

        if ($alpha == true || $nums == true || !empty($string)) if ($alpha == true) $alpha .= strtoupper($alpha);
        $randomstring = '';
        $totallength = $length;
        for ($na = 0; $na < $totallength; $na++) {
            $var = (bool)rand(0, 1);
            $randomstring = $var == 1 && $alpha == true ? $randomstring . $alpha[(rand() % mb_strlen($alpha))] : $randomstring . $nums[(rand() % mb_strlen($nums))];
        }

        if ($usetime) {
            return $randomstring . time();
        }
        return ($randomstring);
    }

    public static function createAdmissionNO($presentClass)
    {
        try {
            $year = date("Y");
            $deptID = 1;
            $classArr = str_split($presentClass);
            //$last_three = CodeGenerator::rand_chars("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2, TRUE);
            $first_five = CodeGenerator::generateRandomString(false, true, false, '', 6);
            $serial_code = $first_five;

            if (in_array('N', $classArr, TRUE)) {
                return "AGM/NUR/" . $year . "/$deptID/" . $serial_code;
            } elseif (in_array('P', $classArr, TRUE)) {
                return "AGM/PRI/" . $year . "/$deptID/" . $serial_code;
            } else {
                return "AGM/SEC/" . $year . "/$deptID/" . $serial_code;
            }

        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }
    }

    public static function applicationCode()
    {
        try {

            $last_three = CodeGenerator::rand_chars("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2, TRUE);
            $first_ten = CodeGenerator::generateRandomString(false, true, false, '', 10);
            return $first_ten . $last_three;

        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }
    }

    public static function getAge($dob)
    {

        try {
            $dob = date("Y-m-d", strtotime($dob));

            $dobObject = new DateTime($dob);
            $nowObject = new DateTime();

            $diff = $dobObject->diff($nowObject);

            return $diff->y;

        } catch (Exception $e) {

            return self::giveDangerAlert($e->getMessage());

        }
    }

    public static function addOrdinalNumberSuffix($num)
    {
        if (!in_array(($num % 100), array(11, 12, 13))) {
            switch ($num % 10) {
                // Handle 1st, 2nd, 3rd
                case 1:
                    return $num . 'st';
                case 2:
                    return $num . 'nd';
                case 3:
                    return $num . 'rd';
            }
        }
        return $num . 'th';
    }
}