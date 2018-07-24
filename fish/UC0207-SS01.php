<!doctype html>
<?php session_start(); ?>
<?php $year = date("Y"); ?>
<?php $month = date("m"); ?>
<?php $day = date("d"); ?>
<html>
<head>
<meta charset="utf-8">
<title>海洋大數據平台海上智能系統</title>
<link href="AllCss1.css" rel="stylesheet" type="text/css">
</head>
<body class="center" id="main">
<header >海洋大數據平台海上智能系統  </header>
<div>
  <table width=100% border="0"  align="center" >
    <tbody > 
   
      <tr>
        <td width="471"><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>&gt;<a href="UC0207-SS01.php">漁獲等級查詢</a></td>
        <td width="119" align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" onclick="return confirm('你確定要登出嗎?');" >登出</a></td>
      </tr>
	</tbody>
  </table>
</div>
<main align="center">
  <form name="form" method="post" action="UC0207-SS02.php">
    <table width="800" border="1" align="center">
      <tbody>
	      <tr>
	        <th colspan="2" align="center" scope="row">請則一輸入以下資訊</th>
          </tr>
	      <tr>
	        <th width="296" align="left" scope="row">1.請輸入公司名稱(中文)</th>
	        <td><input type="text" name="lname3" onkeypress="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"></td>
          </tr>
	      <tr>
	        <th align="left" scope="row">2.請輸入公司代碼(英文)</th>
	        <td><input type="text" name="lname2" pattern="[A-Za-z0-9]{2,15}" title="格式不正確，請輸入英文"></td>
          </tr>
	      <tr>
	        <th align="left" scope="row">3.請輸入客戶代碼:</th>
	        <td><input type="text" name="lname" pattern="[A-Za-z0-9]{7}" title="格式不正確，請輸入英文及數字7位公司代碼">            
          </tr>
	      <tr>
	        <th align="left" scope="row">4.請選擇集魚燈型號:</th>
	        <td><select name="selectA" >
			<option disabled selected value>請選擇一種集魚燈</option>
	          <option value="RYDH-265381561">RYDH-265381561</option>
	          <option value="RYDH-265381562">RYDH-265381562</option>
	          <option value="RYDH-265381563">RYDH-265381563</option>
	          <option value="RYDH-265381564">RYDH-265381564</option>
				<option value="RYDH-265381565">RYDH-265381565</option>
        </select>	        </tr>
	      <tr>
	        <th align="left" scope="row">5.時間資訊</th>
	        <td width="239">日
              <select size="1" name="D1">
                <script language="javascript">
					 for(i=1;i<=31;i++) 
					{
						if (i<10) {document.write('<option value="'+"0"+i+'">'+"0"+i+'</option>');}
						else{
							document.write('<option value="'+i+'">'+i+'</option>')
							};
					  }
				  </script>
              </select>
              <label for="select2">月</label>
              <select size="1" name="D2" id="D2" onchange="changeDate()">
                <script language="javascript">
					for(i=1;i<=12;i++) 
					{
						if (i<10) {document.write('<option value="'+"0"+i+'">'+"0"+i+'</option>');}
						else{
							document.write('<option value="'+i+'">'+i+'</option>')
							};
					  }
				  </script>
              </select>
年
<select size="1" name="D3" id="D3" onchange="changeDate()">
  <script language="javascript">
					for(i=2018;i<=2030;i++) 
					{
						if (i<10) {document.write('<option value="'+i+'">'+"0"+i+'</option>');}
						else{
							document.write('<option value="'+i+'">'+i+'</option>')
							};
					  }
	  
	</script>
</select>	        </tr>
        </tbody>
      </table>
   <input type="submit" class="center"  value="查詢">
	  
	  <script language="javascript">
			 
			
			function changeDate()
			{
				
				var mon_element = document.getElementById('D2');
  				var mon1 = mon_element.options[mon_element.selectedIndex].value;
				var year_element = document.getElementById('D3');
  				var year1 = year_element.options[year_element.selectedIndex].value;
				
				var Days= new Date(year1, mon1, 0).getDate(); 
				
				document.form.D1.length=0;
				
				for(var i=1;i<=Days;i++)
					{
						if(i<10)
				document.form.D1.options[i]=new Option("0"+i, "0"+i);	// 設定新選項
						else
							document.form.D1.options[i]=new Option(i, i);
					}
				document.form.D1.length=i;	// 刪除多餘的選項
					
				
			}
		  </script>
	  
  </form>
	
<script>document.form.D1.value = '<?=$day?>';</script>
<script>document.form.D2.value = '<?=$month?>';</script>
<script>document.form.D3.value = '<?=$year?>';</script>
	
</main>
</body>
</html>