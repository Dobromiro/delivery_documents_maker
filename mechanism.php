<?php

	session_start();
	// wyłączenie niepotrzebnych komunikatów NOTICE
	error_reporting(E_ALL ^ E_NOTICE);
	

	
	if (0==0)
	{

		
		require_once "connect2.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			//$polaczenie2 = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

						$MODEL = $_POST['MODEL'];
						$TIME = date("H:i:s");
						$DELIVERY = date("YmdHi");
						
		
						$polaczenie->query("TRUNCATE TABLE temp;");
						$polaczenie->query("UPDATE collect SET OUTCOMING_DATE='$TIME' WHERE OUTCOMING_DATE = 'NULL'");
						$polaczenie->query("UPDATE collect SET DELIVERY_NO='$DELIVERY' WHERE DELIVERY_NO = 'NULL'");						
						$polaczenie->query("INSERT INTO main SELECT * FROM collect");
						$polaczenie->query("INSERT INTO temp SELECT * FROM collect");
						$polaczenie->query("TRUNCATE TABLE collect;");	

						header('Location: dziekuje2.php');

/*
					if ($polaczenie->query("INSERT INTO temp SELECT * FROM collect"))
						 
					{
						$_SESSION['udanarejestracja']=true;
						
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
*/			
				
				$polaczenie->close();

			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	

	
	
?>