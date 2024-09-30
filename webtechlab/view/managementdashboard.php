<?php
include '../model/mydb.php';

$mydb = new Mydb();
$con = $mydb->conobj();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Management Dashboard</title>
</head>
<body>
    <h1 >Management Dashboard</h1>

    <!-- Form to update delivery status -->
    <h4>Update Delivery Status</h4>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <label for="request_id">Request ID:</label>
                    <input type="number" name="request_id" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="delivery_status">Delivery Status:</label>
                    <select name="delivery_status" required>
                        <option value="pending">Pending</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <button type="submit" name="update_status">Update Status</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Handle the delivery status update
    if (isset($_POST['update_status'])) {
        $requestId = $_POST['request_id'];
        $deliveryStatus = $_POST['delivery_status'];
       

        // Update the delivery status in the database
        if ($mydb->updateDeliveryStatus($con, $requestId, $deliveryStatus)) {
            echo "<p>Delivery status updated to '$deliveryStatus' for Request ID: $requestId</p>";
        } else {
            echo "<p>Failed to update delivery status</p>";
        }
    }

    $mydb->closecon($con);
    ?>
</body>
</html>


