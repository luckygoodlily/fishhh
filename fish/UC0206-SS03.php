<!doctype html>
<?php session_start(); ?>
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
        <td width="405"><a href="index.php"><img src="image/ab2.png" alt="" width="26" height="26"/></a><a href="../<?php echo $_SESSION['home']; ?>">首頁</a>><a href="index.php">報表查詢</a>><a href="UC0206-SS01.php">魚種辨識查詢</a></td>
        <td width="122" align="right"><img src="image/ab5.png" width="26" height="26" alt=""/><a href="../logout.php" onclick="return confirm('你確定要登出嗎?');" >登出</a><a href="index.php" ></a></td>
      </tr>
    </tbody>
  </table>
  <table width="600" border="0"  align="center" >
    <tbody >
      <tr>
        <td width="444">公司名稱: </td>
        <td align="left">客戶代碼:</td>
      </tr>
    </tbody>
  </table>
  <form method="post" name="form1" class="center">
    <table width="600" align="center" border="0">
      <tbody>
        <tr>
          <th height="400" align="center"  valign="bottom" class="center" scope="row">系統查無資料</th>
        </tr>
      </tbody>
    </table>
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>