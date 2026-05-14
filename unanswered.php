<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

$unanswered = mysqli_query($conn,
"SELECT * FROM unanswered_questions ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Unanswered Questions</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<div class="dashboard-container">
<a href="admin.php"
   class="back-btn">

   ← Back to Dashboard

</a>
<h1>Unanswered Questions</h1>

<table>

<tr>

<th>Question</th>

<th>Time</th>

<th>Add Policy</th>

</tr>

<?php while($row = mysqli_fetch_assoc($unanswered)) { ?>

<tr>

<td><?php echo $row['question']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<form action="add_policy.php"
      method="POST">

<input type="hidden"
       name="question"
       value="<?php echo $row['question']; ?>">

<input type="text"
       name="response"
       placeholder="Enter response"
       required>

<button type="submit"
        name="add">

Add Policy

</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>