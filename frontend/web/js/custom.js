jQuery(window).scroll(function() {

	if (jQuery(this).scrollTop() > 100) {
		jQuery('span.top').fadeIn();
	} else {
		jQuery('span.top').fadeOut();
	}
});



jQuery(document).ready(function(){	
	jQuery( "#searchPopup" ).load( "/ajax/popup.ajax" );
	/*jQuery('#filter-products').click(function(){
			
		var price_from = jQuery('#min_price').val();
		var price_to = jQuery('#max_price').val();
		var inverter = jQuery('#inverter').val();
		
		var brands = jQuery("input[name='brand']:checked").map(function() {
				return parseInt( $(this).val() );
			}).get();		
					
		if ( jQuery.isNumeric( price_from ) ) {
			price_from	= parseInt(price_from);			
		}else{
			price_from = 0; 
		}
		
		if ( jQuery.isNumeric( price_to ) ) {
			price_to = parseInt(price_to);			
		}else{
			price_to = 30000000; 
		}
				
		jQuery('#kod-pr-catalog .new-pr').hide().filter(function()	{
			var brand = parseInt($(this).data('brand'));
			
			if ( jQuery('#inverter').is(":checked") && ( brands.length <= 0 ) && ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) ) {	
				
				return ( ( jQuery(this).data('inverter') == '1' ) && ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) );
			
			} else if ( jQuery('#inverter').is(":checked") && ( brands.length > 0  ) && ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) ) {
				
				return ( ( jQuery.inArray( brand, brands ) > -1 ) && ( jQuery(this).data('inverter') == '1' ) && ( $(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) );		
			
			} else if ( !jQuery('#inverter').is(":checked") && ( brands.length > 0 ) && ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) ) {
				
				return ( ( jQuery.inArray( brand, brands ) > -1 ) && ( $(this).data('price') >= price_from && $(this).data('price') <= price_to ) );		
			
			} else if ( !jQuery('#inverter').is(":checked") && ( brands.length <= 0 ) && ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) ) {
				
				return  ( jQuery(this).data('price') >= price_from && jQuery(this).data('price') <= price_to ) ;		
			
			} else if ( !jQuery('#inverter').is(":checked") && ( brands.length <= 0 ) && ( jQuery(this).data('price') == 0 && jQuery(this).data('price') == 30000000 ) ) {
				return  false;		
			} 		
			
		}).show();	
		//$("#kod-pr-catalog ul").quickPagination({pageSize:"3"});
	});*/

	
	$('#sort').change(function(){
		var order = jQuery('#sort').val();
		var wrapper = jQuery('#kod-pr-catalog ul');

		if ( order == 'new' || order == 'act' || order == "hit" ) {
			
			jQuery('#kod-pr-catalog ul .new-pr').hide().filter(function()	{					
				return ( jQuery(this).data(order) == '1' );					
			}).show();
			
		}else if ( order == 'Desc' ){
			var ascending = true;
			var sorted = $('.new-pr').sort(function(a,b){
				return (ascending ==
			   (convertToNumber($(a).find('.price').html()) < 
				convertToNumber($(b).find('.price').html()))) ? 1 : -1;
				});
			wrapper.html(sorted);				
		}else if ( order == 'Asc' ){
			var ascending = false;
			var sorted = $('.new-pr').sort(function(a,b){
				return (ascending ==
			   (convertToNumber($(a).find('.price').html()) < 
				convertToNumber($(b).find('.price').html()))) ? 1 : -1;
				});
			wrapper.html(sorted);				
		}		
		//$("#kod-pr-catalog ul").quickPagination({pageSize:"3"});
	});
	
	var convertToNumber = function(value){
		return parseFloat(value.replace('$',''));
	}
	
	//if ( $("#kod-pr-catalog ul").length > 0 ) {
		//$("#kod-pr-catalog ul").quickPagination({pageSize:"3"});
	//}
	//
	//
	// jQuery().piroBox_ext({
	// 	piro_speed : 700,
	// 	bg_alpha : 0.5,
	// 	piro_scroll : true // pirobox always positioned at the center of the page
	// });
	
	// jQuery(".phone-mask").inputmask("8(999)999-99-99");
	
	jQuery('#open_search').click(function(){
		jQuery('#myModal').bPopup({
			easing: 'easeOutBack', //uses jQuery easing plugin
			speed: 450,
			transition: 'slideDown',
		});
	});
	
	// jQuery( "#price-range" ).slider({
	// 	range: true,
	// 	min: 0,
	// 	max: 30000000,
	// 	values: [ 0, 30000000 ],
	// 	slide: function( event, ui ) {
	// 		jQuery( "#min_price" ).val( ui.values[0] );
	// 		jQuery( "#max_price" ).val( ui.values[1] );
	// 	},
	// 	change: function( event, ui ) {
	// 		 ui.values[0],
	// 		 ui.values[1]
	// 	}
	// });
	//
	// jQuery( "#price-range-pop" ).slider({
	// 	range: true,
	// 	min: 0,
	// 	max: 30000000,
	// 	values: [ 0, 30000000 ],
	// 	slide: function( event, ui ) {
	// 		jQuery( "#min_price_pop" ).val( ui.values[0] );
	// 		jQuery( "#max_price_pop" ).val( ui.values[1] );
	// 	},
	// 	change: function( event, ui ) {
	// 		 ui.values[0],
	// 		 ui.values[1]
	// 	}
	// });
		
	jQuery('#send_zakaz').click(function(){
		var name = jQuery('#zakaz_name').val();
		var email = jQuery('#zakaz_email').val();
		var phone = jQuery('#zakaz_phone').val();
		var zakaz_place_type = jQuery('input:radio[name=zakaz_place_type]:checked').val();	
		var place_area = jQuery("#place_area").val();
		var height = jQuery("#height").val();
		var tool_class = jQuery('input:radio[name=tool_class]:checked').val();
		var zakaz_comm = jQuery("#zakaz_comm").val();

		if(phone==""){
			jQuery('#zakaz_phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#zakaz_phone').css('border','1px solid #ccc');
		}
		jQuery.ajax({
			url :'/ajax/zayavka_na_podbor_kondicionera.ajax',
			type:'POST',
			data:{
				name:name,
				email:email,
				phone:phone,
				zakaz_place_type:zakaz_place_type,
				place_area:place_area,
				height:height,
				tool_class:tool_class,
				zakaz_comm:zakaz_comm
			},
			success:function(data){
				jQuery('#zakaz_form input,textarea').val("");
				jQuery('.success-mess p').html(data);
				jQuery('.success-mess').fadeIn();	
				setTimeout(function(){
					jQuery('.success-mess').fadeOut();
				}, 2500);
			},
			error: function(err){
				jQuery('.errorText').fadeIn();
			}
		});
	});	
	
	jQuery('#send_call').click(function(){
		var phone = jQuery('#recipient-phone').val();	
		if(phone==""){
			jQuery('#recipient-phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#recipient-phone').css('border','1px solid #04569b')
		}
		jQuery.ajax({
			url :'/ajax/callback.ajax',
			type:'POST',
			data:{
				phone:phone
			},
			success:function(data){
				jQuery('#recipient-phone').val("");
				jQuery('#call-form .success-mess-cont p').html(data);
				jQuery('#call-form .success-mess').fadeIn();	
				jQuery('#call-form .success-mess-cont').fadeIn();	
				setTimeout(function(){
					jQuery('.success-mess-cont').fadeOut();
				}, 2500);
			},
			error: function(err){
				console.log(err);
			}
		});
	});
	
	jQuery('#manager-call').click(function(){
		var name = jQuery('#manager-name').val();
		var phone = jQuery('#manager-phone').val();	
		if(phone==""){
			jQuery('#manager-phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#manager-phone').css('border','1px solid #04569b')
		}
		
		if(name==""){
			jQuery('#manager-name').css('border','1px solid red');
			return false;
		}else{
			jQuery('#manager-name').css('border','1px solid #04569b')
		}
		
		jQuery.ajax({
			url :'/ajax/manager_call.ajax',
			type:'POST',
			data:{
				name:name,
				phone:phone
			},
			success:function(data){
				jQuery('#manager-name').val("");
				jQuery('#manager-phone').val("");
				jQuery('.success-mess-order p').html(data);
				jQuery('.success-mess-order').fadeIn();	
				setTimeout(function(){
					jQuery('.success-mess-order').fadeOut();
				}, 2500);				
			},
			error: function(err){
				console.log(err);
			}
		});
	});
	
	jQuery('#vizov_mastera,#zakaz_remont').click(function(){
		var name = jQuery('#zayavka_name').val();
		var model = jQuery('#zayavka_model').val();
		var phone = jQuery('#vizov_phone').val();
		var more = jQuery(this).parent().find('textarea').val();
		var mess = jQuery(this).attr('id');
		if(phone==""){
			jQuery('#vizov_phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#vizov_phone').css('border','1px solid #ccc');
		}
		jQuery.ajax({
			url :'/ajax/vizov_mastera.ajax',
			type:'POST',
			data:{
				name:name,
				model:model,
				phone:phone,
				more:more,
				mess:mess
			},
			success:function(data){
				jQuery('#zayavka_form input,textarea').val("");
				jQuery('.success-mess p').html(data);
				jQuery('.success-mess').fadeIn();		
				setTimeout(function(){
					jQuery('.success-mess').fadeOut();
				}, 2500);
			},
			error: function(err){
				jQuery('.errorText').fadeIn();
			}
		});
	});
		
	jQuery('#send_zayavka').click(function(){
		var name = jQuery('#zayavka_name').val();
		var model = jQuery('#zayavka_model').val();
		var phone = jQuery('#zayavka_phone').val();	
		if(phone==""){
			jQuery('#zayavka_phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#zayavka_phone').css('border','1px solid #ccc');
		}
		jQuery.ajax({
			url :'/ajax/zayavka.ajax',
			type:'POST',
			data:{
				name:name,
				phone:phone,
				model:model
			},
			success:function(data){
				jQuery('#zayavka_model').val("");
				jQuery('#zayavka_name').val("");
				jQuery('#zayavka_phone').val("");
				jQuery('.success-mess p').html(data);
				jQuery('.success-mess').fadeIn();	
				setTimeout(function(){
					jQuery('.success-mess').fadeOut();
				}, 2500);
			},
			error: function(err){
				jQuery('.errorText').fadeIn();
			}
		});
	});	
		
	jQuery('#send-svyaz').click(function(){
		var name = jQuery('#svyaz-name').val();
		var phone = jQuery('#svyaz-phone').val();
		var message = jQuery('#svyaz-message').val();	
		if(phone==""){
			jQuery('#svyaz-phone').css('border','1px solid red');
			return false;
		}else{
			jQuery('#svyaz-phone').css('border','1px solid #ccc');
		}
		jQuery.ajax({
			url :'/ajax/svyaz.ajax',
			type:'POST',
			data:{
				name:name,
				phone:phone,
				message:message
			},
			success:function(data){
				jQuery('#svyaz-name').val("");
				jQuery('#svyaz-phone').val("");
				jQuery('#svyaz-message').val("");
				jQuery('#svyaz-form .success-mess-cont p').html(data);
				jQuery('#svyaz-form .success-mess-cont').fadeIn();	
				jQuery('#svyaz-form .alert-msg').fadeIn();
				setTimeout(function(){
					jQuery('.success-mess-cont,.alert-msg').fadeOut();
				}, 2500);
			},
			error: function(err){
				jQuery('.errorText').fadeIn();
			}
		});
	});		
		
	jQuery("#mail_us").click(function(e){
		e.preventDefault();
		jQuery("#contact_div").slideToggle(function(){jQuery('.field input,.field textarea').css('border','1px solid #04569b').val("");});
	});	
	
	jQuery("#send_contact").click(function(){

		var name=jQuery("#contact_fname").val();
		var email=jQuery("#contact_email").val();
		var message=jQuery("#contact_message").val();
		var phone=jQuery("#contact_phone").val();  

		var isValid = true;
		var pattern = /^([0-9\(\)\/\+ \-]*)$/;
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(jQuery.trim(name)==null || jQuery.trim(name)=="" || jQuery.trim(name).length==0){
			isValid = false;
			jQuery("#error_fname input").css('border','1px solid red');
			//jQuery('#error_fname').effect('shake', {times: 4, distance: 10}, 800);
		}else{
			jQuery("#error_fname input").css('border','1px solid #04569b');
		}
		if(jQuery.trim(message) == null || jQuery.trim(message)=="" || jQuery.trim(message).length==0){
			isValid = false;
			jQuery("#error_message textarea").css('border','1px solid red');
			//jQuery('#error_message').effect('shake', {times: 4, distance: 10}, 800);
		}else{
			jQuery("#error_message textarea").css('border','1px solid #04569b');
		}
		if(jQuery.trim(phone)==null || jQuery.trim(phone)=="" || jQuery.trim(phone).length==0 ){
			isValid = false;
			jQuery("#error_phone input").css('border','1px solid red');
			//jQuery('#error_phone').effect('shake', {times: 4, distance: 10}, 800);
		}else{
			jQuery("#error_phone input").css('border','1px solid #04569b');
		}
		if(jQuery.trim(email)==null || jQuery.trim(email)=="" || jQuery.trim(email).length==0 || !regex.test(email)){
			isValid = false;
			jQuery("#error_mail input").css('border','1px solid red');
			//jQuery('#error_mail').effect('shake', {times: 4, distance: 10}, 800);
		}else{
			jQuery("#error_mail input").css('border','1px solid #04569b');
		}
  
		if(isValid){
			jQuery.ajax({
				url :'/ajax/contact_us.ajax',
				type:'POST',
				data:{
					email:email,
					phone:phone,
					name:name,
					message:message,
				},
				success:function(data){
					console.log(data);
					jQuery('.field input,.field textarea').val("");
					jQuery('.field textarea').val("");
					jQuery('.success-mess p').html(data);
					jQuery('.success-mess').fadeIn();	
					setTimeout(function(){
						jQuery('.success-mess').fadeOut();
					}, 2500);
				},
				error: function(err){
					console.log(err);
				}
			});
		}else{
			return false;
		}
	});
	
	jQuery('.alert-msg .close').click(function(e){
		e.preventDefault();
		jQuery(this).parent().fadeOut(); 
	})
	
	jQuery('span.top').click(function(e) {
        jQuery('html,body').animate({
            scrollTop: 0
        },
        'slow');
    });
	
	if ( jQuery('.category-slider').length > 0 ){
		jQuery('.category-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 210,
			itemMargin: 0,
			minItems: 3,
			maxItems: 4,
			controlNav:false,
			slideshow:false
		});
	}
	
	// if ( jQuery('.article').length > 0 ){
	// 	jQuery(".article").mCustomScrollbar({
	// 		scrollButtons:{
	// 			enable:true
	// 		},
	// 	});
	// }
	
	if ( jQuery('.brand-slider').length > 0 ){
		jQuery('.brand-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 150,
			itemMargin: 0,
			minItems: 4,
			maxItems: 5,
			controlNav:false,
			slideshow:false
		});
	}
	
	if ( jQuery('.sertificate-slider').length > 0 ){
		jQuery('.sertificate-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 250,
			itemMargin: 0,
			minItems: 4,
			maxItems: 4,
			controlNav:false,
			slideshow:false
		});
	}
	
	if ( jQuery('.accessories').length > 0 ){
		jQuery('.accessories').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 300,
			itemMargin: 0,
			minItems: 3,
			maxItems: 4,
			directionNav:false,
			slideshow:false
		});
	}
	
	if ( jQuery('.top-slider').length > 0 ){
		jQuery('.top-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			directionNav:false
		});
	}	
	
	if ( jQuery('.page-content').length > 0 ){
		jQuery('html, body').animate({
			scrollTop: jQuery(".page-content").offset().top
		}, 2000);
	}
})
