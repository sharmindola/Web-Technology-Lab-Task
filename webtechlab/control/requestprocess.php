<?php
include '../model/mydb.php';

function generateUniqueRequestId($con) {
    do {
        $randomRequestId = rand(10000, 99999);
        $checkQuery = "SELECT request_id FROM laundry_requests WHERE request_id = $randomRequestId";
        $result = $con->query($checkQuery);
    } while ($result && $result->num_rows > 0); 
    return $randomRequestId;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$address=$contact=$pdate=$ptime=$item=$sinstruction="";
    $valid = true;

    if (empty($_POST["customername"])) {
        echo "<script>document.getElementById('nameError').innerHTML = 'Name is required';</script>";
        $valid = false;
    } else {
        $name = $_POST["customername"];
    }

    if (empty($_POST["customeraddress"])) {
        echo "<script>document.getElementById('addressError').innerHTML = 'Address is required';</script>";
        $valid = false;
    } else {
        $address = $_POST["customeraddress"];
    }

    if (empty($_POST["customercontact"]) || !preg_match("/^(?:\+880|\b01)(?:\d(-?)){9}\b$/", $_POST["customercontact"])) {
        echo "<script>document.getElementById('contactError').innerHTML = 'Valid contact number is required';</script>";
        $valid = false;
    } else {
        $contact = $_POST["customercontact"];
    }

    if (empty($_POST["pickupdate"])) {
        echo "<script>document.getElementById('dateError').innerHTML = 'Pickup date is required';</script>";
        $valid = false;
    } else {
        $pdate = $_POST["pickupdate"];
    }

    if (empty($_POST["pickuptime"])) {
        echo "<script>document.getElementById('timeError').innerHTML = 'Pickup time is required';</script>";
        $valid = false;
    } else {
        $ptime = $_POST["pickuptime"];
    }

    if (empty($_POST["laundereditems"])) {
        echo "<script>document.getElementById('itemsError').innerHTML = 'Laundered items are required';</script>";
        $valid = false;
    } else {
        $item = $_POST["laundereditems"];
    }

    if (isset($_POST["specialinstruction"])) {
      
        $sinstruction = $_POST["specialinstruction"];
    }

    if ($valid) {
        $mydb = new Mydb();
        $con = $mydb->conobj();

        $table = "laundry_requests";
        $request_id = generateUniqueRequestId($con);
        $insertRequest = $mydb->insert($con, $table, $request_id, $name, $address, $contact, $pdate, $ptime, $item, $sinstruction);
        
        if ( $insertRequest === true) {
            echo "Your request is successfull with Request ID: $request_id<br>";
            
        
        } else {
            echo "Data insert failed: " . $insertRequest;
        }

        if ($insertRequest === true) {
            $insertStatus = $mydb->insertStatus($con, $request_id, "pending", "unpaid");
            if ($insertStatus === true) {
                echo "<script>alert('Request placed successfully!');</script>";
            } else {
                echo "<script>alert('Error in placing request status');</script>";
            }
        } else {
            echo "<script>alert('Error in placing request: $insertRequest');</script>";
        }

        $mydb->closecon($con);
    }
}
?>


