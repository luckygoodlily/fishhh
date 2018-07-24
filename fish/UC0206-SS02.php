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
  <table width=100% border="0"  align="center" >
    <tbody > 
      <tr>
        <td width="405"><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>><a href="UC0206-SS01.php">魚種辨識查詢</a></td>
        <td width="122" align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" >登出</a><a href="index.php" ></a></td>
      </tr>
    </tbody>
  </table>
  <table width="800" border="1" align="center">
    <tbody>
      <tr>
        <td width="49" align="center" bgcolor="#4372C4" style="color: #FFFFFF">順序</td>
        <td width="53" align="center" bgcolor="#4372C4"style="color: #FFFFFF">船號</td>
        <td width="77" align="center" bgcolor="#4372C4"style="color: #FFFFFF">經度</td>
        <td width="75" align="center" bgcolor="#4372C4"style="color: #FFFFFF">緯度</td>
        <td width="75" align="center" bgcolor="#4372C4"style="color: #FFFFFF">魚種</td>
        <td width="81" align="center" bgcolor="#4372C4"style="color: #FFFFFF">時間</td>
        <td width="79" align="center" bgcolor="#4372C4"style="color: #FFFFFF">公司名稱(中文)</td>
        <td width="79" align="center" bgcolor="#4372C4"style="color: #FFFFFF">公司名稱(英文)</td>
        <td width="81" align="center" bgcolor="#4372C4"style="color: #FFFFFF">公司代碼</td>
        <td width="87" align="center" bgcolor="#4372C4"style="color: #FFFFFF">集魚燈號</td>
      </tr>
     
    </tbody>
  </table>
  <main style='text-align: center; color: #000000;'>  
	   <table width="800" border="1" align="center">
    <tbody>
			<?php
		
        include("mysql_connect.inc.php"); 
		
			 $select_value=$_POST['selectA'];
    
              $sql = "SELECT * FROM `tb1003` WHERE `Light_Serial_No` = \"$select_value\"";
		
          $result = mysqli_query($db,$sql)or die("Error sql statement");
		  $i =1;
		
		  $flag =0;
		
          while($row = mysqli_fetch_row($result)){
			  
			 $flag ++;
			
					$new_row = $row;?>
				 <tr>
        <td width="65" align="center"><?php echo $i?></td>
        <td width="55" align="center">NULL</td>
        <td width="88" align="center"><?php echo $new_row[2]?></td>
        <td width="88" align="center"><?php echo $new_row[1]?></td>
        <td width="88" align="center"><?php echo $new_row[4]?></td>
        <td width="90" align="center"><?php echo $new_row[0]?></td>
        <td width="90" align="center">NULL</td>
        <td width="90" align="center">NULL</td>
        <td width="90" align="center">NULL</td>
        <td width="90" align="center"><?php echo $new_row[3]?></td>
        </tr>
		
          <?php  //echo "順序: $i 經度： $row[1] 緯度：$row[2] 海溫: $row[5] 資料日期: $row[0]  資料來源: $row[3]<br>";
				$i ++; 	  
          } // while
    
		
			  	if(	 $flag==0)
				{
					       echo '<meta http-equiv=REFRESH CONTENT=2;url=UC0206-SS03.php>';

					exit;
				}
      ?>
		 
    </tbody>
  </table>
		  <div id="barcon" name="barcon"  align="center"></div>
	</main>
</div>
	
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
</body>
</html>