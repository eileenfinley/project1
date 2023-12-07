<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recent order</title>
</head>
<body>
    <?php
        include 'database.php';

        // Function to get a user's recent order
        function getUserRecentOrder($userId) {
            global $conn;

            $sql = "SELECT o.order_id, p.name, p.price, o.order_date
                    FROM orders o
                    INNER JOIN products p ON o.product_id = p.id
                    WHERE o.user_id = ?
                    ORDER BY o.order_date DESC
                    LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $order = $result->fetch_assoc();
                return $order;
            } else {
                return null;
            }
        }

        // Example usage
        $userId = 1; // Replace with the actual user ID

        $userRecentOrder = getUserRecentOrder($userId);

        if ($userRecentOrder) {
            echo "Recent Order Details:<br>";
            echo "Order ID: " . $userRecentOrder['order_id'] . "<br>";
            echo "Product: " . $userRecentOrder['product_name'] . "<br>";
            echo "Price: $" . $userRecentOrder['price'] . "<br>";
            echo "Order Date: " . $userRecentOrder['order_date'] . "<br>";
        } else {
            echo "No recent orders for the user.";
        }

        // Close the database connection
        $conn->close();
    ?>
</body>
</html>