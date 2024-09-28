<?php
include '../model/labtaskdb.php';
 
$search=$_GET['search'];
 
echo $search;
$db= new mydb();
$conobj= $db->createConObject();
 
$data = $db->showIPAddress($conobj,"mytable",$search);
 
if($data->num_rows > 0){
    foreach($data as $row){
        echo "<table>";
        echo "<tr> <td>"." id: </td><td>".$row["id"]."</td></tr>";
        echo "<tr> <td>"." first_name: </td><td>".$row["first_name"]."</td></tr>";
        echo "<tr> <td>"." last_name: </td><td>".$row["last_name"]."</td></tr>";
        echo "<tr> <td>"." email: </td><td>".$row["email"]."</td></tr>";
        echo "<tr> <td>"."gender: </td><td>".$row["gender"]."</td></tr>";
        echo "<tr> <td>"."ip_address: </td><td>".$row["ip_address"]."</td></tr>";
        echo "<br><br><br>";
        echo "</table>";
    }
}
 
    else{
        echo "no data found";
    }
 
 
 
 
?>
