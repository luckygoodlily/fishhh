<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
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
	  
	  <div class="home" style="float:left;">&nbsp;&nbsp;
	    <a href="<?php echo $_SESSION['home']; ?>"  target="_self" title="首頁"><img src="/Icon/ab2.png" border="0"></a>
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > <a href="userDataFind.php">使用者資料管理</a>
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
	
	   <?php
        include("mysql_connect.inc.php");  // include過的變數都能直接引用

        $userIdentify = $_POST['userIdentify'];
		
		$account = $_POST['account'];
        $password1 = $_POST['password1']; 
	    $password2 = $_POST['password2'];
		$userCh = $_POST['userCh']; 
	    $userEn = $_POST['userEn'];
		
		$areaTel = $_POST['areaTel'];
        $Tel = $_POST['Tel']; 
		$telExt = $_POST['telExt']; 
		$email = $_POST['email']; 
		
		$standard_int = "/^([0-9]+)$/"; //數字
		$standard_MixEnInt = "/^([0-9A-Za-z]+)$/"; // 英數混和
		$standard_Email = "/^[\w]*@[\w-]+(\.[\w-]+)+$/" ;
		$standard_En = "/^([A-Za-z]+)$/"; 
	    $standard_Ch = "/^([\x7f-\xff]+)$/";  	

        //選擇資料庫
        mysqli_select_db($db, $db_name)or die("無法使用資料庫");
		if ( $userIdentify == null  ) {
			echo '請選擇使用身分!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=updateUserData.php>';			
		} // if
		
		if ( $password1 !=null && $password2 != null && $password1 == $password2  ) ;
		else {
			echo '請輸入一樣的密碼!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=updateUserData.php>';			
		} // else 
		
		// echo "$clientCh";
		if( $userIdentify != null && $account != null  && $userCh != null && $areaTel != null && $Tel != null && $email != null ){
          //新增資料進資料庫語法
		  
          
		  if ( !preg_match($standard_MixEnInt,$account ) ) {
			echo '請輸入符合規範的帳號!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';  
		  }	// if
		  else if ( !preg_match( $standard_MixEnInt, $password1 ) ) {
			echo '請輸入符合規範的密碼!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( !preg_match( $standard_Ch, $userCh ) ) {
			echo '請輸入中文姓名!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( $userEn != null && !preg_match( $standard_En, $userEn ) ) {
			echo '請輸入英文姓名!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( !preg_match( $standard_int, $areaTel ) ) {
			echo '區碼不對，請輸入數字!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( !preg_match( $standard_int, $Tel) ) {
			echo '電話不對，請輸入數字!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( $telExt != null && !preg_match( $standard_int, $telExt) ) {
			echo '分機不對，請輸入數字!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
		  else if ( !preg_match( $standard_Email, $email ) ) {
			echo '請輸入正確信箱!<br><br>';
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewUserData.php>';   
		  } // else if
			
		
		  $sql = "insert into userdata (Register_Account, Register_Password,Client_User_Name_Ch, Client_User_Name_En, Client_User_Tele_Area_Code, Client_User_Tele, Client_User_Tele_Ext, Client_User_Email,User_Identity) values('$account','$password1','$userCh', '$userEn', '$areaTel','$Tel','$telExt','$email','$userIdentify' )";
		  
          if( mysqli_query($db, $sql) ){
            echo '使用者資料新建立成功!<br><br>';
		    echo '<form method="post" action="clientSuperHome.php">';
	        echo '<table align="center" border="5" > ';
       
            echo '<tr align="left" bgcolor= #5599FF color="white" >';
	        echo '  <td><font color="white">帳號</font></td>';
	        echo '  <td><font color="white">密碼</font></td>';
       	    echo '  <td><font color="white">姓名(中文)</font></td>';
	        echo '  <td><font color="white">姓名(英文)</font></td>';
	        echo '  <td><font color="white">使用者身分</font></td>';
	        echo '  <td><font color="white">電話</font></td>';
            echo '  <td><font color="white">信箱</font></td>';
            echo '</tr>';
		    echo '<tr align="left">';
		    echo '  <td>'.$account.'</td>';
		    echo '  <td>'.$password1.'</td>';
		    echo '  <td>'.$userCh.'</td>';
		    echo '  <td>'.$userEn.'</td>';
	        echo '  <td>'.$userIdentify.'</td>';
		    echo '  <td>'.$areaTel.$Tel."#".$telExt.'</td>';
	        echo '  <td>'.$email.'</td>';
            echo ' </tr>';

	        echo '</table><br><br>';
	        echo '<input type="submit" name="button" value="確認" /><br>';
	        echo '</form>';
           
		  } // if
		  else{
		  
            echo '新增失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
          } // else
        } //if
        else{
		  
          echo '新增失敗!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=clientSuperHome.php>';
        } // else
     ?>
		
    </div>
  </body>
</html>