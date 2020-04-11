<?php
$action = $_REQUEST['action'];


parse_str($_REQUEST['dataku'], $hasil);  
echo "Nama Lengkap: ".$hasil['namalengkap']."<br/>";
echo "First Name: ".$hasil['namadepan']."<br/>";
echo "Last Name: ".$hasil['namabelakang']."<br/>";
echo "Username: ".$hasil['username']."<br/>";


//$hasil = $_REQUEST;

/* SQL: select, update, delete */
if($action == 'create')
	$syntaxsql = "insert into tabel_registrasi values (null,'$hasil[namalengkap]','$hasil[namadepan]', '$hasil[namabelakang]', '$hasil[paymentMethod]','$hasil[username]', '$hasil[email]', '$hasil[kotaasal]', '$hasil[address]', '$hasil[tanggallahir]', '$hasil[jenistempat]', '$hasil[jurusan]','$hasil[angkatan]',now())";

	
//eksekusi syntaxsql 
$conn = new mysqli("localhost","root","23september","pendaftaran_5"); //dbhost, dbuser, dbpass, dbname
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}else{
  echo "Database connected. ";
}
//create, update, delete query($syntaxsql) -> true false
if ($conn->query($syntaxsql) === TRUE) {
	echo "Query $action with syntax $syntaxsql suceeded !";
}
elseif ($conn->query($syntaxsql) === FALSE){
	echo "Error: $syntaxsql" .$conn->error;
}

$conn->close();


?>