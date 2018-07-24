<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
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
	    <a href="<?php echo $_SESSION['home']; ?>"  target="_self" title="首頁"><img src="/Icon/ab2.png" border="0"></a>&nbsp;
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > <a href="clientData1.php">客戶資料管理</a>
		
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

	  
      <!--上方語法為啟用session，此語法要放在網頁最前方-->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <?php
        //連接資料庫
        //只要此頁面上有用到連接MySQL就要include它
		//echo $_SESSION['home'];
        include("mysql_connect.inc.php"); // include過的變數都能直接引用
        $clientCh = $_POST['clientCh'];
        $clientEh = $_POST['clientEh'];
        $clientid = $_POST['clientid'];
        
	    $sql = "SELECT * FROM clientcomp";
        $qry = mysqli_query($db,$sql)or die("Error sql statement");
        $rows = mysqli_num_rows( $qry ) ;
		$rs = mysqli_fetch_array($qry);
		$haveStr = false;
		// define variables and set to empty values
        
     
        if( $clientCh != NULL ) {
          $standard_Ch = "/^([\x7f-\xff]+)$/" ; //檢查是不是中文
  	      if(preg_match($standard_Ch, $clientCh)) {
            // reg_match( 正則表達式 , 要比對的字串 , 比對結果)	
			$clientCh = "/" . $clientCh . "/" ;
		
	          for ( $cnt = 0, $i = 0 ; $cnt < $rows ; $cnt++, $rs = mysqli_fetch_array( $qry ) ) {
			    // echo $rs[1] .'<br>';
                if($rs[1] != null && preg_match($clientCh, $rs[1])) {
	              // reg_match( 包含內容 , 要比對的字串)
				    if ( $i == 0 ){
					  echo '<form name ="radio" id ="form1" method="post" action="">' ;
		              echo '<table align="center" border="5">';
					  echo '<tr align="left" bgcolor= #5599FF >' ;
		               echo '<td><font color="white">順序</font></td>';
						echo '<td><font color="white">客戶名稱(中文)</font></td>';
					    echo '<td><font color="white">客戶名稱(英文)</font></td>';
						echo '<td><font color="white">客戶代碼</font></td>';
						
						//echo '<script src="onlyselet.js" type="text/javascript"></script>' ;
                        
						echo '<td><font color="white">選擇</font></td>';
                      echo '</tr>';
					} // if
					$j = $i+1 ;
				    echo '<tr align="left">' ;
		              echo '<td>'.$j.'</td>';
			          echo '<td>'.$rs[1].'</td>';
				      echo '<td>'.$rs[2].'</td>';
					  echo '<td>'.$rs[3].'</td>';
					  echo "<td><input type=\"radio\" name=\"selectList\" value=\"$rs[3]\"/></td>";
                    echo '</tr>';
	                $haveStr = true;
				    $i++;
                   
	            } // if
				
	          } // for
			
			echo '</table>';
			if ($haveStr) {
				echo '<br><br><input type="submit" id="updat" name="button" value="更新客戶資料" />'.'&nbsp&nbsp' ;
				echo '<input type="submit" id="delet" name="button" value="刪除客戶資料" />'.'&nbsp&nbsp' ;
				 //echo '<form method="post"> ';
                  echo  '<input type="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'"> '.'&nbsp&nbsp';
              
		          echo  '<input type="button" value="編輯使用者資料" onClick="location.href=\'userDataFind.php\'"> ';
                   //echo '</form> ';
				  echo  '<input type=\"text\" name="submitVal" id="submitVal" value="" hidden/>';//hidden 
				 
				echo '</form><br>' ;
				//echo '</form></div>' ;
			} // if	  
	        else if( !$haveStr ) {
			 echo '系統查無資料'.'<br>'.'<br>';
				
			 echo '<input type="submit" name="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'" />'.'&nbsp&nbsp';
		     echo '<input type="submit" name="button" value="重新查詢" onclick="history.back()"/>'.'<br>';
			} // else if
			
          }// if
	      else {
            echo '請輸入中文!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientData1.php>';
          } // else
        } // if
        else if( $clientEh != NULL ){
          $standard_Eh = "/^([A-Za-z]+)$/" ; //檢查是不是全為英文字串	
	      if(preg_match($standard_Eh, $clientEh)) {
          // reg_match( 正則表達式 , 要比對的字串 , 比對結果)
	        $clientEh = "/" . $clientEh . "/" ;
		    
	          for ( $cnt = 0, $i = 0 ; $cnt < $rows ; $cnt++, $rs = mysqli_fetch_array( $qry ) ) {
			    //echo $rs[2] .'<br>';
                if($rs[2] != null && preg_match($clientEh, $rs[2])) {
	              // reg_match( 包含內容 , 要比對的字串)
				    if ( $i == 0 ){
					  echo '<form name ="radio" id ="form1" method="post" action="">' ;
		              echo '<table align="center" border="5">';
					  echo '<tr align="left" bgcolor= #5599FF >' ;
		               echo '<td><font color="white">順序</font></td>';
						echo '<td><font color="white">客戶名稱(中文)</font></td>';
					    echo '<td><font color="white">客戶名稱(英文)</font></td>';
						echo '<td><font color="white">客戶代碼</font></td>';
						
						//echo '<script src="onlyselet.js" type="text/javascript"></script>' ;
                        
						echo '<td><font color="white">選擇</font></td>';
                      echo '</tr>';
					} // if
					$j = $i+1 ;
				    echo '<tr align="left">' ;
		              echo '<td>'.$j.'</td>';
			          echo '<td>'.$rs[1].'</td>';
				      echo '<td>'.$rs[2].'</td>';
					  echo '<td>'.$rs[3].'</td>';
					  echo "<td><input type=\"radio\" name=\"selectList\" value=\"$rs[3]\"/></td>";
                    echo '</tr>';
	                $haveStr = true;
				    $i++;
                   
	            } // if
				
	          } // for
			echo '</table>';
			if ($haveStr) {
				echo '<br><br><input type="submit" id="updat"  name="button" value="更新客戶資料" />'.'&nbsp&nbsp' ;
				echo '<input type="submit" id="delet" name="button" value="刪除客戶資料" />'.'&nbsp&nbsp' ;
				 //echo '<form method="post"> ';
                  echo  '<input type="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'">'.'&nbsp&nbsp';
              
		          echo  '<input type="button" value="編輯使用者資料" onClick="location.href=\'userDataFind.php\'">'.'&nbsp&nbsp';
				  echo  '<input type=\"text\" name="submitVal" id="submitVal" value="" hidden/>';//hidden 
                   //echo '</form> ';
				echo '</form><br>' ;
				//echo '</form></div>' ;
			} // if	  
	        else if( !$haveStr ) {
			 echo '系統查無資料'.'<br>'.'<br>';
				
			 echo '<input type="submit" name="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'" />'.'&nbsp&nbsp';
		     echo '<input type="submit" name="button" value="重新查詢" onclick="history.back()"/>'.'<br>';
			} // else if
          }// if
	      else {
            echo '請輸入英文!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientData1.php>';
          } // else
        } // else if
        else if( $clientid != NULL ) {
  	      $standard_id = "/^([0-9A-Za-z]+)$/" ; //檢查是不是英數混和字串
	      if(preg_match($standard_id, $clientid)) {
            // reg_match( 正則表達式 , 要比對的字串 , 比對結果)
            $clientid = "/" . $clientid . "/" ;
		   
	          for ( $cnt = 0, $i = 0 ; $cnt < $rows ; $cnt++, $rs = mysqli_fetch_array( $qry ) ) {
			    // echo $rs[1] .'<br>';
                if($rs[3] != null && preg_match($clientid, $rs[3])) {
	              // reg_match( 包含內容 , 要比對的字串)
				    if ( $i == 0 ){
					  echo '<form name ="radio" id ="form1" method="post" action="">' ;
		              echo '<table align="center" border="5">';
					  echo '<tr align="left" bgcolor= #5599FF >' ;
		               echo '<td><font color="white">順序</font></td>';
						echo '<td><font color="white">客戶名稱(中文)</font></td>';
					    echo '<td><font color="white">客戶名稱(英文)</font></td>';
						echo '<td><font color="white">客戶代碼</font></td>';
						
						//echo '<script src="onlyselet.js" type="text/javascript"></script>' ;
                        
						echo '<td><font color="white">選擇</font></td>';
                      echo '</tr>';
					} // if
					$j = $i+1 ;
				    echo '<tr align="left">' ;
		              echo '<td>'.$j.'</td>';
			          echo '<td>'.$rs[1].'</td>';
				      echo '<td>'.$rs[2].'</td>';
					  echo '<td>'.$rs[3].'</td>';
					  echo "<td><input type=\"radio\" name=\"selectList\" value=\"$rs[3]\"/></td>";
                    echo '</tr>';
	                $haveStr = true;
				    $i++;
                   
	            } // if
	
	        } // for
		    echo '</table>';
			if ($haveStr) {
				echo '<br><br><input type="submit" id="updat" name="button" value="更新客戶資料" />'.'&nbsp&nbsp' ;
				echo '<input type="submit" id="delet" name="button" value="刪除客戶資料" />' ;
				 //echo '<form method="post"> ';
                  echo  '<input type="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'">'.'&nbsp&nbsp';
              
		          echo  '<input type="button" value="編輯使用者資料" onClick="location.href=\'userDataFind.php\'">'.'&nbsp&nbsp';
				  echo  '<input type=\"text\" name="submitVal" id="submitVal" value="" hidden/>';//hidden 
                   //echo '</form> ';
				echo '</form><br>' ;
				//echo '</form></div>' ;
			} // if	  
	        else if( !$haveStr ) {
			 echo '系統查無資料'.'<br>'.'<br>';
				
			 echo '<input type="submit" name="button" value="新增客戶資料" onClick="location.href=\'AddNewClientData.php\'" />'.'&nbsp&nbsp';
		     echo '<input type="submit" name="button" value="重新查詢" onclick="history.back()"/>'.'<br>';
			} // else if
			
          }// if
	      else {
            echo '請輸入正確客戶公司代碼!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=clientData1.php>';
          } // else
        } // else if()
        else{
	      echo '請輸入查詢資訊!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=clientData1.php>';
        } // else
  
      ?>
	 
    

	  <script>  
		$(document).ready(function () {
           $('input[type=radio]').change(function(){  //抓radio選的值
	          //alert($(this).val())
			  var ds = $(this).val();
			  $('#submitVal').val(ds);//隱藏欄位，要送出的值 
           });
        });
		
		$('#updat').click(function(){
			 $("#form1").attr("action","updateClientData.php");
		});
		
		$('#delet').click(function(){
			 $("#form1").attr("action","deleteClientData.php");
		});
		
		
		  
		
	    function enhancedRadio() {  
	      var r = document.forms[0].elements[this.name];  
	      for (var i=0;i<r.length;i++) {  
	        if (r[i].index != this.index)  
	            r[i].isChecked = false;  
	      } // for 
	      this.isChecked = !this.isChecked;  
	      this.checked = this.isChecked;  
	    } // enhancedRadio()
	    function deployRadioEvent() {  
	      var f = document.forms[0];  
	      for (var i=0;i<f.elements.length;i++) { 
	        var e = f.elements[i]; 
	        if (e.type == "radio") { 
	          e.onclick = enhancedRadio;  
	          e.setAttribute("isChecked",false);  
	          e.setAttribute("index",i); 
	        } // if    
	      } // for  
	    } // deployRadioEvent() 
	    deployRadioEvent();  
	  </script> 
	  
    </div>
  </body>
</html>
