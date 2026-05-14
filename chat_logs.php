<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

$logs = mysqli_query($conn,
"SELECT * FROM chat_logs ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Chat Logs</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<div class="dashboard-container">
<a href="admin.php"
   class="back-btn">

   ← Back to Dashboard

</a>
<h1>Chat Logs</h1>

<table>

<tr>

<th>User Message</th>

<th>Bot Response</th>

<th>Time</th>

</tr>

<?php while($row = mysqli_fetch_assoc($logs)) { ?>

<tr>

<td><?php echo $row['user_message']; ?></td>

<td><?php echo $row['bot_response']; ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>