<!doctype html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<title>海洋大數據平台海上智能系統</title>
<link href="AllCss1.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	color: #000000;
}
</style>
</head>
<body class="center" id="main">
<header >海洋大數據平台海上智能系統  </header>
<div>
  
  <table width=100%  border="0"  align="center" >
    <tbody > 
      <tr>
        <td width="405"><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>><a href="UC0205-SS02.php">海溫查詢</a></td>
        <td width="122" align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" onclick="return confirm('你確定要登出嗎?');" >登出</a><a href="index.php" ></a></td>
      </tr>
    </tbody>
  </table>
  <table width="500" border="1" align="center" id="table_Title">
    <tbody>
      <tr>
        <td width="57" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">順序</span></td>
        <td width="69" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">經度</span></td>
        <td width="84" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">緯度</span></td>
        <td width="78" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">海溫</span></td>
        <td width="89" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">資料日期</span></td>
        <td width="83" align="center" bgcolor="#4372C4"><span style="color: #FFFFFF">資料來源</span></td>
      </tr>
      <?php
		
        include("mysql_connect.inc.php"); 
		
			$long = $_POST['inameB'].'°'.$_POST['selectWE']; //經度
			$la = $_POST['inameA'].'°'.$_POST['selectNS']; //緯度
			
    
          $sql = "SELECT * FROM `tb2007` WHERE `longitude` = \"$long\" AND `latitude` = \"$la\"";
		
          $result = mysqli_query($db,$sql)or die("Error sql statement");
		  $i =1;
		
				if(($row = mysqli_fetch_row($result))==0)
				{
					       echo '<meta http-equiv=REFRESH CONTENT=2;url=UC0205-SS04.php>';

					exit;
				}
		
          while($row = mysqli_fetch_row($result)){
			
					$new_row = $row;?>
      <?php  //echo "順序: $i 經度： $row[1] 緯度：$row[2] 海溫: $row[5] 資料日期: $row[0]  資料來源: $row[3]<br>";
				$i ++; 

          }  // while?>
    </tbody>
  </table>
  <table width="500" border="1" align="center" id="table_result">
    <tbody>
			<?php
		
        include("mysql_connect.inc.php"); 
		
			$long = $_POST['inameB'].'°'.$_POST['selectWE']; //經度
			$la = $_POST['inameA'].'°'.$_POST['selectNS']; //緯度
			
    
          $sql = "SELECT * FROM `tb2007` WHERE `longitude` = \"$long\" AND `latitude` = \"$la\"";
		
          $result = mysqli_query($db,$sql)or die("Error sql statement");
		  $i =1;
		
		
		
			$flag = 0;
          while($row = mysqli_fetch_row($result)){
			  
			 
		 $flag ++;
			
					$new_row = $row;?>
				 <tr>
        <td width="65" align="center"><span style="color: #000000"><?php echo $i?></span></td>
        <td width="55" align="center"><span style="color: #000000"><?php echo $new_row[1]?></span></td>
        <td width="88" align="center"><span style="color: #000000"><?php echo $new_row[2]?></span></td>
        <td width="88" align="center"><span style="color: #000000"><?php echo $new_row[5]?></span></td>
        <td width="88" align="center"><span style="color: #000000"><?php echo $new_row[0]?></span></td>
        <td width="90" align="center"><span style="color: #000000"><?php echo $new_row[3]?></span></td>
      </tr>
		
          <?php  //echo "順序: $i 經度： $row[1] 緯度：$row[2] 海溫: $row[5] 資料日期: $row[0]  資料來源: $row[3]<br>";
				$i ++; 

          }  	
				if( $flag ==0)
				{
					       echo '<meta http-equiv=REFRESH CONTENT=2;url=UC0205-SS04.php>';

					exit;
				}
		
		// while?>
		 
    </tbody>
  </table>
	    <div id="barcon" name="barcon"  align="center"></div>
  <p style="text-align: center"><?php echo $long; ?> <br> <?php echo $la;?>
			 </p>
 
	<main style='text-align:center'>  
	  
    </main>
</div>
</body>
	
	<script>
goPage(1,5);
    function goPage(pno, psize) {
        var itable = document.getElementById("table_result");//通过ID找到表格
        var num = itable.rows.length;//表格所有行数(所有记录数)
        var totalPage = 0;//总页数
        var pageSize = psize;//每页显示行数
        //总共分几页
        if (num / pageSize > parseInt(num / pageSize)) {
            totalPage = parseInt(num / pageSize) + 1;
        } else {
            totalPage = parseInt(num / pageSize);
        }
        var currentPage = pno;//当前页数
        var startRow = (currentPage - 1) * pageSize + 1;//开始显示的行  1
        var endRow = currentPage * pageSize;//结束显示的行   15
        endRow = (endRow > num) ? num : endRow;
        //遍历显示数据实现分页
        for (var i = 1; i < (num + 1); i++) {
            var irow = itable.rows[i - 1];
            if (i >= startRow && i <= endRow) {
                irow.style.display = "block";
            } else {
                irow.style.display = "none";
            }
        }
        var tempStr = "";
        if (currentPage > 1) {
            tempStr += "<a href=\"#\" onClick=\"goPage(" + (currentPage - 1) + "," + psize + ")\"><上一頁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>"
            for (var j = 1; j <= totalPage; j++) {
                tempStr += "<a href=\"#\" onClick=\"goPage(" + j + "," + psize + ")\">" + j + "&nbsp;&nbsp;&nbsp;</a>"
            }
        } else {
            tempStr += "<上一頁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            for (var j = 1; j <= totalPage; j++) {
                tempStr += "<a href=\"#\" onClick=\"goPage(" + j + "," + psize + ")\">" + j + "&nbsp;&nbsp;&nbsp;</a>"
            }
        }
        if (currentPage < totalPage) {
            tempStr += "<a href=\"#\" onClick=\"goPage(" + (currentPage + 1) + "," + psize + ")\">下一頁>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
            for (var j = 1; j <= totalPage; j++) {
            }
        } else {
            tempStr += "  下一頁>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            for (var j = 1; j <= totalPage; j++) {
            }
        }
        document.getElementById("barcon").innerHTML = tempStr;
    }


</script>
	
	
</html>