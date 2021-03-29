<?php
require_once '../config.php';
class Question
{
    // property, attrs, fields, member vars
    private $questionID;
    private $question;
    private $choice1;
    private $choice2;
    private $choice3;
    private $choice4;
    private $answer;
    private $category;
    private $difficulty;
    private $level;
    private $stage;
    private $type;
    private $image;
    private $imageTmp;
    // behavior, member function, method, action
    public function __construct($question, $choice1, $choice2, $choice3, $choice4, $answer, $category, $difficulty, $level, $stage, $type, $image="", $imageTmp="", $questionID="")
    {
        $this->question = $question;
        $this->choice1 = $choice1;
        $this->choice2 = $choice2;
        $this->choice3 = $choice3;
        $this->choice4 = $choice4;
        $this->answer = $answer;
        $this->category = $category;
        $this->difficulty = $difficulty;
        $this->level = $level;
        $this->stage = $stage;
        $this->type = $type;
        $this->image = $image;
        $this->imageTmp = $imageTmp;
        $this->questionID = $questionID;
    }
    public function addQuestion()
    {
        global $dbh;
        if(is_uploaded_file($this->imageTmp)){
			// requestion image
			$this->image = difficulty().$this->image;
			if(move_uploaded_file($this->imageTmp, "../../upload/".$this->image)){
				$sql = $dbh->prepare("INSERT INTO question(question, choice1, choice2, choice3, choice4, answer, category, difficulty, level, stage, type, image) VALUES('$this->question', '$this->choice1', '$this->choice2', '$this->choice3', '$this->choice4', '$this->answer', '$this->category', '$this->difficulty', '$this->level', '$this->stage', '$this->type', '$this->image')");
				if($sql->execute()){
					return $dbh->lastInsertId();;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			$sql = $dbh->prepare("INSERT INTO question(question, choice1, choice2, choice3, choice4, answer, category, difficulty, level, stage, type) VALUES('$this->question', '$this->choice1', '$this->choice2', '$this->choice3', '$this->choice4', '$this->answer', '$this->category', '$this->difficulty', '$this->level', '$this->stage', '$this->type')");
			if($sql->execute()){
				return $dbh->lastInsertId();;
			}else{
				return false;
			}
		}
    }
    public static function deleteQuestionById($questionID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM Question WHERE questionID='$questionID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function upcategoryQuestionById($questionID)
    {   
        // get connection
        global $dbh;
        if(is_uploaded_file($this->imageTmp)){
			// requestion image
			$this->image = difficulty(). $this->image;
			if(move_uploaded_file($this->imageTmp, "../../upload/".$this->image)){
				$sql = $dbh->prepare("UPDATE question SET question='$this->question', choice1='$this->choice1', choice2='$this->choice2', choice3='$this->choice3', choice4='$this->choice4', answer='$this->answer', category='$this->category', difficulty='$this->difficulty', level='$this->level', stage='$this->stage', type='$this->type', image='$this->image' WHERE questionID='$questionID'");
				if($sql->execute()){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			$sql = $dbh->prepare("UPDATE question SET question='$this->question', choice1='$this->choice1', choice2='$this->choice2', choice3='$this->choice3', choice4='$this->choice4', answer='$this->answer', category='$this->category', difficulty='$this->difficulty', level='$this->level', stage='$this->stage', type='$this->type' WHERE questionID='$questionID'");
			if($sql->execute()){
				return true;
			}else{
				return false;
			}
		}
    }
    public static function retreiveQuestionById($questionID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM question WHERE questionID='$questionID'");
        $sql->execute();
        $Question = $sql->fetch(PDO::FETCH_ASSOC);
        return $Question;
    }
    public static function retreiveAllQuestions()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM question ORDER BY questionID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allQuestions = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allQuestions;
    }
    public static function retreiveQuestions($category, $difficulty, $level, $stage, $type)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM question WHERE category = '$category' AND difficulty = '$difficulty' AND level = '$level' AND stage = '$stage' AND type = '$type' ORDER BY questionID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allQuestions = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allQuestions;
    }
    public static function chooseRandomQuestions($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}