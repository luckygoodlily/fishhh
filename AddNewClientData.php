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
	 <script src="/jquery/jquery-1.11.1.min.js"></script>
     <script type="text/javascript">
        changelist();
        function changelist(){
		  //console.log(document.getElementById("country").value);
		  //$("#Ch1").hide();
		  //$("#En1").hide();
		  //$("#Ch2").hide();
		  //$("#En2").hide();
          switch(document.getElementById("country").value){
            case "TWN":
              //document.all.countrylist.innerHTML=
		      //alert("show");   
		      var result_styleold = document.getElementById('Ch2').style;
              result_styleold.display = 'none'; 
			  var result_styleold1 = document.getElementById('En2').style;
              result_styleold1.display = 'none'; 
				  
              var result_style = document.getElementById('Ch1').style;
              result_style.display = 'table-row';	
			  var result_style1 = document.getElementById('En1').style;
              result_style1.display = 'table-row';
			  var result_styleTax = document.getElementById('Tax').style;
              result_styleTax.display = 'table-row'; 
              break;
            default:
             //document.all.countrylist.innerHTML=
		     //alert("show");
			 var result_styleold = document.getElementById('Ch1').style;
             result_styleold.display = 'none'; 
			 var result_styleold1 = document.getElementById('En1').style;
             result_styleold1.display = 'none'; 
		     var result_styleTaxold = document.getElementById('Tax').style;
             result_styleTaxold.display = 'none'; 
			 	  
             var result_style = document.getElementById('Ch2').style;
             result_style.display = 'table-row';
	         var result_style1 = document.getElementById('En2').style;
             result_style1.display = 'table-row';
             break;
         } // switch
       } // changelist()                                                                               
    </script>
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
      <form name=data method="post" action="updateNewClientData.php">
	    <table align="center">
		  
          
          <tr align="left">
		    <td style="width:250px";>請選擇客戶公司國別<font color="red">*</font></td>
			<td> 
			  <select id="country" name=country onChange=Javascript:changelist();>
  <OPTGROUP label="請選擇國家"> 
    
  <option value="AFG">Afghanistan</option>
  <option value="TWN">Taiwan</option>
  <option value ="ALB">Albania</option>
  <option value ="DZA">Algeria</option>
  <option value="ASM">American Samoa</option>
  <option value="AND">Andorra</option>
  <option value ="AGO">Angola</option>
  <option value ="AIA">Anguilla</option>
  <option value="ATA">Antarctica</option>
  <option value="ATG">Antigua And Barbuda</option>
  <option value ="ARG">Argentina</option>
  <option value ="ARM">Armenia</option>
  <option value="ABW">Aruba</option>
  <option value="AUS">Australia</option>
  <option value ="AUT">Austria</option>
  
  <option value ="BHS">Bahamas</option>
  <option value="BHR">Bahrain</option>
  <option value="BGD">Bangladesh</option>
  <option value ="BGD">Barbados</option>
  <option value ="BLR">Belarus</option>
  <option value="BEL">Belgium</option>
  <option value="BLZ">Belize</option>
  <option value ="BEN">Benin</option>
  <option value ="BMU">Bermuda</option>
  <option value="BTN">Bhutan</option>
  <option value="BOL">Bolivia</option>
  <option value ="BIH">Bosnia and Herzegovina</option>
  <option value ="BWA">Botswana</option>
  <option value="BVT">Bouvet Island</option>
  <option value="BRA">Brazil</option>
  <option value ="IOT">British Indian Ocean</option>
  <option value ="BRN">Brunei Darussalam</option>
  <option value="BGR">Bulgaria</option>
  <option value="BFA">Burkina Faso</option>
  
  <option value ="BDI">Burundi</option>
  <option value ="KHM">Cambodia</option>
  <option value="CMR">Cameroon</option>
  <option value="CAN">Canada</option>
  <option value ="CPV">Cape Verde</option>
  <option value ="CYM">Cayman Islands</option>
  <option value="CAF">Central African</option>
  <option value="TCD">Chad</option>
  <option value ="CHL">Chile</option>
  <option value ="CHN">China</option>
  <option value="CXR">Christmas Island</option>
  <option value="CCK">Cocos Island</option>
  <option value ="COL">Colombia</option>
  <option value ="COM">Comoros</option>
  <option value="COG">Congo</option>
  <option value="COD">The Democratic Republic of the Congo</option>
  <option value ="COK">Cook Island</option>
  <option value ="CRI">Costa Rica</option>
  <option value="CIV">Côte d'Ivoire</option>
  
  <option value="HRV">Croatia</option>
  <option value ="CUB">Cuba</option>
  <option value ="CYP">Cyprus</option>
  <option value="CZE">Czech Republic</option>
  <option value="DNK">Denmark</option>
  <option value ="DJ">Djibouti</option>
  <option value ="DMA">Dominica</option>
  <option value="DOM">Dominican Republic</option>
  <option value="TMP">East Timor</option>
  <option value ="ECU">Ecuador</option>
  <option value ="EGY">Egypt</option>
  <option value="SLV">Salvador</option>
  <option value="GNQ">Equatorial Guinea</option>
  <option value ="ERI">Eritrea</option>
  <option value ="EST">Estonia</option>
  <option value="ETH">Ethiopia</option>
  <option value="FLK">Falkland Island</option>
  <option value ="FRO">Faroe IsLands</option>
  <option value ="FJI">Fiji</option>
  <option value="FIN">Finland</option>
  
  <option value="FRA">Frence</option>
  <option value ="GUF">French Guiana</option>
  <option value ="PYF">French Polynesia</option>
  <option value="ATF">French Southern Territories</option>
  <option value="GAB">Gabon</option>
  <option value ="GMB">Gambia</option>
  <option value ="GEO">Georgia</option>
  <option value="DEU">Germany</option>
  <option value="GHA">Ghana</option>
  <option value ="GIB">Gibraltar</option>
  <option value ="GRC">Greece</option>
  <option value="GRL">Greenland</option>
  <option value="GRD">Grenada</option>
  <option value ="GLP">Guadeloupe</option>
  <option value ="GUM">Guam</option>
  <option value="GTM">Guatemala</option>
  <option value="GIN">Guinea</option>
  <option value ="GNB">Guinea-Bissau</option>
  <option value ="GUY">Guyana</option>
  
  <option value="HTI">Haiti</option>
  <option value="HMD">Heard Island And Mcdonald Islands</option>
  <option value ="VAT">Holy See</option>
  <option value ="HND">Honduras</option>
  <option value="HKG">Hong Kong</option>
  <option value="HUN">Hungary</option>
  <option value ="ISL">IceLand</option>
  <option value ="IND">India</option>
  <option value="IDN">Indonesia</option>
  <option value="IRN">Islamic Republic of Iran</option>
  <option value ="IRQ">Iraq</option>
  <option value ="IRL">Ireland</option>
  <option value="ISR">Israel</option>
  <option value="ITA">Italy</option>
  <option value ="JAM">Jamaica</option>
  <option value="JPN">Japan</option>
  <option value="JOR">Jordan</option>
  <option value ="KAZ">Kazakstan</option>
  <option value ="KEN">Kenya</option>
  <option value="KIR">Kiribati</option>
  <option value="PRK">Democratic People's Republic of Korea</option>
  
  <option value ="KOR">Korea</option>
  <option value ="KWT">Kuwait</option>
  <option value="KGZ">Kyrgyzstan</option>
  <option value="LAO">Lao People's Democratic Republic</option>
  <option value ="LVA">Latvia</option>
  <option value ="LBN">Lebanon</option>
  <option value="LSO">Lesotho</option>
  <option value="LBR">Liberia</option>
  <option value ="LBY">Libyan Arab Jamahiriya</option>
  <option value ="LIE">Liechtenstein</option>
  <option value="LTU">Lithuania</option>
  <option value="LUX">Luxembourg</option>
  <option value ="MAC">Macau</option>
  <option value ="MKD">Macedonia</option>
  <option value="MDG">Madagascar</option>
  <option value="MWI">Malawi</option>
  <option value ="MYS">Malaysia</option>
  
  <option value ="MDV">Maldives</option>
  <option value="MLI">Mali</option>
  <option value="MLT">Malta</option>
  <option value ="MHL">Marshall Islands</option>
  <option value ="MTQ">Martinique</option>
  <option value="MRT">Opel</option>
  <option value="MUS">Mauritania</option>
  <option value ="MYT">Mayotte</option>
  <option value="MEX">Mexico</option>
  <option value="FSM">Federated States of Micronesia</option>
  <option value ="MDA">Republic of Moldova</option>
  <option value ="MCO">Monaco</option>
  <option value="MNG">Mongolia</option>
  <option value="MSR">Montserrat</option>
  <option value ="MAR">Morocco</option>
  <option value ="MOZ">Mozambique</option>
  <option value="MMR">Myanmar</option>
  <option value="NAM">Namibia</option>
  <option value ="NRU">Nauru</option>
  
  <option value ="NPL">Nepal</option>
  <option value="NLD">Netherlands</option>
  <option value="ANT">Netherlands Antilles</option>
  <option value ="NCL">New CaleDonia</option>
  <option value ="NZL">New Zealand</option>
  <option value="NIC">Nicaragua</option>
  <option value="NER">Niger</option>
  <option value ="NGA">Nigeria</option>
  <option value ="NIU">Niue</option>
  <option value="NFK">Norfolk Island</option>
  <option value="MNP">Northern Mariana Islands</option>
  <option value ="NOR">Norway</option>
  <option value ="OMN">Oman</option>
  <option value="PAK">Pakistan</option>
  <option value="PLW">Palau</option>
  <option value ="PSE">Occupied Palestinian Territory</option>
  <option value ="PAN">Panama</option>
  <option value="PNG">Papua New Guinea</option>
  <option value="PRY">Paraguay</option>
  
  <option value ="PER">Peru</option>
  <option value="PHL">Philippines</option>
  <option value="PCN">Pitcairn</option>
  <option value ="POL">Poland</option>
  <option value ="PRT">Portugal</option>
  <option value="PRI">Puerto Rico</option>
  <option value="QAT">Qatar</option>
  <option value ="REU">Reunion</option>
  <option value ="ROM">Romania</option>
  <option value="RUS">Russian Federation</option>
  <option value="RWA">Rwanda</option>
  <option value ="SHN">Saint Helena</option>
  <option value ="KNA">Saint Kitts And Nevis</option>
  <option value="LCA">Saint Lucia</option>
  <option value="SPM">Saint Pierre And Miqueln</option>
  <option value ="VCT">Saint Vincent And The Grenadines</option>
  <option value ="WSM">Samoa</option>
  <option value="SMR">San Marino</option>
  
  <option value="STP">São Tomé and Príncipe</option>
  <option value ="SAU">Saudi Arabia</option>
  <option value ="SEN">Senegal</option>
  <option value="SYC">Seychelles</option>
  <option value="SLE">Sierra Leone</option>
  <option value ="SGP">Singapore</option>
  <option value ="SVK">Slovakia</option>
  <option value="SVN">Slovenia</option>
  <option value="SLB">Colomon Islands</option>
  <option value ="SOM">Somalia</option>
  <option value ="ZAF">South Africa</option>
  <option value="SGS">South GeorGia And The South Sandwich Islands</option>
  <option value="ESP">Spain</option>
  <option value="LKA">Sri Lanka</option>
  <option value="SDN">Sudan</option>
  <option value ="SUR">Suriname</option>
  <option value ="SJM">Svalbard And Jan Mayen</option>
   
  <option value="SWZ">Swaziland</option>
  <option value="SWE">Sweden</option>
  <option value ="CHE">Switzerland</option>
  <option value ="SYR">Syrian Arab Republic</option>
  <option value="TJK">Tajikistan</option>
  <option value ="TZA">United Republic of Tanzania</option>
  <option value ="THA">Thailand</option>
  <option value="TGO">Togo</option>
  <option value="TKL">Tokelau</option>
  <option value ="TON">Tonga</option>
  <option value="TTO">Trinidad and Tobago</option>
  <option value="TUN">Tunisia</option>
  <option value ="TUR">Turkey</option>
  <option value ="TKM">Turkmenistan</option>
  <option value="TCA">Turks And Caicos Islands</option>
  <option value="TUV">Tuvalu</option>
  <option value ="UGA">Uganda</option>
  <option value ="UKR">Ukraine</option>
  
  <option value="ARE">Unitad Arab Emirates</option>
  <option value="GBR">United Kingdom</option>
  <option value ="USA">United States</option>
  <option value ="UMI">Ubited States Minor Outlying Islands</option>
  <option value="URY">Uruguay</option>
  <option value="UZB">Uzbekistan</option>
  <option value ="VUT">Vanuatu</option>
  <option value ="VAT">Vatican City State See Holy See</option>  
  <option value ="VEN">Venezuela</option>
  <option value="VNM">Viet Nam</option>
  <option value="VGB">British Virgin Islands</option>
  <option value ="VIR">Virgin Islands of the United States</option>
  <option value ="WLF">Wallis And Futuna</option>
  <option value="ESH">Western Sahara</option>
  <option value="YEM">Yemen</option>
  <option value ="YUG">Yugoslavia</option>
  
  <option value ="ZMB">Zambia</option>
  <option value="ZWE">Zimbabwe</option>
                  
                
                </select>
			  <div id=countrylist class="test"></div> 
			</td>
          </tr>
		  <tr id ="Ch1" align='left' style="display: none;">
            <td style='width:250px';>請輸入客戶公司名稱(中文)<font color='red'>*</font></td>
            <td><input type='text' name='clientCh' pattern="[\u4e00-\u9fa5]{2,16}" title="格式不正確，請輸入中文" placeholder='請輸入2~16位中文字' /></td>
          </tr>
          <tr id ="En1" align='left' style="display: none;">
			<td style='width:250px';>請輸入客戶公司名稱(英文)</td>
            <td><input type='text' name='clientEn' pattern="[A-Za-z]{2,50}" title="格式不正確，請輸入2~50位英文" placeholder='請輸入2~50位英文字'/></td>
		  </tr>
		  <tr id ="Tax" align='left' style="display: none;">
			<td style='width:250px';>請輸入客戶公司統一編號<font color='red'>*</font></td>
            <td><input type='text' name='Taxid'/></td>
		  </tr>
          <tr id ="Ch2" align='left' style="display: none;">
            <td style='width:250px';>請輸入客戶公司名稱(中文)</td>
            <td><input type='text' name='clientChh' pattern="[\u4e00-\u9fa5]{2,16}" title="格式不正確，請輸入中文" placeholder='請輸入2~16位中文字' /></td>
          </tr>
          <tr id ="En2" align='left' style="display: none;">
            <td style='width:250px';>請輸入客戶公司名稱(英文)<font color='red'>*</font></td>
            <td><input type='text' name='clientEnn'pattern="[A-Za-z]{2,50}" title="格式不正確，請輸入2~50位英文"  placeholder='請輸入2~50位英文字'/></td>
         </tr>
  
		  <tr align="left">
		    <td style="width:250px";>請輸入客戶公司所在城市<font color="red">*</font></td>
            <td><input type="text" name="clientcity" pattern="[\u4e00-\u9fa5\A-Za-z]{2,30}" title="格式不正確，請輸入2~30位中文或英文" placeholder="請輸入2~30位中文或英文字" /></td>
          </tr>
		  <tr align="left">
		    <td style="width:250px";>請輸入客戶公司地址<font color="red">*</font></td>
            <td><input type="text" name="clientsdresss" pattern="[\u4e00-\u9fa5\A-Za-z]{2,25}" title="格式不正確，請輸入2~25位中文或2~50位英文字" placeholder="請輸入2~25位中文或2~50位英文字" /></td>
          </tr>
	    </table><br><br>
	    <input type="submit" name="button" value="確認" />
	  </form>
  </div>
 
</body>
</html>
