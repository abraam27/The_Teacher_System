<?php
require_once '../config.php';
require_once '../lib/DatabaseModel.php';
class Center extends DatabaseModel
{
    // property
    protected $centerID;
    protected $name;
    protected $address;
    protected $district;
    protected $phone1;
    protected $phone2;
    protected $email;
    // table name
    protected static $tableName = "center";
    // all fields in tabel
    protected $tableFields = array(
        'name',
        'address',
        'district',
        'phone1',
        'phone2',
        'email'
    );
    public function __construct($name, $address, $district, $phone1, $phone2, $email, $centerID = "")
    {
        $this->name = $name;
        $this->address = $address;
        $this->district = $district;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->email = $email;
        $this->centerID = $centerID;
    }
}