
var ajax_url = ajax_object.ajax_url;
var doc_root = ajax_object.doc_root;

function searchTrains(){

	var data = {};
	var form_data = jQuery("#train_search_form").serialize();

	loadData("searchTrains&"+form_data,data,ajax_url,function(res){
		jQuery("#ajax_data").html(res);
	});

};


function bookNow(train_id){

	jQuery("#train_search_form").slideUp();

	var data = {};
	data.train_id = train_id;

	loadData("bookNow",data,ajax_url,function(res){
		jQuery("#ajax_data").html(res);

		drawSeats(1);

	});

}

function drawSeats(id){

	var data = {};
	data.id = id;

	loadData("drawSeats",data,ajax_url,function(res){
		jQuery("#seat_ajax").html(res);

		jQuery(".seat_checkbox").change(function() {

			if(jQuery(".seat_checkbox:checked").length>5){

				jQuery(this).prop('checked', false);

			}else{

				if(this.checked) {
		    	
		    	}

			}

		    
		});


	});

}

function proceedToPayments(){

	if(jQuery(".seat_checkbox:checked").length>0){

		var data = {};
		var form_data = jQuery("#seat_arrangement").serialize();
		form_data += "&"+jQuery("#train_search_form").serialize();

		loadData("proceedToPayments&"+form_data,data,ajax_url,function(res){

			jQuery("#ajax_data").html(res);

		});

	}else{
		alert("Please Select atleast 1 Seat");
	}

}

function payNow(){

	var data = {};
	var form_data = jQuery("#payment_method_form").serialize();
	form_data += "&"+jQuery("#train_search_form").serialize();

	loadData("payNow&"+form_data,data,ajax_url,function(res){
		jQuery("#ajax_data").html(res);

		drawSeats(1);

	});

}


function loadData(action,extra_data,path,callback){

	var append_url = "";

	if(extra_data!=null){

		jQuery.each(extra_data, function(index, value) {
		 	append_url += "&"+index+"="+encodeURIComponent(value);
		});
		
	}

	append_url += "&doc_root="+encodeURIComponent(doc_root);


					jQuery.ajax({
					   type: "POST",  
					   url: path,
					   data: "action="+action + append_url,
					   success: function(res){ 

						callback(res);

					   }
				 });

}