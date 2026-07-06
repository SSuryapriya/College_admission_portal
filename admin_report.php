<!DOCTYPE html>
<html>
<head>
    <title>Admin - Payment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #27ae60;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .failed {
            color: red;
            font-weight: bold;
        }
        .total {
            font-size: 18px;
            text-align: right;
            padding: 20px 5%;
        }
    </style>
</head>
<body>

<h1>Admin - Payment Report</h1>

<table>
    <thead>
        <tr>
            <th>Payment ID</th>
            <th>User Name</th>
            <th>Course</th>
            <th>Amount (₹)</th>
            <th>Payment Method</th>
            <th>Payment Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // DB Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college_portal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from payments table
    $sql = "SELECT payment_id, user_name, course, amount, payment_method, payment_time, status FROM payment";
    $result = $conn->query($sql);

    $total = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $statusClass = strtolower($row['status']) == "success" ? "success" : "failed";
            echo "<tr>
                    <td>".$row['payment_id']."</td>
                    <td>".$row['user_name']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['amount']."</td>
                    <td>".$row['payment_method']."</td>
                    <td>".$row['payment_time']."</td>
                    <td class='".$statusClass."'>".$row['status']."</td>
                  </tr>";
            if (strtolower($row['status']) == "success") {
                $total += $row['amount'];
            }
        }
    } else {
        echo "<tr><td colspan='7'>No payments found</td></tr>";
    }

    $conn->close();
    ?>
    </tbody>
</table>

<div class="total">
    <?php echo "Total Collected: ₹" . $total; ?>
</div>

</body>
</html>