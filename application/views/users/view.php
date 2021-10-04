<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1>View User</h1>

            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?> " disabled>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?> " disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email; ?> " disabled>
            </div>
			<div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $user->phone_number; ?> " disabled>
            </div>
		
    </div>
</main>
