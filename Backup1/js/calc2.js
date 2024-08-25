formulaA = new Array
formulaA[0] = 10
formulaA[1] = 9
formulaA[2] = 8
formulaA[3] = 7
formulaA[4] = 6

formulaB = new Array
formulaB[0] = 50
formulaB[1] = 45
formulaB[2] = 40
formulaB[3] = 35
formulaB[4] = 30

absMinLoan = new Array
absMinLoan[0] = 45000
absMinLoan[1] = 35000
absMinLoan[2] = 25000
absMinLoan[3] = 25000
absMinLoan[4] = 20000

factorA=10
factorB=50
crLevel=0

function creditTypeChanged(crForm) {
	l1 = crForm.length
	for (i=0;i<crForm.Credit.length; i++) {
		if (crForm.Credit[i].checked) {
			factorA = formulaA[i]
			factorB = formulaB[i]
			crLevel = i
		}
	}
	IncomeChanged(crForm)
	return
}
function IsNum(strString)
{
		if (strString.value != "" && !strString.value.toString().match(/^[-]?\d*\.?\d*$/))
			return false;
		return true;
}
function IncomeChanged(crForm) {

	var income = document.getElementById('income');
	var mortgage = document.getElementById('mortgage');
	var CCPayments = document.getElementById('CCPayments');
	var garnishments = document.getElementById('garnishments');
	var other = document.getElementById('other');
			

	if (!IsNum(income) || income.value < 0 )
	{
		window.alert("Required: Valid Total Monthly Income\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('income').focus();",1);
		return false;
	}

	if (mortgage.value != "" && !IsNum(mortgage) || mortgage.value < 0 )
	{
		window.alert("Optional: Valid Monthly Rent or Mortgage Payment\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('mortgage').focus();",1);
		return false;
	}

	if (CCPayments.value != "" && !IsNum(CCPayments) || CCPayments.value < 0 )
	{
		window.alert("Optional: Valid Monthly Minimum Card Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('CCPayments').focus();",1);
		return false;
	}

	if (garnishments.value != "" && !IsNum(garnishments) || garnishments.value < 0 )
	{
		window.alert("Optional: Valid Monthly Garnishment Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('garnishments').focus();",1);
		return false;
	}

	if (other.value != "" && !IsNum(other) || other.value < 0 )
    {
		window.alert("Optional: Valid Monthly Loan Payments\n - Only use numeric characters (0-9)");
		setTimeout("document.getElementById('other').focus();",1);
		return false;
	}


	maxLoanA = crForm.income.value * factorA
	halfIncome = crForm.income.value / 2

	q2 = halfIncome - crForm.mortgage.value
	q2 = q2 - crForm.CCPayments.value
	q2 = q2 - crForm.garnishments.value
	q2 = q2 - crForm.other.value

	maxLoanB = q2 * factorB

	if (maxLoanA < maxLoanB) {
		minLoan = maxLoanA
	}
	else {
		minLoan = maxLoanB
	}
	if (minLoan > absMinLoan[crLevel]){
		minLoan = absMinLoan[crLevel]
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
	td.innerHTML = "<font size='4'><b>"+"$"+minLoan+"</b>";
	document.getElementById('prequalifyIncome').value = crForm.income.value;
	document.getElementById('prequalifyMortgage').value = crForm.mortgage.value;
	document.getElementById('prequalifyCreditCards').value = crForm.CCPayments.value;
	document.getElementById('prequalifyGarnishments').value = crForm.garnishments.value;
	document.getElementById('prequalifyOtherLoans').value =  crForm.other.value;
	
	document.getElementById("prequalifyLoanAmt").value=minLoan;
	for (i=0;i<crForm.Credit.length; i++) {
		if (crForm.Credit[i].checked) {
			document.getElementById('prequalifyCreditProfile').value = crForm.Credit[i].value;
		}
	}

	return true;
}

function popOutCreditOffer(aff_id,sub_id,link_id,page_id,page_zone_id)
{
	//host = 'http://localhost/fundingway/';
	host = 'http://www.fundingway.com/';
	
	url = 'ace/click_thru.php?key=Xj84ITxfR1soS1JtNC13MWpMNXVHfCo=&offer=8&referrer=fundingway.com';
	url = url + '&affid=' + aff_id;
	url = url + '&subid=' + sub_id;
	url = url + '&linkid=' + link_id;	
	url = url + '&page=' + page_id;
	url = url + '&zone=' + page_zone_id;
	window.open(host + url, '_new', 'width=980,height=800');
}

