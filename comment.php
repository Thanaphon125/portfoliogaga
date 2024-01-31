<?php
// ตรวจสอบว่ามีข้อมูลที่ส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // ดึงข้อมูลจากฟอร์ม
  $comment = $_POST["comment"];

  // บันทึกข้อมูลลงฐานข้อมูล
  $servername = "ชื่อเซิร์ฟเวอร์";
  $username = "ชื่อผู้ใช้";
  $password = "รหัสผ่าน";
  $dbname = "ชื่อฐานข้อมูล";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // ตรวจสอบการเชื่อมต่อ
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // เพิ่มความคิดเห็นลงในฐานข้อมูล
  $sql = "INSERT INTO comments (comment) VALUES ('$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "บันทึกความคิดเห็นเรียบร้อยแล้ว";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // ปิดการเชื่อมต่อ
  $conn->close();
}
?>
