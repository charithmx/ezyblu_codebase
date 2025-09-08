<?php
// get_details.php
require_once('../../Connections/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM individual_m1_core_activity WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
		$core_process_id = $row['core_process_id'];
		$core_process_ref = $row['core_process_ref'];
		$sub_pro_id = $row['sub_process_id'];
		$activity_ref = $row['activity_ref'];
		$activity = $row['activity'];
		$project_id = $row['project_id'];
		$activity_ref_next = $row['activity_ref_next'];
		

		echo '<input type="hidden" name="id" value="'.$id.'"><input type="hidden" name="core" value="'.$core_process_id .'"><input type="hidden" name="project_id" value="'.$project_id .'">
		
			<div class="callout callout-danger">
                  <h5>Are you sure you want to delete Actvity ('.$core_process_ref.'.'.$activity_ref.')</h5>
                  <div class="card-footer">
                  <input type="submit" class="btn btn-success" value="Delete" name="delete_activity" />
                  <button type="submit" class="btn btn-danger float-right" class="close" data-dismiss="modal">No</button>
               		</div>
                </div>';
    } else {
        echo 'No details found for the selected ID.';
    }
} else {
    echo 'Invalid request.';
}

mysqli_close($conn);
?>

