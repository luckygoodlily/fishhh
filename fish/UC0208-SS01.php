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
        <td width="471"><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>&gt;<a href="UC0208-SS01.php">集魚燈辨識結果分析</a></td>
        <td width="119" align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" onclick="return confirm('你確定要登出嗎?');" >登出</a><a href="index.php" ></a></td>
      </tr>
	</tbody>
  </table>
</div>
<main align="center">
  <form name="form" method="post" action="UC0208-SS02.php">
    <table width="500" border="1" align="center">
      <tbody>
	      <tr>
	        <th colspan="2" align="center" scope="row">請則一輸入以下資訊</th>
          </tr>
	      <tr>
	        <th width="245" align="left" scope="row">1.請選擇集魚燈型號:</th>
	        <td><select name="selectA" id="selectA" >
						  <option disabled selected value>請選擇一種集魚燈</option>
	          <option value="RYDH-265381561">RYDH-265381561</option>
	          <option value="RYDH-265381562">RYDH-265381562</option>
	          <option value="RYDH-265381563">RYDH-265381563</option>
	          <option value="RYDH-265381564">RYDH-265381564</option>
        </select>	        </tr>
	      <tr>
	        <th align="left" scope="row">2.請輸入魚種</th>
	        <td width="239"><select name="selectB" id="selectB" >
						  <option disabled selected value>請選擇一種魚</option>
	          <option value="大目鰱">大目鰱</option>
	          <option value="白帶魚">白帶魚</option>
	          <option value="鬼頭刀">鬼頭刀</option>
	          <option value="鯖魚">鯖魚</option>
        </select>	        </tr>
        </tbody>
      </table>
   <input type="submit" class="center"  value="查詢">
  </form>
	
<script>document.form.D1.value = '<?=$day?>';</script>
<script>document.form.D2.value = '<?=$month?>';</script>
<script>document.form.D3.value = '<?=$year?>';</script>
	
</main>
</body>
</html>