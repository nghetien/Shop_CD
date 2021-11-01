<?php 
    include "../connect.php";

	class DB{
		public static function listAll($sql){
			global $connectDB;
			$result = mysqli_query($connectDB,$sql) or die("Không truy vấn được");
			$arr = array();
			while($rows = mysqli_fetch_object($result))
				$arr[] = $rows;
			return $arr;
		}

		public static function execute($sql){
			global $connectDB;
			return mysqli_query($connectDB,$sql);
		}

		public static function getARecord($sql){
			global $connectDB;
			$result = mysqli_query($connectDB,$sql) or die("Không truy vấn được");
			$record = mysqli_fetch_object($result);
			return $record;
		}

		public static function numRows($sql){
			global $connectDB;
			$result = mysqli_query($connectDB, $sql) or die("Không truy vấn được");
			return mysqli_num_rows($result);
		}

	}
?>