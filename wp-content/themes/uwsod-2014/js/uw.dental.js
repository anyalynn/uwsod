function Mem1(event){
$("#ItemCost1").val("120.00");
$("#userMemType").val("Regular Member");
}
function Mem2(event){
$("#ItemCost1").val("50.00");
$("#userMemType").val("New Member");
}
function Mem3(event){
$("#ItemCost1").val("120.00");
$("#userMemType").val("Associate Member");
}

function Ann(event){
$("#ItemQty2").val(event);
}

function formVal()
{
	$("#ItemDesc1").val($("#userMemType").val() + "-" + $("#userAlumMemName").val() + "-" + $("#userGradYr").val());
	$("#BillEmail").val($("#userEmail").val());
	var bool=true;
	if(document.getElementById("userMemType").value === "")
		{
			inval.style.display = 'block';
			mtypetext.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userAlumMemName").value === "")
		{
			inval.style.display = 'block';
			almemtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userEmail").value === "")
		{
			inval.style.display = 'block';
			emtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userGradYr").value === "")
		{
			inval.style.display = 'block';
			gradyrtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("ItemQty2").value === "")
		{
			inval.style.display = 'block';
			annchgtxt.style.fontWeight = 'bold';
			bool=false;
		}
	return bool;
}
