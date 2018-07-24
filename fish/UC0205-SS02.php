<!doctype html>
<?php session_start(); ?>
<?php $year = date("Y"); ?>
<?php $month = date("m"); ?>
<?php $day = date("d"); ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>海洋大數據平台海上智能系統</title>
<link href="AllCss1.css" rel="stylesheet" type="text/css">
</head>
<body class="center" id="main">
<header style="color: #FFFFFF" >海洋大數據平台海上智能系統  </header>
<div>
  <table width=100% border="0"  align="center" >
    <tbody > 
      <tr>
        <td ><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>><a href="UC0205-SS02.php">海溫查詢</a></td>
        <td  align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" onclick="return confirm('你確定要登出嗎?');" >登出</a><a href="index.php" ></a></td>
      </tr>
    </tbody>
  </table>
</div>
	
<main align="center">
	
  <form name="form" method="post" action="UC0205-SS03.php">
	  <table width="800" border="1" align="center">
	    <tbody>
	      <tr>
	        <th width="321" align="left" valign="middle" scope="row">1.時間資訊<font color="red">*</font></th>
	        <td colspan="2" align="center" valign="middle"></br>
	          日
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
              <select size="1" name="D2" id="D2" onchange="changeDate();">
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
<select size="1" name="D3" id="D3" onchange="changeDate();" >
  <script language="javascript">
					for(i=2018;i<=2030;i++) 
					{
						if (i<10) {document.write('<option value="'+i+'">'+"0"+i+'</option>');}
						else{
							document.write('<option value="'+i+'">'+i+'</option>')
							};
					  }
	  
	</script>
</select>
	
		  
		  </td>
          </tr>
	      <tr>
	        <th rowspan="2" align="left" scope="row">2.經緯度資訊<font color="red">*</font></th>
	        <td width="301">緯度:
              <input name="inameA" type="text" placeholder=" 請輸入緯度資訊,至多到小數點後三位" size="28" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')" maxlength="7" required  ></td>
	        <td width="156"><label for="select4">北緯或南緯:</label>
	          <select name="selectNS" id="select4">
	            <option value="N">N</option>
	            <option value="S">S</option>
            </select></td>
          </tr>
	  <tr>
	        <td>經度:
	          <input name="inameB" type="text"  placeholder=" 請輸入經度資訊,至多到小數點後三位" size="28" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')" maxlength="7"  required></td>
	        <td><label for="select4">西經或東經:</label>
	          <select name="selectWE" id="select4">
	            <option value="W">W</option>
	            <option value="E">E</option>
          </select></td>
          </tr>
	      <tr>
	        <th align="left" scope="row">3.選擇海溫資料來源<font color="red">*</font></th>
	        <td colspan="2" align="center"> <input name="RadioGroup1" type="radio" id="RadioGroup" value="0" checked="checked">
          集魚燈</label>
	         <input name="RadioGroup2" type="radio" id="RadioGroup" value="0" checked="checked">
          ARGO</label>           </label>
          </tr>

<script> 
function enhancedRadio() { 
	var r = document.forms[0].elements[this.name]; 
	for (var i=0;i<r.length;i++) { 
		if (r[i].index != this.index) 
			r[i].isChecked = false; 
	} 
	this.isChecked = !this.isChecked; 
	this.checked = this.isChecked; 
} 
function deployRadioEvent() { 
	var f = document.forms[0]; 
	for (var i=0;i<f.elements.length;i++) {
		var e = f.elements[i];
		if (e.type == "radio") {
			e.onclick = enhancedRadio; 
			e.setAttribute("isChecked",false); 
			e.setAttribute("index",i);
		}	 
	}	 
} 
deployRadioEvent(); 
</script>
        </tbody>
      </table>
	  <p>
	    <input name="button" type="submit" class="center" value="查詢" />
		  
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