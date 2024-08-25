<!--
function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}



function showLive5Years(obj) {

noYears = obj.options[obj.selectedIndex].value;
//count = obj.options.length;
//alert(noYears);

if(!noYears){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'none';
}
if(noYears=='0 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'block';
}
if(noYears=='1 Year'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'block';
}
if(noYears=='2 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'block';
}
if(noYears=='3 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'block';
}

if(noYears=='4 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'block';
}
if(noYears=='5 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousHomeInformation').style.display = 'none';
}
if(noYears>'5 Years'){

	document.getElementById('PreviousHomeInformation').style.display = 'none';
}

}



function showWork5Years(obj) {

noYears = obj.options[obj.selectedIndex].value;
//count = obj.options.length;
//alert(noYears);

if(!noYears){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'none';
}
if(noYears=='0 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'block';
}
if(noYears=='1 Year'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'block';
}
if(noYears=='2 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'block';
}
if(noYears=='3 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'block';
}

if(noYears=='4 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'block';
}
if(noYears=='5 Years'){
	
	//alert(noYears);
	document.getElementById('PreviousEmployerShow').style.display = 'none';
}
if(noYears>'5 Years'){

	document.getElementById('PreviousEmployerShow').style.display = 'none';
}

}





function showpay() {
 if ((document.FormDealMatrix.applilcant_v_financed_amount.value == null || document.FormDealMatrix.applilcant_v_financed_amount.value.length == 0) ||
     (document.FormDealMatrix.applilcant_v_term_months.value == null || document.FormDealMatrix.applilcant_v_term_months.value.length == 0)
||
     (document.FormDealMatrix.applilcant_v_cust_rate.value == null || document.FormDealMatrix.applilcant_v_cust_rate.value.length == 0))
 { document.FormDealMatrix.applilcant_v_total_monthpmts_est.value = "Your Score Is Missing";
 }
 else
 {
 var princ = document.FormDealMatrix.applilcant_v_financed_amount.value;
 var term  = document.FormDealMatrix.applilcant_v_term_months.value;
 var intr   = document.FormDealMatrix.applilcant_v_cust_rate.value / 1200;
 //document.FormDealMatrix.applilcant_v_total_monthpmts_est.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
 document.FormDealMatrix.applilcant_v_total_monthpmts_est.value = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
 }

 //payment = principle * monthly interest/(1 - (1/(1+MonthlyInterest)*Months))

}

// -->