<?php
	class dbo{
		public static $host="localhost";
		public static $user="root";
		public static $db="bustrackingsystem";
		public static $password="";
		
		public static function getResultSetForQuery($query)
		{
			$link = mysqli_connect(dbo::$host, dbo::$user,dbo::$password);
			$link->set_charset("utf8");
			mysqli_select_db($link,dbo::$db);
			$result = mysqli_query($link,$query);
			//var_dump($result);
			$num_rows = 0;
			if($result)
				$num_rows = mysqli_num_rows($result);
			if($num_rows > 0)
				return $result;
			else
				return false;
		}
		
	}
?>