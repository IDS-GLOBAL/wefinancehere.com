TheMath1 = new Array
TheMath1[0] = 10
TheMath1[1] = 9
TheMath1[2] = 8
TheMath1[3] = 7
TheMath1[4] = 6



TheMath2 = new Array
TheMath2[0] = 50
TheMath2[1] = 45
TheMath2[2] = 40
TheMath2[3] = 35
TheMath2[4] = 30





MatrixMinimumAmt = new Array
MatrixMinimumAmt[0] = tryprice
MatrixMinimumAmt[1] = 37000
MatrixMinimumAmt[2] = 27000
MatrixMinimumAmt[3] = 27000
MatrixMinimumAmt[4] = 17000





VariableA=10
VariableB=50
GradePaper=0







function dealMatrixChanged(creditForm) {
	l1 = creditForm.length
	for (i=0;i<creditForm.Credit.length; i++) {
		if (creditForm.Credit[i].checked) {
			VariableA = TheMath1[i]
			VariableB = TheMath2[i]
			GradePaper = i
		}
	}
	IncomeChanged(creditForm)
	return
}
function IsNum(strString)
{
		if (strString.value != "" && !strString.value.toString().match(/^[-]?\d*\.?\d*$/))
			return false;
		return true;
}

function IncomeChanged(creditForm) {

	var income = document.getElementById('income');
	var RentOrMortgage = document.getElementById('RentOrMortgage');
	var CreditCardPayments = document.getElementById('CreditCardPayments');
	var GarnishDeductions = document.getElementById('GarnishDeductions');
	var Deductions = document.getElementById('Deductions');
			

	if (!IsNum(income) || income.value < 0 )
	{
		window.alert("Required: Valid Total Monthly Income\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('income').focus();",1);
		return false;
	}

	if (RentOrMortgage.value != "" && !IsNum(RentOrMortgage) || RentOrMortgage.value < 0 )
	{
		window.alert("Optional: Valid Monthly Rent or Mortgage Payment\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('RentOrMortgage').focus();",1);
		return false;
	}

	if (CreditCardPayments.value != "" && !IsNum(CreditCardPayments) || CreditCardPayments.value < 0 )
	{
		window.alert("Optional: Valid Monthly Minimum Card Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('CreditCardPayments').focus();",1);
		return false;
	}

	if (GarnishDeductions.value != "" && !IsNum(GarnishDeductions) || GarnishDeductions.value < 0 )
	{
		window.alert("Optional: Valid Monthly Garnishment Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('GarnishDeductions').focus();",1);
		return false;
	}

	if (Deductions.value != "" && !IsNum(Deductions) || Deductions.value < 0 )
    {
		window.alert("Optional: Valid Monthly Loan Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('Deductions').focus();",1);
		return false;
	}


	maxLoanA = creditForm.income.value * VariableA
	halfIncome = creditForm.income.value / 2

	q2 = halfIncome - creditForm.RentOrMortgage.value
	q2 = q2 - creditForm.CreditCardPayments.value
	q2 = q2 - creditForm.GarnishDeductions.value
	q2 = q2 - creditForm.Deductions.value

	maxLoanB = q2 * VariableB

	if (maxLoanA < maxLoanB) {
		minLoan = maxLoanA
	}
	else {
		minLoan = maxLoanB
	}
	if (minLoan > MatrixMinimumAmt[GradePaper]){
		minLoan = MatrixMinimumAmt[GradePaper]
	}
	
	if (!isNaN(minLoan))
	{
		if (minLoan > 0)
		{
			minLoan = Math.floor(minLoan);
		}
		else
		{
			minLoan = 0;
		}
	}
	else
	{
		minLoan = 0;
    	return false;
	}

	td = document.getElementById("chosenloancell")	
	/* td.innerHTML = "<font size='28'><b>"+"$"+minLoan+"</b>"; */
	td.innerHTML = "<p id='power'>Your Purhcase Power! <br> <br> <span class='value'>"+"$ "+minLoan+"</span>"+"<input type='hidden' id='purchasepower' name='FIAmount'"+"value="+minLoan+" >";
	document.getElementById('prequalifyIncome').value = creditForm.income.value;
	document.getElementById('prequalifyMortgage').value = creditForm.RentOrMortgage.value;
	document.getElementById('prequalifyCreditCards').value = creditForm.CreditCardPayments.value;
	document.getElementById('prequalifyGarnishments').value = creditForm.GarnishDeductions.value;
	document.getElementById('prequalifyOtherLoans').value =  creditForm.Deductions.value;
	
	document.getElementById("prequalifyLoanAmt").value=minLoan;
	
	p = document.getElementById("purchasepower").value;
	
	for (i=0;i<creditForm.Credit.length; i++) {
		if (creditForm.Credit[i].checked) {
			document.getElementById('myCreditScoreAPR').value = creditForm.Credit[i].value;	
			document.getElementById("applilcant_v_cust_rate").value = creditForm.Credit[i].value;
		}
	}
	


	return true;
}

function popOutThisOffer(aff_id,sub_id,link_id,page_id,page_zone_id)
{
	host = 'http://www.wefinancehere.com/?url=';
	
	url = 'wefinanchere.com';	
	url = url + '&affid=' + aff_id;
	url = url + '&subid=' + sub_id;
	url = url + '&linkid=' + link_id;	
	url = url + '&page=' + page_id;
	url = url + '&zone=' + page_zone_id;
	window.open(host + url, '_new', 'width=980,height=800');
}

function popOutTradeOffer(aff_id,sub_id,link_id,page_id,page_zone_id)
{
	host = 'http://www.wefinancehere.com/';
	
	url = 'vehicles.php';	
	url = url + '&affid=' + aff_id;
	url = url + '&subid=' + sub_id;
	url = url + '&linkid=' + link_id;	
	url = url + '&page=' + page_id;
	url = url + '&zone=' + page_zone_id;
	window.open(host + url, '_new', 'width=980,height=800');
}

