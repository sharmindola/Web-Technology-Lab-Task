<?php
include '../control/requestprocess.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laundry Service Request Form</title>
        <script src="../js/validationRequest.js"></script>
    </head>
    <body>
        <p>Laundry Service Request Form</p>
        <form action="" method="POST" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td>
                        <label for="customername">Customer Name:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="customername" id="customername">
                        <td id="nameError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="customeraddress">Customer Address:</label>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="customeraddress" id="customeraddress"></textarea>
                        <td id="addressError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="customercontact">Customer Contact:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="tel" name="customercontact" id="customercontact">
                        <td id="contactError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="pickupdate">Pickup Date:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="pickupdate" id="pickupdate">
                        <td id="dateError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="pickuptime">Pickup Time:</label>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="time" name="pickuptime" id="pickuptime">
                        <td id="timeError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="laundereditems">Items to be Laundered:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="laundereditems" id="laundereditems"></textarea>
                        <td id="itemsError"></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="specialinstruction">Special Instruction:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="specialinstruction" id="specialinstruction"></textarea>
                    </td>
                </tr>
            </table>
            <button type="submit">Submit Request</button>
        </form>
        <a href="laundryHome.php"><button type="button">Back</button></a>
    </body>
</html>

