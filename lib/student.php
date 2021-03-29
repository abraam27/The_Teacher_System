<?php
require_once '../config.php';
class Student
{
    // property, attrs, fields, member vars
    private $studentID;
    private $firstName;
    private $middleName;
    private $lastName;
    private $level;
    private $stage;
    private $type;
    private $school;
    private $district;
    private $gender;
    private $phoneNO;
    private $ownerPhoneNO;
    private $email;
    private $password;
    private $photo;
    private $photoTmp;
    private $sessionID;
    // behavior, member function, method, action
    public function __construct($firstName, $middleName, $lastName, $level, $stage, $type, $school, $district, $gender, $phoneNO, $ownerPhoneNO, $email, $password, $sessionID, $photo="", $photoTmp="", $studentID="")
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->level = $level;
        $this->stage = $stage;
        $this->type = $type;
        $this->school = $school;
        $this->district = $district;
        $this->gender = $gender;
        $this->phoneNO = $phoneNO;
        $this->ownerPhoneNO = $ownerPhoneNO;
        $this->email = $email;
        $this->password = $password;
        $this->sessionID = $sessionID;
        $this->photo = $photo;
        $this->photoTmp = $photoTmp;
        $this->studentID = $studentID;
    }
    public function addStudent()
    {   
        // get connection
        global $dbh;
        $sql = $dbh->prepare("INSERT INTO student(firstName, middleName, lastName, level, stage, type, school, district, gender, phoneNO, ownerPhoneNO, email, password, sessionID) VALUES('$this->firstName', '$this->middleName', '$this->lastName', '$this->level', '$this->stage', '$this->type', '$this->school', '$this->district', '$this->gender', '$this->phoneNO', '$this->ownerPhoneNO', '$this->email', '$this->password', '$this->sessionID')");
        if($sql->execute()){
                return $dbh->lastInsertId();;
        }else{
                return false;
        }
        
    }
    public static function deleteStudentById($studentID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM student WHERE studentID='$studentID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateStudentById($studentID)
    {   
        // get connection
        global $dbh;
		if(is_uploaded_file($this->photoTmp)){
			// rename image
			$this->photo = time(). $this->photo;
			if(move_uploaded_file($this->photoTmp, "../../upload/".$this->photo)){
				$sql = $dbh->prepare("UPDATE student SET firstName='$this->firstName', middleName='$this->middleName', lastName='$this->lastName', level='$this->level', stage='$this->stage', type='$this->type', school='$this->school', district='$this->district', gender='$this->gender', phoneNO='$this->phoneNO', ownerPhoneNo='$this->ownerPhoneNo', email='$this->email', password='$this->password', photo='$this->photo' WHERE studentID='$studentID'");
				if($sql->execute()){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			$sql = $dbh->prepare("UPDATE student SET firstName='$this->firstName', middleName='$this->middleName', lastName='$this->lastName', level='$this->level', stage='$this->stage', type='$this->type', school='$this->school', district='$this->district', gender='$this->gender', phoneNO='$this->phoneNO', ownerPhoneNo='$this->ownerPhoneNo', email='$this->email', password='$this->password' WHERE studentID='$studentID'");
			if($sql->execute()){
				return true;
			}else{
				return false;
			}
		}
    }
    public static function retreiveStudentById($studentID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM student WHERE studentID='$studentID'");
        $sql->execute();
        $student = $sql->fetch(PDO::FETCH_ASSOC);
        return $student;
    }
    public static function retreiveAllStudents()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM student ORDER BY studentID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allStudents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allStudents;
    }
    public static function retreiveAllStudentsBysessionID($sessionID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM student WHERE sessionID='$sessionID'");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allStudents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allStudents;
    }
    //web service
    public static function retreiveAllStudentsBySchool($school)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM student WHERE school = '$school' ORDER BY studentID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allStudents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allStudents;
    }
    public static function StudentLogin($studentID,$password)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * from student WHERE studentID = '$studentID' And password = '$password'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if(is_array($fetch)){
            return $fetch["studentID"];
        }else{
            return FALSE;
        }
    }
    public static function generatePassword()
    {
            $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $str = '';
            $max = strlen($chars) - 1;
            for ($i=0; $i < 8; $i++)
                    $str .= $chars[random_int(0, $max)];
            return $str;
    }
    public static function countStudentsInSession($sessionID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM student WHERE sessionID = '$sessionID' ORDER BY studentID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allStudents = $sql->fetchAll(PDO::FETCH_ASSOC);
        return count($allStudents);
    }
}