<?php 

function Createdb(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmflix";

	//create connection
	$con = mysqli_connect($servername, $username, $password);

	//check connection
	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	}

	//create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

	if(mysqli_query($con, $sql)){
		$con = mysqli_connect($servername, $username, $password, $dbname);

		if(mysqli_query($con, $sql)){
			return $con;
		}
		else{
			echo "Cannot create table";
		}
	}
	else{
		echo "Error while creating database".mysqli_error($con);
	}

}

?>