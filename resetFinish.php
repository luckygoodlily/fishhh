<html>
  <head>
    <title>海洋大數據雲端管理系統</title>
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
	    <a href="index.php"  target="_self" title="首頁"><img src="/Icon/ab2.png" border="0"></a>&nbsp;
		<a href="index.php">首頁</a>
		
	  </div><br><br><br>
	
	  <?php
        include("mysql_connect.inc.php");  // include過的變數都能直接引用
        
		
        $id = $_POST['id'];
		
		$pw1 = $_POST['pw1'];
        $pw2 = $_POST['pw2'];
		if ( $pw1 !=null && $pw2 != null && $pw1 == $pw2 ) {
		  $sql = 'update login set User_Password="'.$pw1.'" where User_Account="'.$id.'"';
		  if( mysqli_query($db, $sql) ){
            echo '資料更新成功!<br><br>';
		    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		  } // if
		} // if
		else{
          echo '密碼更新失敗!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=reset.php>';
        } // else
	  ?>
		
    </div>
  </body>
</html>