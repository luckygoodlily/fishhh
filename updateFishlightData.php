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
        //連接資料庫
        //只要此頁面上有用到連接MySQL就要include它
        include("mysql_connect.inc.php"); // include過的變數都能直接引用

	    if($_POST['submitVal'] != null){
           //將$_SESSION['username']丟給$id
           //這樣在下SQL語法時才可以給搜尋的值
           $fishLightBoat = $_POST['submitVal'];
	       //echo "111使用者代號：". "$ClientCpCode";
           //若以下$id直接用$_SESSION['username']將無法使用
             
		   $_SESSION['fishLightBoat'] = $fishLightBoat ;
	       $sql = "SELECT * FROM fishlight";
           $qry = mysqli_query($db,$sql)or die("Error sql statement");
           $rows = mysqli_num_rows( $qry ) ;
		   //$row = mysqli_fetch_array($qry);
			 
			 
           for ( $cnt = 0 ; $cnt < $rows ; $cnt++ ) {
             $row = mysqli_fetch_array( $qry ) ;
	         // echo $row[3] . "<br>";
	         if ( $row[3] == $fishLightBoat  ) {        
		       $cnt = $rows ;	
             } // if
	  
           } // for() 
           
			  
           echo "<form name=\"form\" method=\"post\" action=\"displayUpdateFishlightData.php\">";
	       echo "<table align=\"center\">" ;
         
           echo "<tr align=\"left\"><td>集魚燈型號：<font color='red'>*</font></td>";
           echo "<td>$row[1]  <select name=\"fishlight\" >
                 <OPTGROUP label=\"請選擇集魚燈型號\"> 
				 <option value=\"0\"></option>
                 <option value=\"000012gh542315\">000012gh542315</option>
                 <option value=\"183xfhj4860800\">183xfhj4860800</option>
			   </select></td>";
           echo "<tr align=\"left\"><td>集魚燈序號：<font color='red'>*</font></td>";
		   echo "<td><input type=\"text\" name=\"fishid\" value=\"$row[2]\" /> </td></tr>";
		   echo "<tr align=\"left\"><td>搭配船號：<font color='red'>*</font></td>";
		   echo "<td><input type=\"text\" name=\"fishLightBoat\" value=\"$row[3]\" /> </td></tr>";			
           $_SESSION['fishlight'] = $row[1] ;
           $_SESSION['defindate'] = $row[4];
           echo "</table>";
		   echo "<input type=\"submit\" name=\"button\" value=\"確定\" /></form>";
         } // if
         else {
           echo '您無權限觀看此頁面!';
           //echo '<meta http-equiv=REFRESH CONTENT=2;url=findFishlightData.php>';
         } // else
	  
	  ?>  
    </div>
  </body>
</html>