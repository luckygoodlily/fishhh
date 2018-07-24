<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
    <meta charset="utf-8">
    <title>客戶資料管理</title>
  </head>

  <body>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <div class="main" align="center">
	  <font color="white" size="6" >
	     <div style="background-color:#5599FF;">
		   <br><b>海洋大數據雲端管理系統</b><br><br>
		 </div>
	  </font><br>

	    <?php
        include("mysql_connect.inc.php");
        
        // echo $id ;
        if($_POST['submitVal'] != null){
		  $id = $_POST['submitVal'];
          //刪除資料庫資料語法
		  //echo $id;
          $sql = "delete from userdata where Register_Account='$id'";
		  
          if(mysqli_query($db,$sql)){
            echo '刪除使用者資料成功!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
          } // if
          else{
            echo '刪除使用者資料失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=userDataFind.php>';
          } // else
        } // if
        else{
          echo '請選擇要刪除的資料';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=userDataFind.php>';
        } // else
      ?>
	 </div>
  </body>
</html>