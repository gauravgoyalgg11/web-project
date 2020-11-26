<?php

				include_once("connection.php");
                $city=$_GET["city"];
				$query="select *  from doctor where city='$city'";
				$table=mysqli_query($dbcon,$query);//fetching records
					
				$ary=array();	
				while($row=mysqli_fetch_array($table))//it returns a row at a time
				{
					$ary[]=$row;
				}
			echo json_encode($ary);
			
			?>
