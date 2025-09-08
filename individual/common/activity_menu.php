<?php
echo '<div class="input-group-prepend">
		<button type="button" class="btn btn-sm btn-default" data-toggle="dropdown">...</button>
			<ul class="dropdown-menu">';
			
				if($settings == '3'){
					echo '<li class="dropdown-item"><i class="fas fa-level-down-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="build_act_below.php">Add Below</a></li>';
				}
				else{
					echo '<li class="dropdown-item"><i class="fas fa-level-up-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a class="detailsButton" href="build_act_above.php">Add Above</a></li><li class="dropdown-item"><i class="fas fa-level-down-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="build_act_below.php">Add Below</a></li>';
				}
				echo '<li class="dropdown-item"><i class="fas fa-eye" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a href="#" data-toggle="modal" data-target="#modal-view" id="" onClick="showActivity(this.id)">View</a></li>
					
					<li class="dropdown-item"><i class="fas fa-edit" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a class="detailsButtonEdit" data-id="'.$row_act['id'].'" data-toggle="modal" data-target="#myModal">Edit</a></li>
					<li class="dropdown-item"><i class="fas fa-trash-alt" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a class="detailsButtonDelete" data-id="'.$row_act['id'].'" data-toggle="modal">Delete</a></li>
			</ul>
		</div>';
// <li class="dropdown-item"><i class="fas fa-edit" style="color: rgb(52, 58, 64); margin-right:10px;"></i><a class="detailsButtonEdit" data-id="'.$row_act['id'].'" data-toggle="modal">Edit</a></li>
?>
