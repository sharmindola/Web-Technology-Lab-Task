<?php
include '../model/mydb.php';

$mydb = new Mydb();
$con = $mydb->conobj();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>user Dashboard</title>
</head>
<body>
    <h1>Laundry Customer Dashboard</h1>

    <!-- Table to display requests -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Date</th>
                <th>Delivery Status</th>
                <th>Payment Status</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all requests and their statuses
            $query = "SELECT r.request_id, r.pickup_date, s.delivery_status, s.payment_status, s.review_star, s.review_comment 
                      FROM laundry_requests r
                      JOIN status s ON r.request_id = s.request_id";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $requestId = $row['request_id'];
                    $pickupDate = $row['pickup_date'];
                    $deliveryStatus = $row['delivery_status'];
                    $paymentStatus = $row['payment_status'];
                    $reviewStar = $row['review_star'];
                    $reviewComment = $row['review_comment'];

                    echo "<tr>";
                    echo "<td>$requestId</td>";
                    echo "<td>$pickupDate</td>";
                    echo "<td>$deliveryStatus</td>";
                    echo "<td>$paymentStatus</td>";
                    echo "<td>";

                    // Check if a review exists
                    if ($reviewStar && $reviewComment) {
                        // Display correct number of stars
                        $stars = str_repeat('⭐', $reviewStar);
                        echo "$stars <br> $reviewComment";
                    } else {
                        echo "<a href='?review_id=$requestId'>Review</a>";
                    }

                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No requests found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Form to make a payment -->
    <h2>Make a Payment</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                <label for="pay_request_id">Request ID:</label>
                <input type="number" name="pay_request_id" required>
                </td>
            </tr>
            <tr>
                <td>
                <label for="payment_amount">Payment Amount:</label>
                <input type="number" name="payment_amount" required>
                </td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="make_payment">Make Payment</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Handle the payment update
    if (isset($_POST['make_payment'])) {
        $requestIdToPay = $_POST['pay_request_id'];
        
        if ($mydb->updatePaymentStatus($con, $requestIdToPay)) {
            echo "<p>Payment status updated to 'Paid' for Request ID: $requestIdToPay</p>";
        } else {
            echo "<p>Failed to update payment status</p>";
        }
    }

    // Handle the review submission (if the review link is clicked)
    if (isset($_GET['review_id'])) {
        $reviewId = $_GET['review_id'];
        ?>
        <h2>Submit Your Review for Request ID: <?php echo $reviewId; ?></h2>
        <form method="POST" action="">
        <input type="hidden" name="review_request_id" value="<?php echo $reviewId; ?>">
        <table>
            <tr>
                <td>
                <label for="review_star">Rating :</label>
            <select name="review_star" required>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
                </td>
            </tr>
            <tr>
                <td>
                <label for="review_comment">Comment:</label>
                <textarea name="review_comment" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <button type="submit" name="submit_review">Submit Review</button> 
                </td>
            </tr>
        </table>
        </form>
        <?php
    }

    // Handle review submission
    if (isset($_POST['submit_review'])) {
        $reviewId = $_POST['review_request_id'];
        $reviewStar = $_POST['review_star'];
        $reviewComment = $_POST['review_comment'];

        $query = "UPDATE status 
                  SET review_star = '$reviewStar', review_comment = '$reviewComment' 
                  WHERE request_id = '$reviewId'";
        if ($con->query($query)) {
            echo "<p>Review submitted successfully for Request ID: $reviewId</p>";
        } else {
            echo "<p>Failed to submit review: " . $con->error . "</p>";
        }
    }

    $mydb->closecon($con);
    ?>
    <a href="laundryHome.php"><button type="button">Back</button></a>
</body>
</html>


