<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>College Admission Form</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f4f6f9; padding:20px; }
    form { background:#fff; padding:20px; border-radius:10px; width:650px; margin:auto; box-shadow:0 0 10px rgba(0,0,0,0.1); }
    label { display:block; margin-top:10px; font-weight:bold; }
    input, select { width:100%; padding:8px; margin-top:5px; border:1px solid #ccc; border-radius:5px; }
    button { margin-top:15px; padding:10px 20px; background:#007bff; border:none; color:#fff; font-size:16px; border-radius:5px; cursor:pointer; }
    button:hover { background:#0056b3; }
    h2 { text-align:center; color:#333; }
  </style>
</head>
<body>
  <h2>College Admission Application</h2>
  <form action="submit.php" method="post" enctype="multipart/form-data">
    
    <label>Full Name</label>
    <input type="text" name="name" required>

    <label>Date of Birth</label>
    <input type="date" name="dob" required>

    <label>Address</label>
    <input type="text" name="address" required>

    <label>Gender</label>
    <select name="gender" required>
      <option value="">--Select--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>

    <label>Father's Name</label>
    <input type="text" name="father_name" required>

    <label>Mother's Name</label>
    <input type="text" name="mother_name" required>

    <label>School Name</label>
    <input type="text" name="school_name" required>

    <label>Year of Passing</label>
    <input type="text" name="year_passing" required>

    <label>12th Mark (%)</label>
    <input type="number" name="mark_12th" step="0.01" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Course Selection</label>
    <select name="course" required>
      <option value="">--Select Course--</option>
      <option value="B.Sc Computer Science">B.Sc Computer Science</option>
      <option value="B.Sc Maths">B.Sc Maths</option>
      <option value="B.Sc Computer Science">B.Sc Computer Science</option>
      
      <option value="B.A English">B.A</option>
      <option value="B.Com">B.Com</option>
      <option value="BCA">BCA</option>
    </select>

    <label>Medium of Study</label>
    <input type="text" name="medium" required>

    <label>12th Marksheet</label>
    <input type="file" name="marksheet" accept=".pdf,.jpg,.jpeg,.png" required>

    <label>Transfer Certificate (TC)</label>
    <input type="file" name="tc" accept=".pdf,.jpg,.jpeg,.png" required>

    <label>Aadhar Card</label>
    <input type="file" name="aadhar" accept=".pdf,.jpg,.jpeg,.png" required>

    <button type="submit">Submit Application</button>
  </form>
</body>
</html>