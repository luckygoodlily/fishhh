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
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > 集魚燈資料管理
		
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
      
	  
	  <form method="post" action="displayFishLightDataFind.php">
	    <table align="center">
        
          <tr align="left">
		    <td style="width:250px";>1.請選擇集魚燈型號<font color='red'>*</font></td>
			<td><select name="fishlight" >
               <OPTGROUP label="請選擇集魚燈型號"> 
               <option value="000012gh542315">000012gh542315</option>
               <option value="183xfhj4860800">183xfhj4860800</option>
			   </select>
			</td>
          </tr>
		  <tr align="left">
		    <td style="width:250px";>2.請輸入集魚燈序號</td>
		    <td><input type="text" name="fishid" pattern="[A-Za-z0-9]{7}" title="格式不正確，請輸入7位英文及數字" placeholder="請輸入7位數字或英文" /></td>
          </tr>
	      <tr align="left">
		    <td style="width:250px";>3.請輸入集魚燈搭配船號</td>
            <td><input type="text" name="fishLightBoat" pattern="[0-9]{6,9}" title="格式不正確，請輸入6~9位數字" placeholder="請輸入6~9位數字"/></td>
          </tr>
	    </table>
	    <input type="submit" name="button" value="查詢" /><br>
	  </form>
      
	  
    </div>
  </body>
</html>