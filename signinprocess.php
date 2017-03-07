<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In Process</title>
</head>
<body>
<?php
	//เขียน php เอาข้อมูลที่ส่งมาไป select ใน DB ว่ามีหรือไม่ ถ้าไม่มีแสดงข้ความบอก ถ้ามีต้องดูว่าเป็น admin->admin.php หรือ member->member.php
	
	$uname = $_POST['uname'];
	$upassword = $_POST['upassword'];

	//การทำงานกับฐานข้อมูล
	//step 1 connect ฐานข้อมูล
	$host = "localhost";
	$userdb = "root";
	$passworddb = "";
	$dbname = "comscia_db";
	$conn = mysqli_connect($host,$userdb,$passworddb,$dbname);

	//step 2 สร้างคำสั่ง SQL เพื่อทำงานกับ DB
	$strsql = "select * from user_tb where uname='".$uname."' and upassword='".$upassword."'";
	//echo $strsql;

	//step 3 สั่งให้ทำงาน นำผลลัพธ์ที่ได้เก็บในตัวแปร
	$result = mysqli_query($conn, $strsql);

	//step 4 เอาผลที่ได้จากการทำงานมาใช้งาน
	if($row = mysqli_fetch_array($result)){
		//have data
		echo "OK";
	}else{
		//don't have data
		echo "User name และ Password ไม่ถูกต้อง";
	}

?>
</body>
</html>