<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

$employees =
mysqli_query($conn,
"SELECT * FROM employees ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Employees</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<div class="dashboard-container">
<a href="admin.php"
   class="back-btn">

   ← Back to Dashboard

</a>
<h1>Employee Management</h1>

<div class="chart-card"
     style="margin-bottom:25px;">

<form action="add_employee.php"
      method="POST">

<input type="text"
       name="name"
       placeholder="Employee Name"
       required>

<input type="email"
       name="email"
       placeholder="Employee Email"
       required>

<input type="password"
       name="password"
       placeholder="Password"
       required>

<button type="submit"
        name="add_employee">

Add Employee

</button>

</form>

</div>

<table>

<tr>

<th>Name</th>

<th>Email</th>

<th>Delete</th>

</tr>

<?php while($employee = mysqli_fetch_assoc($employees)) { ?>

<tr>

<td><?php echo $employee['name']; ?></td>

<td><?php echo $employee['email']; ?></td>

<td>

<form action="delete_employee.php"
      method="POST">

<input type="hidden"
       name="id"
       value="<?php echo $employee['id']; ?>">

<button type="submit"
        name="delete_employee"
        class="delete-btn">

Delete

</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>