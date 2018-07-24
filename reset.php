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
	  <form name="form" method="post" action="resetFinish.php">	  
		 <table align="center"> 
		  <tr align="left">
		    <td>請輸入帳號：<font color='red'>*</font></td>
		    <td><input type="text" name="id" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確帳號"/> </td>
          </tr>
	      <tr align="left">
		    <td >請輸入重設的密碼：<font color='red'>*</font></td>
            <td><input type="password" name="pw1" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確帳號" /> </td>
          </tr>
		  <tr align="left">
		    <td >請再次輸入重設的密碼：<font color='red'>*</font></td>
            <td><input type="password" name="pw2" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確帳號" /> </td>
          </tr>
	    </table>
        <input type="submit" name="button" value="確定" /><br>
 
      </form>
	</div>
  </body>
</html>