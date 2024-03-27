<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <title style="text-align: center;">Webboard Yasinthon</title>
    <script>
            function myFunction(){
                let r=confirm("ต้องการจะลบจริงหรือไม่ ?");
                return r;
            }
            function ses(){
               return $_SESSION['cat_id']="success";
            }
        </script>

</head>
<div class = "container-lg">
<h1 style="text-align: center"class="mt-3">Webboard Yasinthon</h1>
</div>
<body class="container">
    
    <?php include('nav.php')?>
    
    <div class="my-2 d-flex justify-content-between">
        <div>
            <lable>หมวดหมู่</lable>
            <span class="dropdown">
                <?php 
                    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    
                ?>
                <button class="btn btn-white-50 btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <?php
                        if(isset($_GET['id'])){
                        $sql="SELECT name FROM category WHERE id=$_GET[id]";
                        foreach($conn->query($sql)as $row)
                        echo "$row[name]";
                        }else{
                            echo "--ทั้งหมด--";
                        }
                        ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="Button2">
                    <?php
                         
                        $sql="SELECT * FROM category";
                            echo "<li><a class='dropdown-item' href='index.php'> --ทั้งหมด-- </a></li>";
                         foreach($conn->query($sql)as $row){
                            echo "<li><a class='dropdown-item' href='index.php?id=$row[id]' onclick='ses()'>$row[name]</a></li>";
                         }
                         $conn=null;
                    ?>
                </ul>
            </span>
        </div>
        <div>
            <?php if (isset($_SESSION['id'])) { ?>
                <a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i> สร้างกระทู้ใหม่</a>
            <?php } ?>
        </div>
    </div>
    <table class="table table-striped mt-4 ">
        <?php
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

        if(isset($_GET['id'])){
            $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t2.id as 'user_id' FROM post as t1
            INNER JOIN user as t2 ON (t1.user_id=t2.id)
            INNER JOIN category as t3 ON (t1.cat_id=t3.id)
            WHERE t1.cat_id=$_GET[id] 
            ORDER BY t1.post_date DESC" ;
        }else{
            $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t2.id as 'user_id' FROM post as t1
            INNER JOIN user as t2 ON (t1.user_id=t2.id)
            INNER JOIN category as t3 ON (t1.cat_id=t3.id) 
            ORDER BY t1.post_date DESC" ;
        }
        $result=$conn->query($sql);
        
        while($row=$result->fetch()){
            
            echo "<tr><td class='d-flex'>
            <div class='flex-grow-1'>[ $row[0] ]<a href=post.php?id=$row[2]
            style=text-decoration:none> $row[1]</a><br>$row[3] - $row[4]</div>";
            if(isset($_SESSION['id'])){
                if($_SESSION['user_id']==$row['user_id']){
                    echo "<div class='me-2 align-self-center'><a href='editpost.php?id=$row[2]'
                    class='btn btn-warning btn-sm' onclick=''><i class='bi bi-pencil-fill'></i></a></div>";

                    echo "<div class='me-2 align-self-center'><a href=delete.php?id=$row[2]
                    class='btn btn-danger btn-sm' onclick='return myFunction()'><i class='bi bi-trash'></i></a></div>";
                }
                else if($_SESSION['role']=='a'){
                    echo "<div class='me-2 align-self-center'><a href=delete.php?id=$row[2]
                    class='btn btn-danger btn-sm' onclick='return myFunction()'><i class='bi bi-trash'></i></a></div>";
                }
            }
        }
        $conn=null;
        ?>
    </table>

        
</body>
</html>