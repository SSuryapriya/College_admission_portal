<!DOCTYPE html>
<html>
<head>
    <title>User Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        h2 {
            text-align: center;
            color: #27ae60;
        }
        form {
            width: 400px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #27ae60;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background: #219150;
        }
    </style>
</head>
<body>

<h2>Make a Payment</h2>

<form action="paymentsubmit.php" method="POST">
    <label>User Name</label>
    <input type="text" name="user_name" required>

    <label>Course</label>
    <select name="course" required>
        <option value="">-- Select Course --</option>
        <option value="B.Sc Computer Science">B.Sc Computer Science</option>
        <option value="B.Com">B.Com</option>
        <option value="B.A English">B.A English</option>
        <option value="MBA">MBA</option>
    </select>

    <label>Amount (₹)</label>
    <input type="number" name="amount" required>

    <label>Payment Method</label>
    <select name="payment_method" required>
        <option value="UPI">UPI</option>
        <option value="Card">Card</option>
        <option value="Net Banking">Net Banking</option>
        <option value="Cash">Cash</option>
    </select>

    <button type="submit">Pay Now</button>
</form>

</body>
</html>