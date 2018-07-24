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
        $fishlight = $_POST['fishlight'];
        $fishid = $_POST['fishid'];
        $fishLightBoat = $_POST['fishLightBoat'];
        
	    $sql = "SELECT * FROM fishlight";
        $qry = mysqli_query($db,$sql)or die("Error sql statement");
        $rows = mysqli_num_rows( $qry ) ;
		$rs = mysqli_fetch_array($qry);
		$haveStr = false;
		// define variables and set to empty values
        $standard_int = "/^([0-9]+)$/";
	    $standard_MixEnInt = "/^([0-9A-Za-z]+)$/";
	    
	    
	    
        if( $fishlight != NULL ){
 
		  if( $fishid != NULL && strlen( $fishid ) != 7 ){
			echo '請輸入7位數字或英文組成的序號!<br><br>';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=findFishlightData.php>';    
		  } // if
		  else if( $fishLightBoat != NULL && ( strlen( $fishLightBoat ) < 6 || strlen( $fishLightBoat ) > 9 ) ){
			echo '請輸入6~9位數字!<br><br>';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=findFishlightData.php>';  
		  } // else if
		  else { 
		    $fishlight = "/" . $fishlight . "/" ;
		    $fishid = "/" . $fishid . "/" ;
		    $fishLightBoat = "/" . $fishLightBoat . "/" ;
		    for ( $cnt = 0, $i = 0 ; $cnt < $rows ; $cnt++, $rs = mysqli_fetch_array( $qry ) ) {
			    
                if( preg_match($fishlight, $rs[1]) && preg_match($fishid, $rs[2]) && preg_match($fishLightBoat, $rs[3]) ) {
	              // reg_match( 包含內容 , 要比對的字串)
				    if ( $i == 0 ){

					  echo '<form name ="radio" id ="form1" method="post" action="">' ;
		              echo '<table align="center" border="5">';
					  echo '<tr align="left" bgcolor= #5599FF >' ;
		              echo '<td><font color="white">順序</font></td>';
					  echo '<td><font color="white">集魚燈型號</font></td>';
				      echo '<td><font color="white">集魚燈序號</font></td>';
					  echo '<td><font color="white">搭配魚船編號</font></td>';
				      echo '<td><font color="white">集魚燈建立日期時間</font></td>';
					  echo '<td><font color="white">選擇</font></td>';
                      echo '</tr>';
					} // if
					$j = $i+1 ;
				    echo '<tr align="left">' ;
		              echo '<td>'.$j.'</td>';
			          echo '<td>'.$rs[1].'</td>';
				      echo '<td>'.$rs[2].'</td>';
					  echo '<td>'.$rs[3].'</td>';
					  echo '<td>'.$rs[4].'</td>';
					  echo "<td><input type=\"radio\" name=\"selectList\" value=\"$rs[3]\"/></td>";
                    echo '</tr>';
	                $haveStr = true;
				    $i++;
                   
	            } // if
				
	          } // for
			echo '</table>';
			if ($haveStr) {
				  echo '<br><br><input type="submit" id="updat" name="button" value="更新集魚燈資料" />'.'&nbsp&nbsp' ;
		  echo '<input type="submit" id="delet" name="button" value="刪除集魚燈資料" />'.'&nbsp&nbsp' ;
                  echo  '<input type="button" value="新增集魚燈資料" onClick="location.href=\'AddNewFishLightData.php\'">'.'&nbsp&nbsp';
				echo  '<input type=\"text\" name="submitVal" id="submitVal" value="" hidden/>';
				echo '</form><br>' ;
			} // if	  
	        else if( !$haveStr ) {
			  echo '查無資料'.'<br>'.'<br>';
			  echo '<input type="submit" name="button" value="新增資料" onClick="location.href=\'AddNewFishLightData.php\'" />'.'&nbsp&nbsp';
		      echo '<input type="submit" name="button" value="重新查詢" onclick="history.back()"/>'.'<br>';
			} // else if
		  } // else
		} // if
        else{
	      echo '請輸入查詢資訊!';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=findFishlightData.php>';
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
			 $("#form1").attr("action","updateFishlightData.php");
		});
		
		$('#delet').click(function(){
			 $("#form1").attr("action","deleteFishlightData.php");
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