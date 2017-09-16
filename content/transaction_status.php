<?php 
	$status = $row->status;
	switch ($status) {
		case 0:
			echo "canceled";
			break;
		case 1:
			echo "booked";
			break;
		case 2:
			echo "occupied";
			break;
		case 3:
			echo "pending";
			break;
		case 9:
			echo "completed";
			break;
		default:
			echo "error";
			break;
	}
?>