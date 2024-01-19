<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;"> Web Yasinthon</h1>
    <hr>
    <form>
    <table style="border: 2px solid black; width: 15%;" align="center">
            <tr><td>ผู้ใช้ : <?php echo $_SESSION['username'] ?></td></tr>
            <tr><td>หมวดหมู่ : <select name "id">
            <option value="geraral">เรื่องทั่วไป</option>
            <option value="study">เรื่องเรียน</option>
            </select></td></tr>
            <tr><td>หัวข้อ :  &nbsp;<input type="text" size="20"></td></tr>
            <tr><td style = "float: left;" >เนื้อหา :</td><td style = "float: left;" ><textarea name="text" cols="20" rows="2"></textarea></tr>
            <tr><td><input type="submit" value="บันทึกข้อความ"></td></tr>
        </table>
        <center><a href="index.php">กลับไปหน้าหลัก</a></center>
    </form>
</body>
</html>