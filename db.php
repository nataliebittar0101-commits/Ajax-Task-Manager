<?php
mysqli_report(MYSQLI_REPORT_OFF);
$servername = "localhost";
$username="root";
$password = ""; // change this to empty string if you are using xampp and not mamp
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}
$dbName = "class_10";

if (!$conn->select_db($dbName)){
   echo "<p>creating new database</p>";
   $sql = "CREATE DATABASE $dbName";
   if ($conn->query($sql)){
        $conn->select_db($dbName);
       echo "<p>database $dbName created</p>";
       echo "<p>creating customers table</p>";
       $sql = "CREATE TABLE tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            status BOOLEAN NOT NULL DEFAULT 0
            );";
      if ($conn->query($sql)){
          echo "tables created";
        $sql = "INSERT INTO tasks (title, status) VALUES
            ('Buy groceries', 0),
            ('Complete project report', 0),
            ('Call plumber', 0);";
          if($conn->query($sql)) {
            echo "<p>demo content created</p>";
          } else {
            echo "error creating demo contenr $conn->error";
          }
      } else {
          echo "<p> error creating tables error: $conn->error </p>";
      }
   };
}