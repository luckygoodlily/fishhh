<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
<html>
<head>

    <title>海洋大數據雲端管理系統</title>
    <style>


    </style>
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
		首頁
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

	  <table align="center">
        <tr align="center">
		   <td style="width:60px;"><p><a href="/fish/index.php"  target="_self" title="報表查詢"><img src="/Icon/b3.png" width="100" height="100"></a></p></td>
        </tr>
		<tr align="center">
		  <td style="width:60px;"><p>報表查詢</p></td> 
        </tr>
	  </table> 
			 		 

      <?php
        include("mysql_connect.inc.php");  // include過的變數都能直接引用
        // echo '<a href="logout.php">登出</a>  <br><br>';

        //此判斷為判定觀看此頁有沒有權限
        //說不定是路人或不相關的使用者
        //因此要給予排除
        //$db = mysqli_connect($db_server, $db_user, $db_passwd) ;
        if($_SESSION['username'] != null ){
	  
	  
          //echo '<a href="register.php">新增</a>   ' ;
          //echo '<a href="update.php">修改</a>   ';
          //echo '<a href="delete.php">刪除</a>  <br><br>';
    
          //將資料庫裡的所有會員資料顯示在畫面上
          $sql = "SELECT * FROM login";
          $result = mysqli_query($db,$sql)or die("Error sql statement");
          //while($row = mysqli_fetch_row($result)){
          //  echo "$row[1] - 使用者代號： $row[1], 帳號：$row[2], " . 
           // "公司代碼：$row[4]<br>";
          //} // while
        } // if
        else{
          echo '您無權限觀看此頁面!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        } // else
      ?>
	</div>
</body>
</html>

 