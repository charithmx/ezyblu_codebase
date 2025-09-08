<?php
// get_ids.php
require_once('../../Connections/db_connect.php');

$query = "SELECT id FROM details";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td><button class="btn btn-info detailsButton" data-id="' . $row['id'] . '">Details</button></td>
              </tr>';
    }
} else {
    echo '<tr><td colspan="2">No data found.</td></tr>';
}

mysqli_close($conn);
?>