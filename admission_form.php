<div class="status-box">
  Application Status: <b><?php echo $app['status']; ?></b>
</div>

<h2>Admission Application Form</h2>
<table>
  <tr><th>Applicant Name</th><td><?php echo $app['applicant_name']; ?></td></tr>
  <tr><th>Email</th><td><?php echo $app['email']; ?></td></tr>
  <tr><th>Course Applied</th><td><?php echo $app['course_applied']; ?></td></tr>
  <tr><th>Gender</th><td><?php echo $app['gender']; ?></td></tr>
  <tr><th>Father's Name</th><td><?php echo $app['father_name']; ?></td></tr>
  <tr><th>Mother's Name</th><td><?php echo $app['mother_name']; ?></td></tr>
  <tr><th>DOB</th><td><?php echo $app['dob']; ?></td></tr>
  <tr><th>Mobile</th><td><?php echo $app['mobile']; ?></td></tr>
  <tr><th>Photo</th><td><img src="uploads/<?php echo $app['photo']; ?>" width="100"></td></tr>
  <tr><th>Submitted At</th><td><?php echo $app['submitted_at']; ?></td></tr>
</table>

<br>
<a href="edit_application.php?id=<?php echo $app['id']; ?>">
   <button>Edit Application</button>
</a>