<?php
require_once '../config.php';
class Ask
{
    // property, attrs, fields, member vars
    private $askID;
    private $message;
    private $date;
    private $time;
    private $image;
    private $imageTmp;
    private $view;
    private $reply;
    private $studentID;
    // behavior, member function, method, action
    public function __construct($message, $date, $time, $studentID, $image="", $reply="", $imageTmp="", $view="", $askID="")
    {
        $this->message = $message;
        $this->date = $date;
        $this->time = $time;
        $this->studentID = $studentID;
        $this->image = $image;
        $this->imageTmp = $imageTmp;
        $this->view = $view;  
        $this->reply = $reply;
        $this->askID = $askID;
    }
    public function addAsk()
    {
        global $dbh;
        if(is_uploaded_file($this->imageTmp)){
			// rename image
			$this->image = time().$this->image;
			if(move_uploaded_file($this->imageTmp, "../../upload/".$this->image)){
				$sql = $dbh->prepare("INSERT INTO ask(message, date, time, image, studentID) VALUES('$this->message', '$this->date', '$this->time', '$this->image', '$this->studentID')");
				if($sql->execute()){
					return $dbh->lastInsertId();;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			$sql = $dbh->prepare("INSERT INTO ask(message, date, time, studentID) VALUES('$this->message', '$this->date', '$this->time', '$this->studentID')");
			if($sql->execute()){
				return $dbh->lastInsertId();;
			}else{
				return false;
			}
		}
    }
    public static function deleteAskById($askID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM ask WHERE askID='$askID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateAskById($askID)
    {   
        // get connection
        global $dbh;
        if(is_uploaded_file($this->imageTmp)){
			// rename image
			$this->image = time(). $this->image;
			if(move_uploaded_file($this->imageTmp, "../../upload/".$this->image)){
				$sql = $dbh->prepare("UPDATE ask SET message='$this->message', date='$this->date', time='$this->time', image='$this->image', studentID='$studentID' WHERE askID='$askID'");
				if($sql->execute()){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			$sql = $dbh->prepare("UPDATE ask SET message='$this->message', date='$this->date', time='$this->time', studentID='$studentID' WHERE askID='$askID'");
			if($sql->execute()){
				return true;
			}else{
				return false;
			}
		}
    }
    public static function retreiveAskById($askID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM ask WHERE askID='$askID'");
        $sql->execute();
        $ask = $sql->fetch(PDO::FETCH_ASSOC);
        return $ask;
    }
    public static function retreiveAllAsks()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM ask ORDER BY askID DESC LIMIT 30");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allAsks = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allAsks;
    }
    public static function changeViewStatus($askID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE ask SET view = 1 WHERE askID='$askID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public static function changeReplyStatus($askID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("UPDATE ask SET reply = 1 WHERE askID='$askID'");
        // execute sql query
        if($sql->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}