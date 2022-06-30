<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <link herf="css/style.css" rel="stylesheet">
    <style>
    body{
        background-color:whitesmoke;
        font-family: 'Amiri', serif;
    }
    #mother{
        width: 100% ;  
        font-size: 20px;
    }
    main{
        float:left;
        border: 1px solid gray;
        padding: 5px;
    }
    input{
        padding: 4px;
        border:2px solid black ;
        text-align: center;
        font-size: 12px;
        font-family: 'Amiri', serif;
    }
    aside{
        text-align:center;
        width:300px ;
        float:right;
        border:1px solid black;
        padding:10px;
        font-size:20px;
        background-color:silver;
        color:white;
    }
    #tbl{
        width: 890px;
        font-size : 20px; 
        text-align:center;
    }
    #tbl:hover{
        background-color:white;

    }
    #tbl th {
        background-color:silver;
        color:black;
        font-size:20px;
        padding:10px;
    }
    aside button{
        width:190px;
        padding:8px;
        margin:7px;
        font-size:17px;
        font-family: 'Amiri', serif;
        font-weight:bold;
    }

    </style>
    <title>Document</title>
</head>
<body>
    <?php
     #الاتصال مع قاعدة البيانات
     $host='localhost';
     $user='root';
     $pass='';
     $db='student';
     $con= mysqli_connect($host,$user,$pass,$db);
     $res= mysqli_query($con,"select * from student");
     #button variable --
    $id ='';
    $name ='';
    $address ='';
    if(isset($_POST['id'])){
        $id= $_POST['id'];
    }
    if(isset($_POST['id'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['id'])){
        $address= $_POST['adress'];
    }
    $sqls ='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls = "delete from student where name = '$name'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    ?>
<div id='mother'>
<form method='POST'>
<!--لوحة التجكم -->
<aside>
<div id='div'>
<img src='https://i.pinimg.com/originals/1a/00/25/1a00251c66cee1c4ffcbe34c8543b1be.png' alt='لوجو الموقع' width='150px'>
<h3>لوحة المدير</h3>
<label>رقم الطالب :</label><br>
<input type='text' name='id'id='id'><br>
<label>اسم الطالب : </label><br>
<input type='text' name='name' id='name'><br>
<label>عنوان الطالب : </label><br>
<input type='text' name='adress' id='adress'><br><br>
<button name = 'add'>اضافة الطالب</button>
<button name = 'del'>حدف الطالب</button>
</div>
</aside>
<!-- عرض بيانات الطلاب -->
<main>
<table id='tbl'>
<tr>
<th>الرقم التسلسلي </th>
<th>اسم الطالب </th>
<th>عنوان الطالب </th>
<?php
while($row = mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "</tr>";
}
   
?>
</table>
</main>
</form>
</div>
</body>
</html>