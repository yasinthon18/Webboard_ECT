<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1 style="text-align: center;">Webboard Yasinthon</h1>
    <hr>
    <div style="text-align: center;">
    <?php
    $id = $_GET['id'];
    
    echo "ต้องการดูกระทู้หมายเลข $id"."<br>";
    
    ?>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr>
            <td colspan="2" style="background-color: #6cd2fe; text-align:left"">แสดงความคิดเห็น</td></tr>
        <tr>
            <td><textarea name="message" rows="30" cols="90"></textarea></td></tr>
        <tr>
            <td><input type="submit" value="ส่งข้อความ"</td>
        </tr>
    </table>
    <a href="index.html">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>