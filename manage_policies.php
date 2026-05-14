<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

$policies =
mysqli_query($conn,
"SELECT * FROM policies ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Policies</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<div class="dashboard-container">
<a href="admin.php"
   class="back-btn">

   ← Back to Dashboard

</a>
<h1>Manage Policies</h1>

<table>

<tr>

<th>Keyword</th>

<th>Current Response</th>

<th>Update</th>

<th>Delete</th>

</tr>

<?php while($policy = mysqli_fetch_assoc($policies)) { ?>

<tr>

<td><?php echo $policy['keyword_name']; ?></td>

<td><?php echo $policy['response_text']; ?></td>

<td>

<form action="update_policy.php"
      method="POST">

<input type="hidden"
       name="id"
       value="<?php echo $policy['id']; ?>">

<input type="text"
       name="updated_response"
       placeholder="Update response"
       required>

<button type="submit"
        name="update">

Update

</button>

</form>

</td>

<td>

<form action="delete_policy.php"
      method="POST">

<input type="hidden"
       name="id"
       value="<?php echo $policy['id']; ?>">

<button type="submit"
        name="delete"
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