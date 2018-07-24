
goPage(1,5);
function goPage(pno, psize) {
	var itable = document.getElementById("table_result");
	var num = itable.rows.length;
	var totalPage = 0;
	
	if (num / pageSize > parseInt(num / pageSize)) {
		totalPage = parseInt(num / pageSize) + 1;
	} else {
		totalPage = parseInt(num / pageSize);
	}
	var currentPage = pno;
	var startRow = (currentPage - 1) * pageSize + 1;
	var endRow = currentPage * pageSize;
	endRow = (endRow > num) ? num : endRow;
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
		tempStr += "<a href=\"#\" onClick=\"goPage(" + (currentPage - 1) + "," + psize + ")\"><上一頁&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</a>"
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
            tempStr += "<a href=\"#\" onClick=\"goPage(" + (currentPage + 1) + "," + psize + ")\">下一頁>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</a>";
            for (var j = 1; j <= totalPage; j++) {
            }
        } else {
            tempStr += " 下一頁>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            for (var j = 1; j <= totalPage; j++) {
            }
        }
        document.getElementById("barcon").innerHTML = tempStr;
    }


