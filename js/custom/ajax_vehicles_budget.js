// JavaScript Document
$(document).ready(function(){



	var budget_afford = $('input#budget_afford').val();
	var gross_monthlyincome = $('input#gross_monthlyincome').val();
	var cust_creditapr = $('input#cust_creditapr').val();
	var cust_creditapr_txt = $('input#cust_creditapr_txt').val();
	

	var wfhuserperm_token = $('input#wfhcookiesesid').val();
	var wfhuser_id = $('input#wfhuser_id').val();

	var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
	var newwfhuser_approval_id = $('input#wfhuser_approval_id').val();
	
	var wfhuserperm_approval_fname = $('input#approval_fname').val();
	var wfhuserperm_approval_lname = $('input#approval_lname').val();
	var wfhuserperm_approval_email = $('input#approval_email').val();
	var wfhuserperm_approval_phone = $('input#approval_phoneno').val();
	var wfhuserperm_fbid = $('input#access_id').val();
	var wfhuserperm_timezone = $('input#wfhuserperm_timezone').val();
	
	var risk_factor_lvl = $('input#risk_factor_lvl').val();

	// $('div#bottom_floater').show();





	$(document).on('click', 'a.vsavemyv', function(){
			
			var vid = $(this).attr('id');
			
			var vdescript_txt = $(this).attr('title');
			
			
			$("ul#vehicle_likes_float").append('<li><a class="page-scroll qvview" id="'+ vid +'" href="#vlisting_result">' + vdescript_txt + '</a></li>');
			
			$("ul#vehicle_likes_float").append('<li role="separator" class="divider"></li>');
			
			$('li#vehicle_likes_bar').show(200);
			
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			var risk_factor_lvl = $('input#risk_factor_lvl').val();

			
			$.post('script_likes_avehicle.php?v='+vid, {
						vid: vid,
						vdescript_txt: vdescript_txt,
						budget_afford: budget_afford,
						gross_monthlyincome: gross_monthlyincome,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						wfhuserperm_token: wfhuserperm_token,
						wfhuser_id: wfhuser_id,
						wfhuser_approval_id: wfhuser_approval_id,
						wfhuserperm_approval_fname: wfhuserperm_approval_fname,
						wfhuserperm_approval_lname: wfhuserperm_approval_lname,
						wfhuserperm_approval_email: wfhuserperm_approval_email,
						wfhuserperm_approval_phone:  wfhuserperm_approval_phone,
						wfhuserperm_fbid: wfhuserperm_fbid,
						risk_factor_lvl: risk_factor_lvl,
						wfhuserperm_timezone: wfhuserperm_timezone
			}, function(data){
				//console.log('likes a vehicle: '+data);
			});
			
			
	});

	$(document).on('click', 'a.vlistdtls', function(){
			
			var vid = $(this).attr('id');
			$("div#vlisting_result").html('');
			
			var vdescript_txt = $(this).attr('title');
			
			$("ul#vehicle_likes_float").append('<li><a class="page-scroll qvview" id="'+ vid +'" href="#vlisting_result">' + vdescript_txt + '</a></li>');
			
			$("ul#vehicle_likes_float").append('<li role="separator" class="divider"></li>');
			
			$('div#vdlisting_results').hide(300);
			$('li#vehicle_likes_bar').show();
			
			var vurl = 'vehicle.php?v='+vid;
			
			$("div#vlisting_result").load('' + vurl + " #vehicle_section", function() {
				$.getScript("js/custom/ajax_vehiclecontrols.js");
				$.getScript("js/custom/custom.cbudget.js");
				//$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_a0-ONX1BHPXNc9LZxyFmYE370ujrRY&language=eng");

			}).show();
			
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			console.log('wfhuser_approval_id: '+wfhuser_approval_id);
			var risk_factor_lvl = $('input#risk_factor_lvl').val();
			console.log('risk_factor_lvl: '+risk_factor_lvl);
			$.post('script_engage_invehicle.php?v='+vid, {
						vid: vid,
						vdescript_txt: vdescript_txt,
						budget_afford: budget_afford,
						gross_monthlyincome: gross_monthlyincome,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						wfhuserperm_token: wfhuserperm_token,
						wfhuser_id: wfhuser_id,
						wfhuser_approval_id: wfhuser_approval_id,
						wfhuserperm_approval_fname: wfhuserperm_approval_fname,
						wfhuserperm_approval_lname: wfhuserperm_approval_lname,
						wfhuserperm_approval_email: wfhuserperm_approval_email,
						wfhuserperm_approval_phone:  wfhuserperm_approval_phone,
						wfhuserperm_fbid: wfhuserperm_fbid,
						risk_factor_lvl: risk_factor_lvl,
						wfhuserperm_timezone: wfhuserperm_timezone
			}, function(data){
				console.log('viewing details: '+data);
				
			});

			
	});

	$(document).on('click', 'a.vlistdtls_finance', function(){
			
			
			$('div#gather_budget').hide();
			
			var vid = $(this).attr('id');
			$("div#vlisting_result").html('');
			
			var vdescript_txt = $(this).attr('title');
			
			$("ul#vehicle_likes_float").append('<li><a class="page-scroll qvview" id="'+ vid +'" href="#vlisting_result">' + vdescript_txt + '</a></li>');
			
			$("ul#vehicle_likes_float").append('<li role="separator" class="divider"></li>');
			
			$('div#vdlisting_results').hide(300);
			$('li#vehicle_likes_bar').show();
			
			var vurl = 'vehicle.php?v='+vid+'&ftoday=Y';
			
			$("div#vlisting_result").load('' + vurl + " #vehicle_section", function() {
				$.getScript("js/custom/ajax_vehiclecontrols.js");
				$.getScript("js/custom/custom.cbudget.js");
			}).show();
			
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			console.log('wfhuser_approval_id: '+wfhuser_approval_id);
			var risk_factor_lvl = $('input#risk_factor_lvl').val();
			console.log('risk_factor_lvl: '+risk_factor_lvl);

			$.post('script_financethisvehicle.php?v='+vid, {
						vid: vid,
						vdescript_txt: vdescript_txt,
						budget_afford: budget_afford,
						gross_monthlyincome: gross_monthlyincome,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						wfhuserperm_token: wfhuserperm_token,
						wfhuser_id: wfhuser_id,
						wfhuser_approval_id: wfhuser_approval_id,
						wfhuserperm_approval_fname: wfhuserperm_approval_fname,
						wfhuserperm_approval_lname: wfhuserperm_approval_lname,
						wfhuserperm_approval_email: wfhuserperm_approval_email,
						wfhuserperm_approval_phone:  wfhuserperm_approval_phone,
						wfhuserperm_fbid: wfhuserperm_fbid,
						risk_factor_lvl: risk_factor_lvl,
						wfhuserperm_timezone: wfhuserperm_timezone
			}, function(data){
				console.log('attempting to finance: '+data);
				$('#vehicle_controls').html(data);
				
			});

			
	});

	$(document).on('click', 'a.page-scroll.qvview', function(){
			
			console.log('clicked bottom vehicle');
			
			var vid = $(this).attr("id");
			var vdescript_txt = $(this).attr('title');

			$('div#vdlisting_results').hide();
			
			var vurl = 'vehicle.php?v='+vid;
			//console.log('vurl: '+vurl);

			$("div#vlisting_result").load('' + vurl + " #vehicle_section", function() {
				$.getScript("js/custom/ajax_vehiclecontrols.js");
				$.getScript("js/custom/custom.cbudget.js");
			}).show();
			
			console.log('qvview posting');
			var wfhuser_approval_id = $('input#wfhuser_approval_id').val();
			console.log('wfhuser_approval_id: '+wfhuser_approval_id);
			var risk_factor_lvl = $('input#risk_factor_lvl').val();
			console.log('risk_factor_lvl: '+risk_factor_lvl);

			$.post('script_tag_viewtoapproval.php', {
						vid: vid,
						vdescript_txt: vdescript_txt,
						budget_afford: budget_afford,
						gross_monthlyincome: gross_monthlyincome,
						cust_creditapr: cust_creditapr,
						cust_creditapr_txt: cust_creditapr_txt,
						wfhuserperm_token: wfhuserperm_token,
						wfhuser_id: wfhuser_id,
						wfhuser_approval_id: wfhuser_approval_id,
						wfhuserperm_approval_fname: wfhuserperm_approval_fname,
						wfhuserperm_approval_lname: wfhuserperm_approval_lname,
						wfhuserperm_approval_email: wfhuserperm_approval_email,
						wfhuserperm_approval_phone:  wfhuserperm_approval_phone,
						wfhuserperm_fbid: wfhuserperm_fbid,
						risk_factor_lvl: risk_factor_lvl,
						wfhuserperm_timezone: wfhuserperm_timezone
			}, function(data){
				console.log('qvview view: '+data);
			});

	
	});


});

