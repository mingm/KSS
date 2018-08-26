var manageBrandTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	

	// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var brandName = $("#name").val();
		var brandStatus = $("#status").val();

		if(brandName == "") {
			$("#name").after('<p class="text-danger">Brand Name field is required</p>');
			$('#name').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#name").find('.text-danger').remove();
			// success out for form 
			$("#name").closest('.form-group').addClass('has-success');	  	
		}

		if(brandStatus == "") {
			$("#status").after('<p class="text-danger">Brand Name field is required</p>');

			$('#status').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#status").find('.text-danger').remove();
			// success out for form 
			$("#status").closest('.form-group').addClass('has-success');	  	
		}

		if(brandName && brandStatus) {
			var form = $(this);
			// button loading
			$("#createBrandBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					'X-Requested-With': 'XMLHttpRequest'
				},
				success:function(response) {
					$("#createBrandBtn").button('reset');
					
					// reset the form text
					$("#submitBrandForm")[0].reset();
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
					$('#add-brand-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert"></button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i> Brand sucessful created!! Page will refresh autometically</strong></div>');
					
					setTimeout(function(){window.location.href = '/brands';}, 2000);
				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit brand form function

});

function editBrands(brandId = null) {
	if(brandId) {
		// remove hidden brand id text
		$('#brandId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'api/brands/' + brandId,
			type: 'GET',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'X-Requested-With': 'XMLHttpRequest'
			},
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editBrandForm #name').val(response.name);
				// setting the brand status value
				$('#editBrandForm #status').val(response.status);

				// update brand form 
				$('#editBrandForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var brandName = $('#editBrandForm #name').val();
					var brandStatus = $('#editBrandForm #status').val();

					if(brandName == "") {
						$("#editBrandForm #name").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editBrandForm #name').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editBrandForm #name").find('.text-danger').remove();
						// success out for form 
						$("#editBrandForm #name").closest('.form-group').addClass('has-success');	  	
					}

					if(brandStatus == "") {
						$("#editBrandForm #status").after('<p class="text-danger">Brand Name field is required</p>');

						$('#editBrandForm #status').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editBrandForm #status").find('.text-danger').remove();
						// success out for form 
						$("#editBrandForm #status").closest('.form-group').addClass('has-success');	  	
					}

					if(brandName && brandStatus) {
						var form = $(this);

						// submit btn
						$('#editBrandBtn').button('loading');

						$.ajax({
							url: form.attr('action') + '/' + brandId,
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
								'X-Requested-With': 'XMLHttpRequest'
							},
							success:function(response) {
								// submit btn
								$('#editBrandBtn').button('reset');
																		
								// remove the error text
								$(".text-danger").remove();
								// remove the form error
								$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
								$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"> Brand sucessful updated!! Page will refresh autometically</strong></div>');
					
							setTimeout(function(){window.location.href = '/brands';}, 2000);
					  
								
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removeBrands(brandId = null) {
	if(brandId) {
		$('#removeBrandId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedBrand.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.brand_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removeBrand.php',
						type: 'post',
						data: {brandId : brandId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeBrandBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageBrandTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeBrandFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function