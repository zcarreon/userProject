<?php

	//Get all of something
	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}

	//Get one of something
	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}

	//Get a filtered result //Re-usable for anything that uses three tables
	function filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
		include('connect.php');
		$queryFilter = "SELECT * FROM {$tbl} m, {$tbl2} g, {$tbl3} mg WHERE m.{$col} = mg.{$col} AND g.{$col2} = mg.{$col2} AND g.{$col3} = '{$filter}'";
		$runFilter = mysqli_query($link, $queryFilter);
		if($runFilter){
			return $runFilter;
		}else{
			$error = "There was an error accessing this Information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}

?>
