<?php


class mydb{
public  $DBHostName="";
public $DBUserName="";
public $DBPassword="";
public $DBName="";
function __construct(){
 $this->DBHostName="localhost";
 $this->DBUserName="root";
 $this->DBPassword="";
 $this->DBName="labtaskdb";
}

function createConObject(){
    return new mysqli($this->DBHostName, $this->DBUserName, $this->DBPassword, 
    $this->DBName);
}

function showIPAddress($conn,$mytable,$ip_address){
    $querystring="SELECT * FROM $mytable Where ip_address LIKE '%$ip_address%'";
    $result=$conn->query($querystring);
    return $result;
}

function closeCon($conn)
{
 $conn->close();
}

}

?>
