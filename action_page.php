<?
	/*Работа с данными полученными из формы*/
	$userlastname = trim($_POST['userlastname']);
	$userfirstname = trim($_POST['userfirstname']);
	$usermiddlename = trim($_POST['usermiddlename']);
	$email = trim($_POST['email']);
	$address = ($_POST['address']);
	$zip = intval ($_POST['zip']);
	$addressee = trim($_POST['addressee']);
	$contractnumber = intval ($_POST['contractnumber']);
	$cardname = ($_POST['cardname']);
	$cardnumber = intval(trim($_POST['cardnumber']));
	$expmonth = trim($_POST['expmonth']);
	$expyear = intval ($_POST['expyear']);
	$cvv = intval ($_POST['cvv']);
	/*Работа с БД*/
	
	$mysqli = mysqli_connect("localhost", "root", "", "form");
	if($mysqli->connect_error){
    die("Ошибка: " . $conn->connect_error);
	}
	echo "Подключение успешно установлено";
	if ($userlastname && $userfirstname && $usermiddlename && $email
	&& $address && $zip && $addressee && $cardname && $cardnumber &&
	$expmonth && $expyear && $cvv) {
		$query = $mysqli->query ("INSERT INTO 'users' VALUES 
		(NULL, '$userlastname', '$userfirstname', '$usermiddlename', '$email',
	'$address', '$zip', '$addressee', '$contractnumber', '$cardname', '$cardnumber',
	'$expmonth', '$expyear', '$cvv' )");
	}
	else {
	echo " Не удалось загрузить данные в БД.";}
	$mysqli->close();
	
?>