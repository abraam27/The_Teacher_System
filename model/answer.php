<?php
require_once '../config.php';
require_once '../lib/DatabaseModel.php';
class Answer extends DatabaseModel
{
    // property
	protected $answerID;
    protected $answer;
    protected $studentID;
	protected $examID;
    // table name
    protected static $tableName = "answer";
    // all fields in tabel
    protected $tableFields = array(
        'answer',
        'studentID',
		'examID'
    );
    public function __construct($answer, $studentID, $examID, $answerID = "")
    {
        $this->answer = $answer;
        $this->studentID = $studentID;
		$this->examID = $examID;
		$this->answerID = $answerID;
    }
}