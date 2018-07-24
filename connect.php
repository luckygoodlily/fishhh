<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
  include("mysql_connect.inc.php"); // include過的變數都能直接引用
  $account = $_POST['id'];
  $pw = $_POST['pw'];
  $companyid = $_POST['companyid'];

//對資料庫連線

//$sql = "SELECT * FROM login where username = '$id'";
//$result = mysqli_query($db ,$sql);
 
//$row = @mysqli_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
//$test1[0] =$row[0];
//$test2 =$row[2];
// echo intval($row[1]) + "  22\n";
//print_r($row[1]);
//echo intval($pw) + "33\n";
// if($account != null && $pw != null && $row[1] == $account && $row[2] == $pw){
        // //將帳號寫入session，方便驗證使用者身份
        // $_SESSION['username'] = $account;
        // echo '登入成功!';
        // echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
// }// if
// else{
        // echo '登入失敗!';
        // echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
// } //else
	
  mysqli_select_db( $db, $db_name ) or die( mysql_error() ) ;
  //echo '!!!123' ;
  if( $account != NULL && $pw != NULL && $companyid != NULL ) { // 這裡有warning，http://alfredwebdesign.blogspot.tw/2013/05/php-notice-undefined-index.html

    $query = "select * from login " ;
    $result = mysqli_query( $db,$query ) or die("Error sql statement");
    $rows = mysqli_num_rows( $result ) ;
	$notOK = TRUE;
    for ( $cnt = 0 ; $cnt < $rows ; $cnt++ ) {
      $row = mysqli_fetch_array( $result ) ;
	  $notOK = TRUE;  
	  if ( $row[1] == $account && $row[2] == $pw && $row[3] == $companyid) {
        echo "登入成功!\n" ;	
	    $_SESSION['username'] = $account;
		$notOK = FALSE;
		$cnt = $rows;
		if ( $row[4] =="ABC" ) {
		  $_SESSION['home'] = "superHome.php";
		  echo '<meta http-equiv=REFRESH CONTENT=1;url=superHome.php>';
		} // if
		else if ( $row[4] =="AB" ) {
		  $_SESSION['home'] = "clientSuperHome.php";
		  echo '<meta http-equiv=REFRESH CONTENT=1;url=clientSuperHome.php>';
		} // else if
		else if ( $row[4] =="A" ) {
		  $_SESSION['home'] = "commonHome.php";
		  echo '<meta http-equiv=REFRESH CONTENT=1;url=commonHome.php>';
		} // else if 
      } // if
	  
	  
    } // for() 
		
	if ( $notOK ){
		echo "登入失敗!\n" ;
		echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	} // if
    
  } // if
  else {
	echo "登入失敗!\n" ;
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';  
  } // else
?>