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
	  &nbsp;&nbsp;&nbsp;更新客戶資料 <br><br>
	  

	    <?php
	      include("mysql_connect.inc.php"); // include過的變數都能直接引用
			
          if($_POST['submitVal'] != null){
           //將$_SESSION['username']丟給$id
           //這樣在下SQL語法時才可以給搜尋的值
           $UserAccount = $_POST['submitVal'];
		   $_SESSION['UserAccount'] = $UserAccount;
		   echo $_SESSION['UserAccount'];
	       //echo "111使用者代號：". "$ClientCpCode";
           //若以下$id直接用$_SESSION['username']將無法使用
             
				
	       $sql = "SELECT * FROM userdata";
           $qry = mysqli_query($db,$sql)or die("Error sql statement");
           $rows = mysqli_num_rows( $qry ) ;
		   //$row = mysqli_fetch_array($qry);
			 
			 
           for ( $cnt = 0 ; $cnt < $rows ; $cnt++ ) {
             $row = mysqli_fetch_array( $qry ) ;
	         // echo $row[3] . "<br>";
	         if ( $row[3] == $UserAccount  ) {        
		       $cnt = $rows ;	
             } // if
	  
           } // for() 
           $preset1 =false ; $preset2 =false ;$preset3 =false;
		   if ( $row[9] == "雲端平台管理者" ) $preset1 =true;
		   else if ( $row[9] == "雲端平台使用者" ) $preset2 =true ;
		   else if ( $row[9] == "海上平台使用者" ) $preset3 =true ;
			  
             echo "<form name=\"form\" method=\"post\" action=\"displayUpdateUserData.php\">";
	         echo "<table align=\"center\">" ;
             echo "<tr align=\"left\"><td>使用者身分：<font color='red'>*</font></td>";
             echo "<td><form>
			   <input type=\"radio\" name=\"userIdentify\" value=\"雲端平台管理者\" checked=\"$preset1\"/>雲端平台管理者
			   <input type=\"radio\" name=\"userIdentify\" value=\"雲端平台使用者\" checked=\"$preset2\"/>雲端平台使用者
			   <input type=\"radio\" name=\"userIdentify\" value=\"海上平台使用者\" checked=\"$preset3\"/>海上平台使用者
			   </form></td>";
			 
			  
             echo "<tr align=\"left\"><td>帳號：<font color='red'>*</font></td>";
             echo "<td><input type=\"text\" name=\"account\" pattern=\"[A-Za-z0-9]{6,10}\" title=\"格式不正確，請輸入6~10位英文或數字\" value=\"$row[1]\"/></td>";
             echo "<tr align=\"left\"><td>密碼：<font color='red'>*</font></td>";
			 echo "<td><input type=\"password\" name=\"password1\" pattern=\"[A-Za-z0-9]{6,10}\" title=\"格式不正確，請輸入6~10位英文或數字\" value=\"$row[2]\" /> </td></tr>";
			 echo "<tr align=\"left\"><td>再次輸入密碼：<font color='red'>*</font></td>";
			 echo "<td><input type=\"password\" name=\"password2\" pattern=\"[A-Za-z0-9]{6,10}\" title=\"格式不正確，請輸入6~10位英文或數字\" value=\"$row[2]\" /> </td></tr>";
				
             echo "<tr align=\"left\"><td>姓名(中文)：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"userCh\" pattern=\"[\u4e00-\u9fa5]{2,12}\" title=\"格式不正確，2~12位請輸入中文\" value=\"$row[3]\" /></td></tr> ";
			 echo "<tr align=\"left\"><td>姓名(英文)：</td>";
			 echo "<td><input type=\"text\" name=\"userEn\" pattern=\"[A-Za-z]{2,50}\" title=\"格式不正確，請輸入2~50位英文\" value=\"$row[4]\" /></td></tr> ";
			 echo "<tr align=\"left\"><td>電話：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"areaTel\" pattern=\"[0-9]{}\" title=\"格式不正確，請輸入數字\" value=\"$row[5]\" size=\"3\"/>
			 <input type=\"text\" name=\"Tel\" pattern=\"[0-9]{}\" title=\"格式不正確，請輸入數字\" value=\"$row[6]\" />
			 #<input type=\"text\" name=\"telExt\" pattern=\"[0-9]{}\" title=\"格式不正確，請輸入數字\" value=\"$row[7]\" size=\"3\"/></td></tr> ";
			  
			 echo "<tr align=\"left\"><td>信箱：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"email\" pattern=\"[\w]*@[\w-]+(\.[\w-]+)+\" title=\"格式不正確，請輸入正確信箱\" value=\"$row[8]\" /></td></tr> ";
			 
             		

             echo "</table>";
			 echo "<input type=\"submit\" name=\"button\" value=\"確定\" /></form>";
           } // if
           else {
             echo '請選擇要更新的資料!';
             echo '<meta http-equiv=REFRESH CONTENT=2;url=userDataFind.php>';
           } // else
          ?>
			
		  

    </div>
  </body>
</html>
