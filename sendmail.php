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


        if($_GET['flag']==1){
          $em=$_REQUEST['email'];//電子郵件地址
          $sql="select * from login where Client_User_Email	='$em' ";
          $renum=mysqli_num_rows(mysqli_query($db,$sql)); //記錄個數
          $re=mysqli_fetch_row(mysqli_query($db,$sql));
		  //echo $re[5] ;
          if($re==0){
            echo "無此使用者<p>";
          } // if
		  else {
            //mail($re[5],'重設密碼','重設密碼網址：140.118.110.37\reset.php');
			$headers = "From: donotreply@fmt.com" . "\r\n";
			
			mail($re[5],'重設密碼','重設密碼網址：140.118.110.37\reset.php', $headers);
            //mail(收件地址，主旨，信件內容)
            echo "信件已寄出";
            // echo "<script>location.replace('index.php')</script>";
            //本例無法使用以下方式轉址，因為已經輸出 Html
            //header("Location:index.php");//網頁轉址到 index.php
          } // else
        } // if
		
        
     ?>
	</div>
  </body>
</html>