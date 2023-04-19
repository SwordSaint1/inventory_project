<?php 
include 'conn.php';

$method = $_POST['method'];

if ($method == 'add_equipment') {
	$equip_name = $_POST['equip_name'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$status = $_POST['status'];

	$query = "INSERT INTO equipment(`equipment`,`description`,`qty`,`status`)VALUES('$equip_name','$description','$quantity','$status')";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'inventory_list') {
	$equip_name = $_POST['equip_name'];
	$status = $_POST['status'];
	$c = 0;

	$query = "SELECT * FROM equipment WHERE equipment LIKE '$equip_name%' AND status LIKE '$status%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$status = $j['status'];
			$c++;
			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['equipment'].'</td>';
				echo '<td>'.$j['qty'].'</td>';
				if ($status == 'available') {
					echo '<td>Available</td>';
				}else{
					echo '<td>Not Available</td>';
				}
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center; color:red;" colspan="4">No Result !!!</td>';
		echo '</tr>';
	}
}

if ($method == 'borrowers_list') {
	$id_number = $_POST['id_number'];
	$department = $_POST['department'];
	$c = 0;

	$query = "SELECT * FROM borrower_details WHERE id_number LIKE '$id_number%' AND department LIKE '$department%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if($stmt->rowCount() > 0){
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['id_number'].'</td>';
				echo '<td>'.$j['borrowers_name'].'</td>';
				echo '<td>'.$j['department'].'</td>';
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center; color:red;" colspan="4">No Result !!!</td>';
		echo '</tr>';
	}
}

if ($method == 'register_account') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$full_name = $_POST['full_name'];

	$query = "INSERT INTO user_accounts(`full_name`,`username`,`password`)VALUES('$full_name','$username','$password')";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'account_list') {
	$fname = $_POST['fname'];
	$c = 0;
	$query = "SELECT * FROM user_accounts WHERE full_name LIKE '$fname%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_accounts_user" onclick="get_accounts_details(&quot;'.$j['id'].'~!~'.$j['full_name'].'~!~'.$j['username'].'~!~'.$j['password'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['full_name'].'</td>';
				echo '<td>'.$j['username'].'</td>';
				echo '<td>'.$j['password'].'</td>';
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center; color:red;" colspan="4">No Result !!!</td>';
		echo '</tr>';
	}
}

if ($method == 'update_account') {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$full_name = $_POST['full_name'];

	$query = "UPDATE user_accounts SET username = '$username', full_name = '$full_name', password = '$password' WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'delete_account') {
	$id = $_POST['id'];
	$query = "DELETE FROM user_accounts WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'get_details') {
	$id_number = $_POST['id_number'];
	$query ="SELECT borrowers_name,department FROM borrower_details WHERE id_number = '$id_number'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			echo $j['borrowers_name'].'~!~'.$j['department'];
		}
	}else{
		echo '';
	}
}

if ($method == 'transact') {
	$id_number = $_POST['id_number'];
	$borrowers_name = $_POST['borrowers_name'];
	$department = $_POST['department'];
	$equip = $_POST['equip'];
	$quantity = $_POST['quantity'];

	$query = "INSERT INTO transaction(`id_number`,`equipment`,`borrowed_qty`,`status`,`date_borrowed`)VALUES('$id_number','$equip','$quantity','Using','$server_date_only')";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		$stmt = NULL;
		$query ="UPDATE equipment SET qty = qty - $quantity WHERE equipment = '$equip'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
}

if ($method == 'transaction_list') {
	$borrower = $_POST['borrower'];
	$status = $_POST['status'];
	$c = 0;

	$query = "SELECT transaction.id,transaction.equipment,transaction.borrowed_qty,transaction.status,borrower_details.borrowers_name,borrower_details.department FROM transaction LEFT JOIN borrower_details ON borrower_details.id_number = transaction.id_number WHERE borrower_details.borrowers_name LIKE '$borrower%' AND transaction.status LIKE '$status%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_transaction" onclick="get_transaction_details(&quot;'.$j['id'].'~!~'.$j['equipment'].'~!~'.$j['borrowed_qty'].'~!~'.$j['status'].'~!~'.$j['borrowers_name'].'~!~'.$j['department'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_name'].'</td>';
				echo '<td>'.$j['equipment'].'</td>';
				echo '<td>'.$j['borrowed_qty'].'</td>';
				echo '<td>'.$j['status'].'</td>';
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center; color:red;" colspan="5">No Result !!!</td>';
		echo '</tr>';
	}
}

if ($method == 'returned') {
	$id = $_POST['id'];
	$equip = $_POST['equip'];
	$quantity = $_POST['quantity'];
	$status = $_POST['status'];

	$query = "UPDATE transaction SET status = 'Returned', date_returned = '$server_date_only' WHERE id = '$id'";
	$stmt =  $conn->prepare($query);
	if ($stmt->execute()) {
		$stmt = NULL;
		$query = "UPDATE equipment SET qty = qty + $quantity WHERE equipment = '$equip'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
}
$conn = NULL;
?>