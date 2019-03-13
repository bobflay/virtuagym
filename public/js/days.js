$(function() {

var that = this;
that.first_exercises_request = true;


$("#create_day").click(function(event){
  event.preventDefault();

  var name = $('#name').val();

  var day_obj = {
  	name:name,
  }

	$.ajax({
	  type: "POST",
	  url: '/days',
	  data: day_obj,
	  success: function(response){
	  	response = JSON.parse(response);
	  	if(response.status==200)
	  	{
	  		top.location="/days";
	  	}
	  },
	});
});



$("#openExercisessBtn").click(function(event){
  event.preventDefault();

  	if(that.first_exercises_request)
  	{
  		$.ajax({
		  type: "GET",
		  url: '/api/exercises',
		  success: function(response){
		  	response = JSON.parse(response);
		  	if(response.status==200)
		  	{
		  		var days = response.data;
		  		console.log(days);

				$.each(days, function (i, item) {
				    $('#exercises_select').append($('<option>', { 
				        value: item.id,
				        text : item.name 
				    }));
				});

		  	}
		  },
		});
		that.first_exercises_request = false;
  	}

	$('#exercisesModal').modal({show:true});

});

$("#attachExercise").click(function(event){
  event.preventDefault();

  	var exercise_id = $('#exercises_select').val();
  	var day_id = $('#day_id').val();


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