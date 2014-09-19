<?php
$GLOBALS['PHPCASSA_ROOT'] = getcwd().'/phpcassa-0.8.a.2';
require_once $GLOBALS['PHPCASSA_ROOT'].'/connection.php';
require_once($GLOBALS['PHPCASSA_ROOT'].'/columnfamily.php');



// Create new ConnectionPool like you normally would
$pool = new ConnectionPool("keyspace1");

// Retrieve a raw connection from the ConnectionPool name1 = 1 
$raw = $pool->get();
//SELECT * FROM ColumnFamily1 WHERE  KEY = 1 
$column_family = new ColumnFamily($pool, 'ColumnFamily2');
//$query = "get ColumnFamily2 where name1= 1"; 
//$rows = $raw->client->execute_cql_query($query, cassandra_Compression::NONE);
$expression1 = CassandraUtil::create_index_expression('name1','1', cassandra_IndexOperator::EQ);
$expression2 = CassandraUtil::create_index_expression('name3','20111110', cassandra_IndexOperator::GTE);


$expr_list = array($expression1, $expression2);
$index_clause = CassandraUtil::create_index_clause($expr_list);

$rows = $column_family->get_indexed_slices($index_clause);

//var_dump($rows);

foreach($rows as $key => $columns) {
	// Do stuff with $key or $columns
	Print_r($columns);
}
// Return the connection to the pool so it may be used by other callers. Otherwise,
// the connection will be unavailable for use.
$pool->return_connection($raw);


unset($raw);
?>