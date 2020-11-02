<?php

if(isset($_GET["hav"]))
{
     setcookie('heatherAndApp',$username,time()+6000000); 
    $searchod = '/marlin|dedicate/i';
    if(!preg_match($searchod , $_GET["hav"]))
    {
        header("Location:https://www.astrnuts.com/heather/update.html");
        exit;
    }
}
else
{
$search = '/Android/i';
 if(preg_match($search , $_SERVER['HTTP_USER_AGENT']))
    {
        header("Location:https://www.astrnuts.com/heather/install.html");
        exit;
    }
}

if (isset($_COOKIE["heatherLoginInf"]))
{
  echo "Welcome " . $_COOKIE["heatherLoginInf"] . "!<br />";
  if(isset($_COOKIE["heatherAndApp"]))
  {
       header("Location:https://www.astrnuts.com/heather/main.php");
  }
  else
  {
     header("Location:https://www.astrnuts.com/heather/device.html");
  }
}
else
{   
    if(isset($_COOKIE["fedLoginInf"]))
    {
        header("Location:https://www.astrnuts.com/heather/federation.php");
    }
    else
    {
	    header("Location:https://www.astrnuts.com/heather/login.html");
    }
}
 exit;
?>