<?php
		$query_user = "select * from membership where email = '$username'";
		$result_user = mysqli_query($con_global, $query_user);
		
		if(mysqli_num_rows($result_user)>0){
			while($row_user = mysqli_fetch_array($result_user)){		
				$first_name = $row_user['first_name'];
				$last_name = $row_user['last_name'];
				$full_name = $first_name.' '.$last_name;
			}
		}
		?>
