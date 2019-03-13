$(function() {

var that = this;
that.first_days_request = true;


$("#create_plan").click(function(event){
  event.preventDefault();

  var name = $('#name').val();

  var plan_obj = {
  	name:name,
  }

	$.ajax({
	  type: "POST",
	  url: '/plans',
	  data: plan_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/plans";
	  	}
	  },
	});
});



$("#openDaysBtn").click(function(event){
  event.preventDefault();

  	if(that.first_days_request)
  	{
  		$.ajax({
		  type: "GET",
		  url: '/api/days',
		  success: function(response){
		  	response = JSON.parse(response);
		  	if(response.status==200)
		  	{
		  		var days = response.data;
		  		console.log(days);

				$.each(days, function (i, item) {
				    $('#days_select').append($('<option>', { 
				        value: item.id,
				        text : item.name 
				    }));
				});

		  	}
		  },
		});
		that.first_days_request = false;
  	}

	$('#daysModal').modal({show:true});

});



$("#attachDay").click(function(event){
  event.preventDefault();

  	var day_id = $('#days_select').val();
  	var plan_id = $('#plan_id').val();


  	var attach_obj = {
  		day_id:day_id,
  		plan_id:plan_id
  	}

	$.ajax({
	  type: "POST",
	  url: '/api/plans/days',
	  data: attach_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/plans/"+plan_id;
	  	}
	  },
	});

	// $('#daysModal').modal({show:true});

});


});