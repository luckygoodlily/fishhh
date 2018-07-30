<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
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
	  &nbsp;&nbsp;&nbsp;新增使用者資料 <br><br>
	  <form name="form" method="post" action="updateNewUserData.php">
	    <table align="center">
          <tr align="left"><td>使用者身分：<font color='red'>*</font></td>
            <td><form>
			  <input type="radio" name="userIdentify" value="雲端平台管理者" />雲端平台管理者
			  <input type="radio" name="userIdentify" value="雲端平台使用者" />雲端平台使用者
			  <input type="radio" name="userIdentify" value="海上平台使用者" />海上平台使用者
			 </form></td>
		  
             <tr align="left"><td>帳號：<font color='red'>*</font></td>
               <td><input type="text" name="account" pattern="[A-Za-z0-9]{6,10}" title="格式不正確，請輸入6~10位英文或數字" placeholder="請輸入6~10位英文或數字"/></td>
               <tr align="left"><td>密碼：<font color='red'>*</font></td>
			   <td><input type="password" name="password1" pattern="[A-Za-z0-9]{6,10}" title="格式不正確，請輸入6~10位英文或數字" placeholder="請輸入6~10位英文或數字" /> </td></tr>
			 <tr align="left"><td>再次輸入密碼：<font color='red'>*</font></td>
			 <td><input type="password" name="password2" pattern="[A-Za-z0-9]{6,10}" title="格式不正確，請輸入6~10位英文或數字" placeholder="請輸入6~10位英文或數字" /> </td></tr>
		     
             <tr align="left"><td>姓名(中文)：<font color='red'>*</font></td>
			 <td><input type="text" name="userCh" pattern="[\u4e00-\u9fa5]{2,12}" title="格式不正確，2~12位請輸入中文" placeholder="請輸入2~12位中文字" /></td></tr> 
			 <tr align="left"><td>姓名(英文)：</td>
			 <td><input type="text" name="userEn" pattern="[A-Za-z]{2,50}" title="格式不正確，請輸入2~50位英文" placeholder="請輸入2~50位英文字" /></td></tr> 
			 
			 <tr align="left"><td>電話：<font color='red'>*</font></td>
			 <td><input type="text" name="areaTel" pattern="[0-9]{}" title="格式不正確，請輸入數字" placeholder="區碼" size="3"/>
			 <input type="text" name="Tel" pattern="[0-9]{}" title="格式不正確，請輸入數字" placeholder="市話" />
			 #<input type="text" name="telExt" pattern="[0-9]{}" title="格式不正確，請輸入數字" placeholder="分機" size="3"/></td></tr> 
			  
			  <tr align="left"><td>信箱：<font color='red'>*</font></td>
			 <td><input type="text" name="email" pattern="[\w]*@[\w-]+(\.[\w-]+)+" title="格式不正確，請輸入正確信箱" /></td></tr> 
			 
         </table>
	     <input type="submit" name="button" value="確定" />
	   </form>

    </div>
  </body>
</html>
