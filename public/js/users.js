$(function() {

var that = this;
that.first_plans_request = true;


$("#create_user").click(function(event){
  event.preventDefault();

  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var mobile_number = $('#mobile_number').val();
  var email = $('#email').val();

  var user_obj = {
  	first_name:first_name,
  	last_name:last_name,
  	mobile_number:mobile_number,
  	email:email
  }

	$.ajax({
	  type: "POST",
	  url: '/users',
	  data: user_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/users";
	  	}
	  },
	});
});



$("#openPlansBtn").click(function(event){
  event.preventDefault();

  	if(that.first_plans_request)
  	{
  		$.ajax({
		  type: "GET",
		  url: '/api/plans',
		  success: function(response){
		  	response = JSON.parse(response);
		  	if(response.status==200)
		  	{
		  		var plans = response.data;
		  		console.log(plans);

				$.each(plans, function (i, item) {
				    $('#plans_select').append($('<option>', { 
				        value: item.id,
				        text : item.name 
				    }));
				});

		  	}
		  },
		});
		that.first_plans_request = false;
  	}

	$('#plansModal').modal({show:true});

});



$("#attachPlan").click(function(event){
  event.preventDefault();

  	var plan_id = $('#plans_select').val();
  	var user_id = $('#user_id').val();


  	var attach_obj = {
  		plan_id:plan_id,
  		user_id:user_id
  	}

	$.ajax({
	  type: "POST",
	  url: '/api/users/plans',
	  data: attach_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/users/"+user_id;
	  	}
	  },
	});


});



});