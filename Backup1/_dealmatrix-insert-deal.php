<?php

// This is to create a Deal Matrix Deal From Customer
// Using Insert Method




	deal_id	int(11)			No	None	auto_increment	 	 	 	 	 	 	
	deal_token	varchar(100)	latin1_swedish_ci		No	None		 	 	 	 	 	 	 
	deal_number	int(11)			No	None		 	 	 	 	 	 	
	deal_dealerID	int(11)			No	None		 	 	 	 	 	 	
	credit_app_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	vehicle_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	customer_id	int(11)			Yes	NULL		 	 	 	 	 	 	
	salesPerson1ID	int(11)			Yes	NULL		 	 	 	 	 	 	
	salesPerson1Name	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	salesPerson2ID	int(11)			Yes	NULL		 	 	 	 	 	 	
	salesPerson2Name	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	salesMgrID	int(11)			Yes	NULL		 	 	 	 	 	 	
	salesMgrName	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	financeMgrID	int(11)			Yes	NULL		 	 	 	 	 	 	
	financeMgrName	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vStockno	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vCondition	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vYear	int(11)			Yes	NULL		 	 	 	 	 	 	
	vMake	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vModel	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTrim	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vBodyType	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vColor	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vEngineCyls	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vVin	varchar(17)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vMileage	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderNm	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderAddr	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderAddr2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderCity	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderState	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vLeinHolderZip	int(11)			Yes	NULL		 	 	 	 	 	 	
	vLeinHolderLeinNo	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vLeinHolderPhnNo	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vInsurCompNm	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vInsurCompAddr	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vInsurCompAddr2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vInsurCompCity	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vInsurCompState	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vInsurCompZip	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	tradeACV	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	OA	varchar(25)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradeYr	int(11)			Yes	NULL		 	 	 	 	 	 	
	vTradeMk	varchar(25)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradeModel	varchar(25)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradeTrim	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeColor	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeVin	varchar(17)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradeMiles	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeAllow	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayOff	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeLicsfee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeDecal	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeStikNo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeOwner	varchar(50)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradeTagNo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeTagState	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeTitle	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeTagExprDate	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	leinHolderTradeSelct	varchar(100)	latin1_swedish_ci		Yes	NULL		 	 	 	 	 	 	 
	vTradePayoffCompany	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeLeinHldrAcctNo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyAddr	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyAddr2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeVerifiedBy	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyCity	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyState	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyZip	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffGoodUntil	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffPerDiem	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradePayoffCompanyPhoneno	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeOpenRO	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeTitleRemarks	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	vTradeRemarksAttached	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	receiptNo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	receiptNo2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	priceVehicle	text	latin1_swedish_ci		No	None		 	 	 				 
	nonTaxRebate	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxablePrice	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	downPayment	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	rebates	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateOne	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateOnedscrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateOneTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateTwo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateTwodscrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateTwoTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateThree	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateThreedscrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateThreeTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFour	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFourdscrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFourTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFive	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFivedscrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	reBateFiveTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	rebateToReduceSalesPrice	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	VSIFEE	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	loanProcessingFee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptionsTotal	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions1CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm1	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions1List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions1	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions1Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions1Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions2CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions2List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions2	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions2Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions2Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions3CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm3	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions3List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions3	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions3Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions3Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions4CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm4	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions4List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions4	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions4Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions4Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions5CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm5	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions5List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions5	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions5Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions5Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions6CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm6	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions6List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions6	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions6Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions6Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions7CodeID	int(11)			Yes	NULL		 	 	 	 	 	 	
	dealerOptionsNm7	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions7List	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions7	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions7Cost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dealerOptions7Tax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	insuranceCost	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	insurMonths	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	insurCreditlife	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	insurAccHealth	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extServicePlan	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcMonths	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcCompany	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcMiles	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcStartDate	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcContractNo	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcStartMiles	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcEndDate	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcPremium	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcdeduct	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	extSrvcEndMiles	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	cashDeposit	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	tradePayoff	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	COD	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	tradeAllowance	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	docServiceFee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	stateSalesTax	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	licsFee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	titleFee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	stateInspect	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	licsNtitlefee	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	stateTaxperc	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	stateTaxpercTotal	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxCountyperc	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxCountypercTotal	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxCityperc	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxCitypercTotal	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	taxState	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	warrantyPrice	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	monthlypymts	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	amountDDue	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	apr	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	firstpymt	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	term	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	msrp	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	dayResults	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	residualDollar	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	totalPayments	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	totalFinanceCharges	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	monthlyPymtd	text	latin1_swedish_ci		Yes	NULL		 	 	 				 
	deal_created_at	timestamp			No	CURRENT_TIMESTAMP		 	 	 	 	 	 	



?>