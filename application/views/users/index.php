<main role="main" class="flex-shrink-0">
  <div class="container">
      <h1>List of User</h1>
      <table class="table table-striped table-hover">
          <thead>
              <tr>
			  <th scope="col"><input type="checkbox" id="cus_check" ></th>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
			  <th scope="col">Email</th>			  
			  <th scope="col">Phone Number</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
				<?php foreach ($users as $user): ?>
					<tr>
					<th scope="row"><input type="checkbox" class="checkcustom" id="<?php echo $user["id"] ?>" ></th>
					<td> <?php echo $user["id"]; ?></td>
					<td> <?php echo $user["first_name"]; ?> </td>
					<td> <?php echo $user["last_name"]; ?> </td>
					<td> <?php echo $user["email"]; ?> </td>
					<td> <?php echo $user["phone_number"]; ?> </td>
					<td>			
						<a href="<?php echo site_url("users/view/$user[id]"); ?>"><button class="btn btn-primary btn-sm">View</button></a>
						<a href="<?php echo site_url("users/update/$user[id]"); ?>"><button class="btn btn-outline-primary btn-sm"> Edit </button></a>
						<a onclick="return confirm('Are you sure to delete this user?')" href="<?php echo site_url("users/delete/$user[id]");	 ?>"><button class="btn btn-sm">Delete</button></a>
					</td>
					</tr>
				<?php endforeach; ?>
          </tbody>
      </table>
	  <button id="DeleteAll" class="btn btn-danger"> Delete </button>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/JavaScript" >
	$("#cus_check").change(function () {
		$("input:checkbox.checkcustom").prop('checked', $(this).prop("checked"));
	})

	$("#DeleteAll").click(function() {
		if(confirm('Are you sure to delete this user?')) {
			var get_id = [];

			$("input:checkbox.checkcustom").each(function(){
				var $this = $(this);
				if($this.is(":checked")){
					get_id.push($this.attr("id"));
				}
			});

			var jsonString = JSON.stringify(get_id);
			$.ajax({
				url: "<?php echo site_url(); ?>/users/deleteMulti",
				type: 'POST',
				data: {data : jsonString},
				error: function() {
					alert('Something is wrong');
				},
				success: function(data) {
					alert('Xóa thành công'); 
					window.location.reload();
				}
			});
		}
	})
	
</script>
