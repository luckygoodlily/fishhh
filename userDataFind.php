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
	    <img src="/Icon/ab2.png" border="0">&nbsp;
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > 使用者資料管理
		
	  </div>
	  
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>

      <?php
        //連接資料庫
        //只要此頁面上有用到連接MySQL就要include它
        include("mysql_connect.inc.php"); // include過的變數都能直接引用
        //echo $_SESSION['home'];
	    $sql = "SELECT * FROM userdata";
        $qry = mysqli_query($db,$sql)or die("Error sql statement");
        $rows = mysqli_num_rows( $qry ) ;
		$rs = mysqli_fetch_array($qry);
		$haveStr = false;
		//echo $_SESSION['home'];
	  
	    echo '<form name ="radio" id ="form1" method="post" action="">' ;
		echo '<table align="center" border="3" >';
	    for ( $cnt = 0, $i = 0 ; $cnt < $rows ; $cnt++, $rs = mysqli_fetch_array( $qry ) ) {
		  
		  if ( $i == 0 ){
			echo '<tr align="left" bgcolor= #5599FF >' ;
			echo '<td><font color="white">使用者代號</font></td>';
		    echo '<td><font color="white">帳號</font></td>';
			echo '<td><font color="white">密碼</font></td>';
			echo '<td><font color="white">公司代碼</font></td>';
			echo '<td><font color="white">姓名(中文)</font></td>';
		    echo '<td><font color="white">姓名(英文)</font></td>';
			echo '<td><font color="white">使用者身分</font></td>';
			echo '<td><font color="white">電話</font></td>';
		    echo '<td><font color="white">信箱</font></td>';
			echo '<td><font color="white">選擇</font></td>';
            echo '</tr>';
		  } // if
			  
		  echo '<tr align="left">' ;   
		  echo '<td>'.$rs[1].'</td>';
		  echo '<td>'.$rs[2].'</td>';
		  echo '<td>'.$rs[3].'</td>';
		  echo '<td>'.$rs[4].'</td>';
		  echo '<td>'.$rs[5].'</td>';
		  echo '<td>'.$rs[6].'</td>';
		  echo '<td>'.$rs[11].'</td>';
		  echo '<td>'.$rs[7].$rs[8].'#'.$rs[9].'</td>';
		  echo '<td>'.$rs[10].'</td>';
		  echo "<td><input type=\"radio\" name=\"select\" value=\"$rs[2]\"/></td>";
          echo '</tr>';
	      $haveStr = true;
		  $i++;
        } // for
			
		echo '</table>';
		if ($haveStr) {
		  echo '<br><br><input type="submit" id="updat" name="button" value="更新使用者資料" />'.'&nbsp&nbsp' ;
		  echo '<input type="submit" id="delet" name="button" value="刪除使用者資料" />'.'&nbsp&nbsp' ;
          echo  '<input type="button" value="新增使用者資料" onClick="location.href=\'AddNewUserData.php\'">'.'&nbsp&nbsp';
          echo  '<input type="button" value="更新集魚燈資料" onClick="location.href=\'updateFishLight.php\'">';
		  echo  '<input type=\"text\" name="submitVal" id="submitVal" value="" hidden/>';
          echo '</form><br>' ;
		  //echo '</form></div>' ;
	    } // if	  
	    else if( !$haveStr ) {
		  echo '系統查無資料'.'<br>'.'<br>';
		  echo  '<input type="button" value="新增使用者資料" onClick="location.href=\'AddNewUserData.php\'">'.'&nbsp&nbsp';
          echo  '<input type="button" value="重新查詢" onclick="history.back()">';		
		
		} // else if

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
			 $("#form1").attr("action","updateUserData.php");
		});
		
		$('#delet').click(function(){
			 $("#form1").attr("action","deleteUserData.php");
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
