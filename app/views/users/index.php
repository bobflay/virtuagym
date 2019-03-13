<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>List of Users</h1>

	<div class="containter">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Mobile Number</th>
				<th>Email</th>
				<th>View</th>
			</tr>

			<?php 
				foreach($users as $user)
				echo("<tr>
					<td>".$user['id']."</td>
					<td>".$user['first_name']."</td>
					<td>".$user['last_name']."</td>
					<td>".$user['mobile_number']."</td>
					<td>".$user['email']."</td>
					<td><a href='/users/".$user['id']."'>View</a>
					</tr>"
				);
			?>
		</table>		
	</div>



</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
