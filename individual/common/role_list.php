<?php
$role_list_drop = '';
$role_list = '';
$role_list_drop .= "<select class='form-control' name='con_role[]'>";
$query = "Select * from individual_m1_roles where owner = '$username' order by id ASC";
$result = mysqli_query($con_global, $query);							
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_array($result)){		
		$new_role = $row['new_role'];
		$id = $row['id'];
		$role_list .= '<option value="'.$id.'">'.$new_role.'</option>';	
		$role_list_drop .= "<option value='".$id."'>".$new_role."</option>";																			
	}
}
$role_list_drop .= "</select>";
?>