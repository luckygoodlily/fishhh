<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <head>

    <title>海洋大數據雲端管理系統</title>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  
  </head>
  <body>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <div class="main" align="center">
	  <font color="white" size="6" >
	     <div style="background-color:#5599FF;">
		   <br><b>海洋大數據雲端管理系統</b><br><br>
		 </div>
	  </font><br>
	  
	  

      <!--上方語法為啟用session，此語法要放在網頁最前方-->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <?php
        //連接資料庫
        //只要此頁面上有用到連接MySQL就要include它
        include("mysql_connect.inc.php"); // include過的變數都能直接引用
	  
	  
        // echo $id ;
        if($_POST['submitVal'] != null){
		  $id = $_POST['submitVal'];
          //刪除資料庫資料語法
		  //echo $id;
          $sql = "delete from fishlight where Light_Boat_No='$id'";
		  
          if(mysqli_query($db,$sql)){
            echo '刪除集魚燈資料成功!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
          } // if
          else{
            echo '刪除集魚燈資料失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=userDataFind.php>';
          } // else
        } // if
        else{
          echo '請選擇要刪除的資料';
		  // echo '已有魚貨或海溫資料無法刪除';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=userDataFind.php>';
        } // else
	  
	  ?>  
    </div>
  </body>
</html>