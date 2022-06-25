<?php
include('conn.php');
$slect=mysqli_select_db($conn,'smsystems');
if ($slect) {
	echo "database already running<br>";
}else{
$db=mysqli_query($con, "CREATE DATABASE smsystems"); 
	if ($db) {
			$cat=mysqli_query($conn, "
				CREATE TABLE category(
				id int(11) PRIMARY KEY ,
				cat_name varchar(255))");

					if ($cat) {
						echo "table category created<br>";
					}else{
						echo "table category not created<br>";
					}

			$imported=mysqli_query($conn,"
					CREATE TABLE `imported` (
				  `p_id` int(11) NOT NULL,
				  `p_name` varchar(255) NOT NULL,
				  `p_quantity` int(11) NOT NULL,
				  `measure` varchar(24) NOT NULL,
				  `p_price` int(11) NOT NULL,
				  `p_category` varchar(11) NOT NULL,
				  `total_price` int(11) NOT NULL,
				  `exp_date` date NOT NULL,
				  `date_e` date NOT NULL
				)");
					if ($imported) {
						echo "table imported created<br>";
					}else{
						echo "table imported not created<br>";
					}


			$login=mysqli_query($conn,"
				CREATE TABLE `login` (
				  `id` int(11) NOT NULL,
				  `username` varchar(255) NOT NULL,
				  `password` varchar(255) NOT NULL,
				  `telephone` varchar(255) NOT NULL,
				  `login_status` varchar(25) NOT NULL
				)");
					if ($login) {
						echo "table login created<br>";
					}else{
						echo "table login not created<br>";
					}
			$notify=mysqli_query($conn, "
					CREATE TABLE `notification` (
					  `p_id` int(11) NOT NULL,
					  `p_name` varchar(255) NOT NULL,
					  `p_quantity` int(11) NOT NULL,
					  `measure` varchar(24) NOT NULL,
					  `p_price` int(11) NOT NULL,
					  `p_category` varchar(255) NOT NULL,
					  `total_price` int(11) NOT NULL,
					  `trans` varchar(255) NOT NULL,
					  `exp_date` date NOT NULL,
					  `date_e` datetime NOT NULL
					)
				");

				if ($notify) {
					echo "table notification created<br>";
				}else{
					echo "table notification not created<br>";
				}
 
 
	}
} 


?>