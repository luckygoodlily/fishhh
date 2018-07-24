<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
<html>
<head>
    <meta charset="utf-8">
    <title>客戶資料管理</title>
  </head>

  <body>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <div class="main" align="center">
	  <font color="white" size="6" >
	     <div style="background-color:#5599FF;">
		   <br><b>海洋大數據雲端管理系統</b><br><br>
		 </div>
	  </font><br>
	  
	  <div class="home" style="float:left;">&nbsp;&nbsp;
	    <a href="<?php echo $_SESSION['home']; ?>"  target="_self" title="首頁"><img src="/Icon/ab2.png" border="0"></a>
		<a href="<?php echo $_SESSION['home']; ?>">首頁</a> > <a href="clientData1.php">客戶資料管理
	  </div>
	  <div class="goout" style="float:right;">
	    <a href="logout.php"  target="_self" title="登出"><img src="/Icon/ab5.png" border="0"></a>
		<a href="logout.php" onclick="return confirm('你確定要登出嗎?');">登出</a>&nbsp;&nbsp;
	  </div><br><br><br><br>
	  &nbsp;&nbsp;&nbsp;更新客戶資料 <br><br>
	  
	    <?php
	      include("mysql_connect.inc.php"); // include過的變數都能直接引用
			
          if($_POST['submitVal'] != null){
           //將$_SESSION['username']丟給$id
           //這樣在下SQL語法時才可以給搜尋的值
           $ClientCpCode = $_POST['submitVal'];
	       //echo "111使用者代號：". "$ClientCpCode";
           //若以下$id直接用$_SESSION['username']將無法使用
           $_SESSION['ClientCpCode'] = $ClientCpCode;
				
	       $sql = "SELECT * FROM clientcomp";
           $qry = mysqli_query($db,$sql)or die("Error sql statement");
           $rows = mysqli_num_rows( $qry ) ;
		   //$row = mysqli_fetch_array($qry);
			 
		   
           for ( $cnt = 0 ; $cnt < $rows ; $cnt++ ) {
             $row = mysqli_fetch_array( $qry ) ;
	         // echo $row[3] . "<br>";
	         if ( $row[3] == $ClientCpCode  ) {        
		       $cnt = $rows ;	
             } // if
	  
           } // for() 
    
           echo "<form name=\"form\" method=\"post\" action=\"displayUpdateclientData.php\">";
	       echo "<table align=\"center\">" ;
            
           echo "<tr align=\"left\"><td style=\"width:250px\";>公司國別：</td><td>\"$row[4]\" ";
	       echo '<select id="country" name=country onChange=Javascript:changelist();>';
	       echo '  <OPTGROUP label="請選擇國家"> ';
           echo '  <option value="TWN">Taiwan</option>';

echo '  <option value="AFG">Afghanistan</option>';
echo '  <option value ="ALB">Albania</option>';
echo '  <option value ="DZA">Algeria</option>';
echo '  <option value="ASM">American Samoa</option>';
echo ' <option value="AND">Andorra</option>';
echo '  <option value ="AGO">Angola</option>';
echo '  <option value ="AIA">Anguilla</option>';
echo '  <option value="ATA">Antarctica</option>';
echo '  <option value="ATG">Antigua And Barbuda</option>';
echo '  <option value ="ARG">Argentina</option>';
echo '  <option value ="ARM">Armenia</option>';
echo '  <option value="ABW">Aruba</option>';
echo '  <option value="AUS">Australia</option>';
echo '  <option value ="AUT">Austria</option>';
  
echo '  <option value ="BHS">Bahamas</option>';
echo '  <option value="BHR">Bahrain</option>';
echo '  <option value="BGD">Bangladesh</option>';
echo '  <option value ="BGD">Barbados</option>';
echo '  <option value ="BLR">Belarus</option>';
echo '  <option value="BEL">Belgium</option>';
echo '  <option value="BLZ">Belize</option>';
echo '  <option value ="BEN">Benin</option>';
echo '  <option value ="BMU">Bermuda</option>';
echo '  <option value="BTN">Bhutan</option>';
echo '  <option value="BOL">Bolivia</option>';
echo '  <option value ="BIH">Bosnia and Herzegovina</option>';
echo '  <option value ="BWA">Botswana</option>';
echo '  <option value="BVT">Bouvet Island</option>';
echo '  <option value="BRA">Brazil</option>';
echo '  <option value ="IOT">British Indian Ocean</option>';
echo '  <option value ="BRN">Brunei Darussalam</option>';
echo '  <option value="BGR">Bulgaria</option>';
echo '  <option value="BFA">Burkina Faso</option>';
  
echo '  <option value ="BDI">Burundi</option>';
echo '  <option value ="KHM">Cambodia</option>';
echo '  <option value="CMR">Cameroon</option>';
echo '  <option value="CAN">Canada</option>';
echo '  <option value ="CPV">Cape Verde</option>';
echo '  <option value ="CYM">Cayman Islands</option>';
echo '  <option value="CAF">Central African</option>';
echo '  <option value="TCD">Chad</option>';
echo '  <option value ="CHL">Chile</option>';
echo '  <option value ="CHN">China</option>';
echo '  <option value="CXR">Christmas Island</option>';
echo '  <option value="CCK">Cocos Island</option>';
echo '  <option value ="COL">Colombia</option>';
echo '  <option value ="COM">Comoros</option>';
echo '  <option value="COG">Congo</option>';
echo '  <option value="COD">The Democratic Republic of the Congo</option>';
echo '  <option value ="COK">Cook Island</option>';
echo '  <option value ="CRI">Costa Rica</option>';
echo '  <option value="CIV">Côte dIvoire</option>';
  
echo '  <option value="HRV">Croatia</option>';
echo '  <option value ="CUB">Cuba</option>';
echo '  <option value ="CYP">Cyprus</option>';
echo '  <option value="CZE">Czech Republic</option>';
echo '  <option value="DNK">Denmark</option>';
echo '  <option value ="DJ">Djibouti</option>';
echo '  <option value ="DMA">Dominica</option>';
echo '  <option value="DOM">Dominican Republic</option>';
echo '  <option value="TMP">East Timor</option>';
echo '  <option value ="ECU">Ecuador</option>';
echo '  <option value ="EGY">Egypt</option>';
echo '  <option value="SLV">Salvador</option>';
echo '  <option value="GNQ">Equatorial Guinea</option>';
echo '  <option value ="ERI">Eritrea</option>';
echo '  <option value ="EST">Estonia</option>';
echo '  <option value="ETH">Ethiopia</option>';
echo '  <option value="FLK">Falkland Island</option>';
echo '  <option value ="FRO">Faroe IsLands</option>';
echo '  <option value ="FJI">Fiji</option>';
echo '  <option value="FIN">Finland</option>';
  
echo '  <option value="FRA">Frence</option>';
echo '  <option value ="GUF">French Guiana</option>';
echo '  <option value ="PYF">French Polynesia</option>';
echo '  <option value="ATF">French Southern Territories</option>';
echo '  <option value="GAB">Gabon</option>';
echo '  <option value ="GMB">Gambia</option>';
echo '  <option value ="GEO">Georgia</option>';
echo '  <option value="DEU">Germany</option>';
echo '  <option value="GHA">Ghana</option>';
echo '  <option value ="GIB">Gibraltar</option>';
echo '  <option value ="GRC">Greece</option>';
echo '  <option value="GRL">Greenland</option>';
echo '  <option value="GRD">Grenada</option>';
echo '  <option value ="GLP">Guadeloupe</option>';
echo '  <option value ="GUM">Guam</option>';
echo '  <option value="GTM">Guatemala</option>';
echo '  <option value="GIN">Guinea</option>';
echo '  <option value ="GNB">Guinea-Bissau</option>';
echo '  <option value ="GUY">Guyana</option>';
  
echo '  <option value="HTI">Haiti</option>';
echo '  <option value="HMD">Heard Island And Mcdonald Islands</option>';
echo '  <option value ="VAT">Holy See</option>';
echo '  <option value ="HND">Honduras</option>';
echo '  <option value="HKG">Hong Kong</option>';
echo '  <option value="HUN">Hungary</option>';
echo '  <option value ="ISL">IceLand</option>';
echo '  <option value ="IND">India</option>';
echo '  <option value="IDN">Indonesia</option>';
echo '  <option value="IRN">Islamic Republic of Iran</option>';
echo '  <option value ="IRQ">Iraq</option>';
echo '  <option value ="IRL">Ireland</option>';
echo '  <option value="ISR">Israel</option>';
echo '  <option value="ITA">Italy</option>';
echo '  <option value ="JAM">Jamaica</option>';
echo '  <option value="JPN">Japan</option>';
echo '  <option value="JOR">Jordan</option>';
echo '  <option value ="KAZ">Kazakstan</option>';
echo '  <option value ="KEN">Kenya</option>';
echo '  <option value="KIR">Kiribati</option>';
echo '  <option value="PRK">Democratic People\'s Republic of Korea</option>';
  
echo '  <option value ="KOR">Korea</option>';
echo '  <option value ="KWT">Kuwait</option>';
echo '  <option value="KGZ">Kyrgyzstan</option>';
echo '  <option value="LAO">Lao People\'s Democratic Republic</option>';
echo '  <option value ="LVA">Latvia</option>';
echo '  <option value ="LBN">Lebanon</option>';
echo '  <option value="LSO">Lesotho</option>';
echo '  <option value="LBR">Liberia</option>';
echo '  <option value ="LBY">Libyan Arab Jamahiriya</option>';
echo '  <option value ="LIE">Liechtenstein</option>';
echo '  <option value="LTU">Lithuania</option>';
echo '  <option value="LUX">Luxembourg</option>';
echo '  <option value ="MAC">Macau</option>';
echo '  <option value ="MKD">Macedonia</option>';
echo '  <option value="MDG">Madagascar</option>';
echo '  <option value="MWI">Malawi</option>';
echo '  <option value ="MYS">Malaysia</option>';
  
echo '  <option value ="MDV">Maldives</option>';
echo '  <option value="MLI">Mali</option>';
echo '  <option value="MLT">Malta</option>';
echo '  <option value ="MHL">Marshall Islands</option>';
echo '  <option value ="MTQ">Martinique</option>';
echo '  <option value="MRT">Opel</option>';
echo '  <option value="MUS">Mauritania</option>';
echo '  <option value ="MYT">Mayotte</option>';
echo '  <option value="MEX">Mexico</option>';
echo '  <option value="FSM">Federated States of Micronesia</option>';
echo '  <option value ="MDA">Republic of Moldova</option>';
echo '  <option value ="MCO">Monaco</option>';
echo '  <option value="MNG">Mongolia</option>';
echo '  <option value="MSR">Montserrat</option>';
echo '  <option value ="MAR">Morocco</option>';
echo '  <option value ="MOZ">Mozambique</option>';
echo '  <option value="MMR">Myanmar</option>';
echo '  <option value="NAM">Namibia</option>';
echo '  <option value ="NRU">Nauru</option>';
  
echo '  <option value ="NPL">Nepal</option>';
echo '  <option value="NLD">Netherlands</option>';
echo '  <option value="ANT">Netherlands Antilles</option>';
echo '  <option value ="NCL">New CaleDonia</option>';
echo '  <option value ="NZL">New Zealand</option>';
echo '  <option value="NIC">Nicaragua</option>';
echo '  <option value="NER">Niger</option>';
echo '  <option value ="NGA">Nigeria</option>';
echo '  <option value ="NIU">Niue</option>';
echo '  <option value="NFK">Norfolk Island</option>';
echo '  <option value="MNP">Northern Mariana Islands</option>';
echo '  <option value ="NOR">Norway</option>';
echo '  <option value ="OMN">Oman</option>';
echo '  <option value="PAK">Pakistan</option>';
echo '  <option value="PLW">Palau</option>';
echo ' <option value ="PSE">Occupied Palestinian Territory</option>';
echo '  <option value ="PAN">Panama</option>';
echo '  <option value="PNG">Papua New Guinea</option>';
echo '  <option value="PRY">Paraguay</option>';
  
echo ' <option value ="PER">Peru</option>';
echo '  <option value="PHL">Philippines</option>';
echo '  <option value="PCN">Pitcairn</option>';
echo '  <option value ="POL">Poland</option>';
echo '  <option value ="PRT">Portugal</option>';
echo '  <option value="PRI">Puerto Rico</option>';
echo '  <option value="QAT">Qatar</option>';
echo '  <option value ="REU">Reunion</option>';
echo '  <option value ="ROM">Romania</option>';
echo '  <option value="RUS">Russian Federation</option>';
echo '  <option value="RWA">Rwanda</option>';
echo '  <option value ="SHN">Saint Helena</option>';
echo '  <option value ="KNA">Saint Kitts And Nevis</option>';
echo '  <option value="LCA">Saint Lucia</option>';
echo '  <option value="SPM">Saint Pierre And Miqueln</option>';
echo '  <option value ="VCT">Saint Vincent And The Grenadines</option>';
echo '  <option value ="WSM">Samoa</option>';
echo '  <option value="SMR">San Marino</option>';
  
echo '  <option value="STP">São Tomé and Príncipe</option>';
echo '  <option value ="SAU">Saudi Arabia</option>';
echo '  <option value ="SEN">Senegal</option>';
echo '  <option value="SYC">Seychelles</option>';
echo '  <option value="SLE">Sierra Leone</option>';
echo '  <option value ="SGP">Singapore</option>';
echo '  <option value ="SVK">Slovakia</option>';
echo '  <option value="SVN">Slovenia</option>';
echo '  <option value="SLB">Colomon Islands</option>';
echo '  <option value ="SOM">Somalia</option>';
echo '  <option value ="ZAF">South Africa</option>';
echo '  <option value="SGS">South GeorGia And The South Sandwich Islands</option>';
echo '  <option value="ESP">Spain</option>';
echo '  <option value="LKA">Sri Lanka</option>';
echo '  <option value="SDN">Sudan</option>';
echo '  <option value ="SUR">Suriname</option>';
echo '  <option value ="SJM">Svalbard And Jan Mayen</option>';
   
echo '  <option value="SWZ">Swaziland</option>';
echo '  <option value="SWE">Sweden</option>';
echo '  <option value ="CHE">Switzerland</option>';
echo '  <option value ="SYR">Syrian Arab Republic</option>';
echo '  <option value="TJK">Tajikistan</option>';
echo '  <option value ="TZA">United Republic of Tanzania</option>';
echo '  <option value ="THA">Thailand</option>';
echo ' <option value="TGO">Togo</option>';
echo '  <option value="TKL">Tokelau</option>';
echo '  <option value ="TON">Tonga</option>';
echo '  <option value="TTO">Trinidad and Tobago</option>';
echo '  <option value="TUN">Tunisia</option>';
echo '  <option value ="TUR">Turkey</option>';
echo '  <option value ="TKM">Turkmenistan</option>';
echo '  <option value="TCA">Turks And Caicos Islands</option>';
echo '  <option value="TUV">Tuvalu</option>';
echo '  <option value ="UGA">Uganda</option>';
echo '  <option value ="UKR">Ukraine</option>';
  
echo '  <option value="ARE">Unitad Arab Emirates</option>';
echo '  <option value="GBR">United Kingdom</option>';
echo '  <option value ="USA">United States</option>';
echo '  <option value ="UMI">Ubited States Minor Outlying Islands</option>';
echo '  <option value="URY">Uruguay</option>';
echo '  <option value="UZB">Uzbekistan</option>';
echo '  <option value ="VUT">Vanuatu</option>';
echo '  <option value ="VEN">Venezuela</option>';
echo '  <option value="VNM">Viet Nam</option>';
echo '  <option value="VGB">British Virgin Islands</option>';
echo '  <option value ="VIR">Virgin Islands of the United States</option>';
echo '  <option value ="WLF">Wallis And Futuna</option>';
echo '  <option value="ESH">Western Sahara</option>';
echo '  <option value="YEM">Yemen</option>';
echo '  <option value ="YUG">Yugoslavia</option>';
  
echo '  <option value ="ZMB">Zambia</option>';
echo '  <option value="ZWE">Zimbabwe</option>';
  
  
echo '</select></td></tr><br>';
             echo "<tr align=\"left\"><td style=\"width:250px\";>客戶公司中文名稱：</td>";
			 echo "<td><input type=\"text\" name=\"clientCh\" pattern=\"[\u4e00-\u9fa5]{2,16}\" title=\"格式不正確，請輸入中文\" value=\"$row[1]\" /> </td></tr>";
				
             echo "<tr align=\"left\"><td style=\"width:250px\";>客戶公司英文名稱：</td>";
			 echo "<td><input type=\"text\" name=\"clientEn\" pattern=\"[A-Za-z]{}\" title=\"格式不正確，請輸入2~50位英文\" value=\"$row[2]\" /></td></tr> ";
			 
			 echo "<tr align=\"left\"><td style=\"width:250px\";>客戶公司統一編號：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"Taxid\" value=\"$row[5]\" /></td></tr> ";
			 
			 echo "<tr align=\"left\"><td style=\"width:250px\";>客戶公司所在城市：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"clientcity\" pattern=\"[\u4e00-\u9fa5\A-Za-z]{2,30}\" title=\"格式不正確，請輸入2~30位中文或2~50位英文\" value=\"$row[6]\" /></td></tr> ";
			 
			 echo "<tr align=\"left\"><td style=\"width:250px\";>客戶公司地址：<font color='red'>*</font></td>";
			 echo "<td><input type=\"text\" name=\"clientsdresss\" pattern=\"[\u4e00-\u9fa5\A-Za-z]{2,25}\" title=\"格式不正確，請輸入2~25位中文或2~50位英文字\" value=\"$row[7]\" /></td></tr> ";
			 
             
			 echo "<tr align=\"left\"><td style=\"width:250px\";>公司代碼：</td>";
			 echo "<td>\"$row[3]\" (此項目無法修改)</td></tr> ";

             echo "</table>";
			 echo "<input type=\"submit\" name=\"button\" value=\"確定\" /></form>";
           } // if
           else {
             echo '請選擇資料!';
             echo '<meta http-equiv=REFRESH CONTENT=2;url="clientData1.php">';
           } // else
          ?>
			
		  

    </div>
  </body>
</html>
