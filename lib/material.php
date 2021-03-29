<?php
require_once '../config.php';
class Material
{
    // property, attrs, fields, member vars
    private $materialID;
    private $name;
    private $date;
    private $time;
    private $level;
    private $stage;
    private $type;
    private $fileName;
    private $fileNameTmp;
    // behavior, member function, method, action
    public function __construct($name, $date, $time, $level, $stage, $type, $fileName, $fileNameTmp, $materialID="")
    {
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
		$this->level = $level;
        $this->stage = $stage;
        $this->type = $type;
		$this->fileName = $fileName;
        $this->fileNameTmp = $fileNameTmp;
        $this->materialID = $materialID;
    }
    public function addMaterial()
    {
        global $dbh;
        if(is_uploaded_file($this->fileNameTmp)){
            // rename fileName
            $this->fileName = time().$this->fileName;
            if(move_uploaded_file($this->fileNameTmp, "../upload/".$this->fileName)){
                    $sql = $dbh->prepare("INSERT INTO material(name, date, time, level, stage, type, fileName) VALUES('$this->name', '$this->date', '$this->time', '$this->level', '$this->stage', '$this->type', '$this->fileName')");
                    if($sql->execute()){
                            return $dbh->lastInsertId();;
                    }else{
                            return false;
                    }
            }else{
                    return false;
            }
        }else{
            return false;
        }
    }
    public static function deleteMaterialById($materialID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM material WHERE materialID='$materialID'");
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveMaterialById($materialID)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM material WHERE materialID='$materialID'");
        $sql->execute();
        $material = $sql->fetch(PDO::FETCH_ASSOC);
        return $material;
    }
    public static function retreiveAllMaterials()
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM material ORDER BY materialID DESC");
        // execute sql query
        $sql->execute();
        // fetch data to specfic format like associative array
        $allMaterials = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allMaterials;
    }
    public static function retreiveMaterialByFilter($level,$stage,$type)
    {
        // get connection
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM material WHERE level = '$level' AND stage = '$stage' AND type = '$type'");
        $sql->execute();
        $allMaterials = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allMaterials;
    }
}