 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
<html>
  <head>
    <meta charset="utf-8">
    <title>客戶資料管理</title>
	
  <link href="updateClientData.css" rel="stylesheet" type="text/css" />
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
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > <a href="clientData1.php">客戶資料管理
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
	  

     
      <?php
        include("mysql_connect.inc.php");  // include過的變數都能直接引用

        $country = $_POST['country'];
		if ( $country == "TWN" ){
		  $clientCh = $_POST['clientCh'];
          $clientEh = $_POST['clientEn'];   
		} // if
		else{
		  $clientCh = $_POST['clientChh'];
          $clientEh = $_POST['clientEnn'];   	
		} //else
		    
		$Taxid = $_POST['Taxid'];
        $clientcity = $_POST['clientcity'];
        $clientsdresss = $_POST['clientsdresss'];
		  
		$standard_En = "/^([A-Za-z]+)$/"; 
		$standard_Ch = "/^([\x7f-\xff]+)$/"; 

        //選擇資料庫
        mysqli_select_db($db, $db_name)or die("無法使用資料庫");
		
		// echo "$clientCh";
		if ( $country == "TWN" && $clientCh==null && preg_match($standard_Ch, $clientCh) && ( strlen( $clientCh ) < 2 || strlen( $clientCh ) > 16 )){
		  echo '請輸入2~16位的客戶公司名稱(中文)!';
          //echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // if
		else if ( $country == "TWN" && $Taxid==null ){
		  echo '請輸入統一編號!';
          //echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // else if
		else if ( $country != "TWN" && $clientEh==null && preg_match($standard_En, $clientEh) && ( strlen( $clientEh ) < 2 || strlen( $clientEh ) > 50 )){
		  echo '請輸入2~50位英文的客戶公司名稱(英文)!';
          //echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // else if
		else if ( $clientcity != null && ( preg_match($standard_En, $clientcity) || preg_match($standard_Ch, $clientcity) )&& ( strlen( $clientcity ) < 2 || strlen( $clientcity ) > 30 )){
		  echo '請輸入2~30位中文或英文字!';
          //echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // else if
        else if( $country != null && $clientcity != null && $clientsdresss != null ){
          //新增資料進資料庫語法
		  if ( $country == "TWN" ) $ID = "CX" ;
		  else $ID = "FX" ;
		  $query = 'Select * from clientcomp where ClientCpCode LIKE "%'.$ID.'%" Order by ClientCpCode desc';
		  $result = mysqli_query( $db,$query ) or die("Error sql statement");
		  $rows = mysqli_num_rows( $result ) ;
		  $row = mysqli_fetch_array( $result ) ;
		  
	      $clientID = substr( $row[3], -5 );
		  $clientID = $clientID + 1 ;
		  //echo $clientID."<br>" ;
		  $clientID = substr( $row[3], 0, -5) . sprintf("%05d", $clientID) ;
	      
          $sql = "insert into clientcomp (ClientCpNameCh, ClientCpNameEn,ClientCpCode, ClientCountry, ClientTaxIDNo, ClientCpCity, ClientCpAddress	) values('$clientCh','$clientEh','$clientID','$country', '$Taxid', '$clientcity','$clientsdresss')";
          if( mysqli_query($db, $sql) ){
            echo '資料建立成功!<br><br>';
			echo '<form method="post" action="superHome.php">';
	        echo '<table align="center" border="5" > ';
       
            echo '<tr align="left" bgcolor= #5599FF color="white" >';
		    echo '  <td style="width:250px";><font color="white">項目</font></td>';
	        echo '  <td style="width:250px";><font color="white">內容</font></td>';
            echo '</tr>';
		    echo '<tr align="left">';
		    echo '  <td style="width:250px";>國別</td>';
		    echo '  <td>'.$country.'</td>';
            echo ' </tr>';
	        echo ' <tr align="left">';
		    echo '   <td style="width:250px";>公司名稱(中文)</td>';
		    echo '   <td>'.$clientCh.'</td>';
            echo ' </tr>';
	        echo ' <tr align="left">';
		    echo '   <td style="width:250px";>公司名稱(英文)</td>';
		    echo '   <td>'.$clientEh.'</td>';
            echo ' </tr>';
			echo ' <tr align="left">';
		    echo '   <td style="width:250px";>公司統一編號</td>';
		    echo '   <td>'.$Taxid.'</td>';
            echo ' </tr>';
	        echo ' <tr align="left">';
		    echo '   <td style="width:250px";>城市</td>';
		    echo '   <td>'.$clientcity.'</td>';
            echo ' </tr>';
	        echo ' <tr align="left">';
		    echo '   <td style="width:250px";>地址</td>';
		    echo '   <td>'.$clientsdresss.'</td>';
            echo ' </tr>';
	        echo ' <tr align="left">';
		    echo '   <td style="width:250px";>公司代碼</td>';
		    echo '   <td>'.$clientID.'</td>';
            echo ' </tr>';
	        echo '</table><br><br>';
	        echo '<input type="submit" name="button" value="確認" /><br>';
	        echo '</form>';
            
          } // if
          else {
            echo '1新增失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
          } // else
        } // else if
        else{
          echo '2新增失敗!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
        } // else
     ?>
    </div>
  </body>
</html>
