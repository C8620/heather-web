<?php   
$username=$_POST['name'];  
$password=$_POST['password'];  
$link = mysqli_connect('sql149.main-hosting.eu','u102579217_oathh','N9YqxqoLO8C4pJsptq','u102579217_oathh');  
$query=mysqli_query($link,"SELECT username,password FROM heather WHERE username = '$username'");//找到与输入用户名相同的信息，注意要取出的信息有两项  
$row = mysqli_fetch_array($query);  
    if($row['username']==$username &&$row['password']==$password){  
        setcookie('heatherLoginInf',$username,time()+600);  
        echo "<script>window.location.href='https://www.astrnuts.com/heather/';</script>";  
    }  
    else echo "<script>alert('Login Unsuccessful.');history.go(-1)</script>";//返回之前的页面  

?>  