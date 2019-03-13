<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Create New User</h1>

	<div class="container">
		
		<form>

		  <div class="form-group row">
		    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="first_name" placeholder="First Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="last_name" placeholder="Last Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="mobile_number" class="col-sm-2 col-form-label">Mobile</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mobile_number" placeholder="Mobile Number">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="email" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" id="create_user" class="btn btn-primary">Create</button>
		    </div>
		  </div>

		</form>

	</div>


</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
