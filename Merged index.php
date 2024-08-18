<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/Users.css">
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
  </script>
</head>
<body>
<?php include 'header.php'; ?> 
<main>
  <section>
    <h1 class="slideInDown animated">Here are all the Users</h1>
    <!--User table-->
    <div class="table-responsive slideInRight animated" style="max-height: 400px;">
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>ID | Name</th>
              <th>Serial Number</th>
              <th>Gender</th>
              <th>Finger ID / RFID</th>
              <th>Date</th>
              <th>Time In</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <?php
            // Connect to database
            include 'connectDB.php';
            // Fetch users from the database
            $sql = "SELECT * FROM users_log";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>".$row['id']." | ".$row['name']."</td>";
              echo "<td>".$row['serial_number']."</td>";
              echo "<td>".$row['gender']."</td>";
              echo "<td>".$row['finger_id']." / ".$row['rfid']."</td>";
              echo "<td>".$row['date']."</td>";
              echo "<td>".$row['time_in']."</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
</body>
</html>
