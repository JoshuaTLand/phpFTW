<?php

namespace phpFTW\system;

class dbi{
	
	private $config;
	private $logger;
	private $dbh;
	
	function __construct(){
		global $config;
		global $logger;
		
		$this->config = $config;
		$this->logger = $logger;
		
		if($this->config->db["host"] != ""){

			$dbh = new \PDO($this->config->db['driver'].":host=".$this->config->db["host"].";dbname=".$this->config->db["dbName"], $this->config->db["user"], $this->config->db["password"]);
			
			if (!$dbh) {
				die("Error in connection: " . $dbh->errorInfo());
			}
			
			$this->dbh = $dbh;
		}	
	}
	
	private function GetConditionsString($conditions){
		$compString = " WHERE ";
		foreach($conditions as $condition){
			$col = $condition[0];
			$comp = $condition[1];
			$val = $condition[2];

			
			$valString = "";
			if(gettype($val) == "boolean"){
				$valString = "false";
			}elseif(gettype($val) == "string"){
				$valString = "'".strval($val)."'";
			}else{
				$valString = strval($val);
			}
			
			$compString = $compString.$col." ".$comp." ".$valString;
		}
		return $compString;
	}
	
	function select($table, $conditions = [], $limit = 0, $orderBy = "", $returnCols = []){
		$sql = "SELECT";
		
		if(!empty($returnCols)){
			foreach($returnCols as $col)
			$sql = $sql." ".$col;
		}else{
			$sql = $sql." *";
		}
		
		$sql = $sql." FROM ".$table;
		
		if(!empty($conditions)){
			$sql = $sql.$this->GetConditionsString($conditions);
		}
		
		if(!empty($orderBy)){
			$sql = $sql." ORDER BY ".$orderBy;
		}
		
		if($limit > 0){
			$sql = $sql." LIMIT ".strval($limit);
		}
		
		$statement = $this->dbh->query($sql);
		
		$returnRows = [];
		
		if($statement){
			while($row = $statement->fetch(\PDO::FETCH_ASSOC)){
				array_push($returnRows, $row);
			}
		}
		
		return $returnRows;
	}
	
	function insert($table, $values = []){
		
		$sql = "INSERT INTO ".$table;
		
		$colString = "(";
		$valString = "(";
		if(!empty($values)){
			foreach($values as $col => $val){
				$colString = $colString.$col.",";
				$valString = $valString."'".$val."',";
			}
			$colString = rtrim($colString, ",");
			$colString = $colString.")";
			$valString = rtrim($valString, ",");
			$valString = $valString.")";
		}
		
		$sql = $sql." ".$colString." VALUES ".$valString;

		$statement = $this->dbh->query($sql);
		
		$returnRows = [];
		if($statement){
			return $this->dbh->lastInsertId();
		}else{
			return $this->dbh->errorInfo();
		}
	}
	
	function update($table, $values, $conditions = []){
		$sql = "UPDATE ".$table." SET ";
		
		$setString = "";
		foreach($values as $col => $val){
			$valString = "";
			switch (gettype($val)){
				case "boolean":
					if($val){
						$valString = $this->config->db['driver'] == 'pgsql' ? "true" : strval(1);
					}else{
						$valString = $this->config->db['driver'] == 'pgsql' ? "false" : strval(0);
					}
					break;
				case "string":
					$valString = "'".$val."'";
					break;
				default:
					$valString = strval($val);
					break;
			}
			
			$setString = $setString." ".$col." = ".$valString.",";
		}
		$setString = rtrim($setString, ",");
		
		$sql = $sql.$setString;
		
		if(!empty($conditions)){
			$sql = $sql.$this->GetConditionsString($conditions);
		}
		
		$statement = $this->dbh->prepare($sql);
		$statement->execute();
		
		$returnRows = [];
		if($statement){
			return $statement->rowCount();
		}else{
			return $this->dbh->errorInfo();
		}
	}
}