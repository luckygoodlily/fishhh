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
		<a href="<?php echo $_SESSION['home']; ?>" >首頁</a> > 客戶資料管理
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

      <?php
        include("mysql_connect.inc.php");  // include過的變數都能直接引用
        
		
        $country = $_POST['country'];
		
		$clientCh = $_POST['clientCh'];
        $clientEh = $_POST['clientEn'];
        $Taxid = $_POST['Taxid'];
		
		$clientcity = $_POST['clientcity'];
        $clientsdresss = $_POST['clientsdresss']; 		
	     	

        //選擇資料庫
        //mysqli_select_db($db, $db_name)or die("無法使用資料庫");
		
		// echo "$clientCh";
		if ( $country == "TWN" && $clientCh==null ){
		  echo '請輸入客戶公司名稱(中文)!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // if
		else if ( $country != "TWN" && $clientEh==null ){
		  echo '請輸入客戶公司名稱(英文)!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=AddNewClientData.php>';
		} // else if
        else if( $country != null && ($clientEh!=null || $clientCh!= null ) ){
          //新增資料進資料庫語法
		  $id = $_SESSION['ClientCpCode'];
          // echo $id ;
			
		  //$sql = 'update clientcomp set ClientCpNameCh="'.$clientCh.'", ClientCpNameEn="'.$clientEh.'", ClientCountry="'.$country.'" where ClientCpCode="'.$id.'"';
		  // echo "111 ".$country ;
		  if ( $country == "TWN" && $clientEh==null ){
		    $sql = 'update clientcomp set ClientCpNameCh="'.$clientCh.'", ClientCountry="'.$country.'", ClientTaxIDNo="'.$Taxid.'", ClientCpCity="'.$clientcity.'", ClientCpAddress="'.$clientsdresss.'"  where ClientCpCode="'.$id.'"';
			//echo "111";
		  } // if
		  else if ( $country != "TWN" && $clientCh==null ){
		    $sql = 'update clientcomp set ClientCpNameEn="'.$clientEh.'", ClientCountry="'.$country.'", ClientTaxIDNo="'.$Taxid.'", ClientCpCity="'.$clientcity.'", ClientCpAddress="'.$clientsdresss.'" where ClientCpCode="'.$id.'"';
		  } // else if
		  else 
			$sql = 'update clientcomp set ClientCpNameCh="'.$clientCh.'", ClientCpNameEn="'.$clientEh.'", ClientCountry="'.$country.'" , ClientTaxIDNo="'.$Taxid.'", ClientCpCity="'.$clientcity.'", ClientCpAddress="'.$clientsdresss.'" where ClientCpCode="'.$id.'"';
          
		  if( mysqli_query($db, $sql) ){
            echo '資料更新成功!<br><br>';
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
		    echo '   <td>'.$id.'</td>';
            echo ' </tr>';
	        
	        echo '</table><br><br>';
	        echo '<input type="submit" name="button" value="確認" /><br>';
	        echo '</form>';
            // echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
          } // if
          else{
            echo '新增失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=updateClientData.php>';
          } // else
        } // else if
        else{
		  
          echo '新增失敗!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=updateClientData.php>';
        } // else
     ?>
    </div>
  </body>
</html>
