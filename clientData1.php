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
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > 客戶資料管理
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
		
		
	  請選擇輸入以下三項資訊
	  <form method="post" action="clientDatafind.php">
	    <table align="center">
        
          <tr align="left">
		    <td style="width:250px";><p>1.請輸入客戶公司名稱(中文)</p></td>
			<td><p><input type="text" name="clientCh" pattern="[\u4e00-\u9fa5]{2,16}" title="格式不正確，請輸入中文" placeholder="請輸入2~16位中文字" /></p></td>
          </tr>
		  <tr align="left">
		    <td style="width:250px";><p>2.請輸入客戶公司名稱(英文)</p></td>
		    <td><p><input type="text" name="clientEh" pattern="[A-Za-z]{2,50}" title="格式不正確，請輸入英文" placeholder="請輸入2~50位英文字" /></p></td>
          </tr>
	      <tr align="left">
		    <td style="width:250px";><p>3.請輸入客戶公司代碼</p></td>
            <td><p><input type="text" name="clientid" pattern="[A-Za-z0-9]{7}" title="格式不正確，請輸入英文及數字7位公司代碼"/></p></td>
          </tr>
	    </table>
	    <input type="submit" name="button" value="查詢" /><br>
	  </form>
	</div>
  </body>
</html>
