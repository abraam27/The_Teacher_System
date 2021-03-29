<?php
require_once '../config.php';
require_once '../lib/DatabaseModel.php';
class Exam extends DatabaseModel
{
    // property
    protected $examID;
    protected $name;
    protected $date;
    protected $time;
    protected $duration;
    // table name
    protected static $tableName = "exam";
    // all fields in tabel
    protected $tableFields = array(
        'name',
        'date',
        'time',
        'duration'
    );
    public function __construct($name, $date, $time, $duration, $examID = "")
    {
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
        $this->duration = $duration;
        $this->examID = $examID;
    }
}