<?php
  session_save_path("../session");
  session_start();
  if(isset($_SESSION['loginOk'])) 
  {
    if($_SESSION['loginOk'] != True)
    {
      header("location:../page/connexion.php");
    }
  }
  else {header("location:../page/connexion.php");}
?>