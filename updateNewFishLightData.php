<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
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
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > <a href="findFishlightData.php">集魚燈資料管理</a>
		
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

      <?php

        include("mysql_connect.inc.php");  // include過的變數都能直接引用

        $fishlight = $_POST['fishlight'];
		
		$fishid = $_POST['fishid'];
        $fishLightBoat = $_POST['fishLightBoat']; 
	     	

        //選擇資料庫
        mysqli_select_db($db, $db_name)or die("無法使用資料庫");
		if( $fishlight != null && $fishid != null  && $fishLightBoat != null ){
		  if( $fishid != NULL && strlen( $fishid ) != 7 ){
	        echo '請輸入7位數字或英文組成的序號!<br><br>';
		    echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewFishLightData.php>';    
		  } // if
		
		  if( $fishLightBoat != NULL && ( strlen( $fishLightBoat ) < 6 || strlen( $fishLightBoat ) > 9 ) ){
		    echo '請輸入6~9位數字!<br><br>';
		    echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewFishLightData.php>';  
		  } // if
			
		  date_default_timezone_set("Asia/Shanghai");
          $date = date('Y-m-d',time());
		  $sql = "insert into fishlight (Light_Model, Light_Serial_No, Light_Boat_No, SetupTime) values('$fishlight','$fishid','$fishLightBoat','$date')";
	  
          if( mysqli_query($db, $sql) ){
            echo '資料建立成功!<br><br>';
		    echo '<form method="post" action="clientSuperHome.php">';
	        echo '<table align="center" border="5" > ';
       
            echo '<tr align="left" bgcolor= #5599FF color="white" >';
	        echo '  <td><font color="white">項目</font></td>';
		    echo '  <td><font color="white">內容</font></td>';
            echo '</tr>';
			  
		    echo '<tr align="left">';
		    echo '  <td>集魚燈型號</td>';
		    echo '  <td>'.$fishlight.'</td>';		    
            echo ' </tr>';
			  
			echo '<tr align="left">';
		    echo '  <td>集魚燈序號</td>';
		    echo '  <td>'.$fishid.'</td>'; 
            echo ' </tr>';
			  
			echo '<tr align="left">';
		    echo '  <td>搭配船號</td>';
		    echo '  <td>'.$fishLightBoat.'</td>';
            echo ' </tr>';
			
			echo '<tr align="left">';
		    echo '  <td>資料建立日期</td>';
		    echo '  <td>'.$date.'</td>';
            echo ' </tr>';

	        echo '</table><br><br>';
	        echo '<input type="submit" name="button" value="確認" /><br>';
	        echo '</form>';
           
		  } // if
		  else{
		  
            echo '新增失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
          } // else
		 } // if
         else{
		  
          echo '請輸入集魚燈完整資訊!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
        } // else
	  
	  ?>
	</div>
  </body>
</html>