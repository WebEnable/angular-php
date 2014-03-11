<?php 
session_start();
if ((isset($_SESSION['username'])!="Admin") && (isset($_SESSION['initiated'])!=1))
			{
				header("location: ../index.php#/");
			}
		else{}
			?>