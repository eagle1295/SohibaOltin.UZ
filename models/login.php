<?php
@session_start();

  $login=$_POST['login'];
  $parol=md5("eagle".$_POST['parol']."eagle");

  $sql="SELECT *  FROM `users` WHERE `login` LIKE \"$login\" AND `parol` LIKE \"$parol\"";
  $q=mysql_query($sql) or die("ERROR");
  if(mysql_num_rows($q)!=0) {
    $login2 = mysql_result($q, 0, "login");
    $parol2 = mysql_result($q, 0, "parol");

    if($login==$login2 && $parol==$parol2){
      $v1=mysql_result($q, 0, "ism");
      $v2=mysql_result($q, 0, "familiya");
      $v3="yes";
      $_SESSION['ism']=$v1;
      $_SESSION['familiya']=$v2;
      $_SESSION['let']=$v3;
  echo "<script>window.location='".URL."index'</script>";
    }else{
      $error_login=1;
      include "views/login.php";
    }
  }else{
    $error_login=1;
    include "views/login.php";
  }
?>
