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
	  
	  <div class="home" style="float:left;">&nbsp;
	    <img src="/Icon/ab2.png" border="0"></a>&nbsp;
		<a href="superHome.php">首頁</a> > <a href="clientData1.php">客戶資料管理
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
      
      <?php session_start(); ?>
	 
      <!--上方語法為啟用session，此語法要放在網頁最前方-->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <?php
	    include("mysql_connect.inc.php"); // include過的變數都能直接引用
	    if ( $_POST['selectList'] != NULL) {
		   $_SESSION['ClientCpCode'] = $_POST['selectList'];
          // $apple = $_SESSION['ClientCpCode'];
	      // echo $selectList;
	      echo  '<input type="button" value="更新客戶資料" onClick="location.href=\'updateClientData.php\'"> ';
          echo  '<input type="button" value="刪除客戶資料" onClick="location.href=\'deleteClientData.php\'"> ';	
		} // if
	    else {
			echo '請選擇資訊!';
            //echo '<meta http-equiv=REFRESH CONTENT=2;url=clientDatafind.php>';
		} // else
       
	  
	  ?>
	  
	 </div>
  </body>
</html>