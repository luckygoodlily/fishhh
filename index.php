<!-- 設定網頁編碼為UTF-8 -->
<html>
  <head>

    <title>海洋大數據雲端管理系統</title>
    <style>


    </style>
  </head>
  <body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <div class="show" align="center">
	  <font color="white" size="6" >
	     <div style="background-color:#5599FF;">
		   <br><b>海洋大數據雲端管理系統</b><br><br>
		 </div>
	   </font><br><br>
      <form name="form" method="post" action="connect.php">	  
		 <table align="center"> 
          <tr align="left">
		    <td >請輸入公司代碼：</td>
			<td><input type="text" name="companyid" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確公司代碼"/></td>
          </tr>
		  <tr align="left">
		    <td>請輸入帳號：</td>
		    <td><input type="text" name="id" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確帳號"/> </td>
          </tr>
	      <tr align="left">
		    <td >請輸入密碼：</td>
            <td><input type="password" name="pw" pattern="[A-Za-z0-9]{}" title="格式不正確，請輸入正確帳號" /> </td>
          </tr>
	    </table>
        <input type="submit" name="button" value="登入" /><br>
        <a href="register.php">申請帳號</a>
		<a href="forgetEmail.php">忘記密碼</a>
		  
		 
      </form>
	  
	</div>
  </body>
</</html>