$(function() {

var that = this;
that.first_days_request = true;

$("#create_exercise").click(function(event){
  event.preventDefault();

  var name = $('#name').val();
  var calories = $('#calories').val();
  var free_weight = $('#free_weight').is(":checked");

  var exercise_obj = {
  	name:name,
  	calories:calories,
  	free_weight:free_weight
  }

  console.log(exercise_obj);


	$.ajax({
	  type: "POST",
	  url: '/exercises',
	  data: exercise_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/exercises";
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


$("#attachDayExercise").click(function(event){
  event.preventDefault();

  	var day_id = $('#days_select').val();
  	var exercise_id = $('#exercise_id').val();


  	var attach_obj = {
  		day_id:day_id,
  		exercise_id:exercise_id
  	}

	$.ajax({
	  type: "POST",
	  url: '/api/days/exercises',
	  data: attach_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/days/"+day_id;
	  	}
	  },
	});

	// $('#daysModal').modal({show:true});

});



});