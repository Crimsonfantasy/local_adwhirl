<?php
$GLOBALS['PHPCASSA_ROOT'] = getcwd().'/phpcassa-0.8.a.2';
require_once $GLOBALS['PHPCASSA_ROOT'].'/connection.php';
require_once($GLOBALS['PHPCASSA_ROOT'].'/columnfamily.php');
echo 'heelo';

/**
 toturial 1 :http://thobbs.github.com/phpcassa/tutorial.html  
 toturial 2:http://stackoverflow.com/questions/6485449/cassandra-time-stamp
 toturial 3: cql in phpcasandra :https://gist.github.com/1024060/983a5607390433b77d5c2e64a4ee148f4df46b69
 toturial4: forum https://groups.google.com/forum/#!topic/phpcassa/3YLEDQrRv3M
 */
/**
 The first step when working with phpcassa is to create a ConnectionPool
 which will connect to the Cassandra instance(s):

 */
$pool = new ConnectionPool("keyspace1");

/**
 The above code will connect on the default host and port.
 We can also specify
 a list of ‘host:port’ combinations like this:
 */
/**

The above code will connect on the default host and port.
We can also specify a list of ‘host:port’ combinations like this:

*/
/**
 *
 $servers = array("192.168.2.1:9160", "192.168.2.2:9160");
 $pool = new ConnectionPool("Keyspace1", $servers);

 */


/**

A column family is a collection of rows and columns in Cassandra,
and can be thought of as roughly the equivalent of a table in a relational database.
We’ll use one of the column families that were already included in the schema file:
*/

$column_family = new ColumnFamily($pool, 'ColumnFamily1');


/**

To insert a row into a column family we can use the ColumnFamily::insert() method:

*/

$column_family->insert('row_key1', array('name1' => 1, 'name2' => 'val1'));
$column_family->insert('row_key2', array('name1' => 2, 'name2' => 'val2'));
$column_family->insert('row_key3', array('name1' => 3, 'name2' => 'val3'));
$column_family->insert('row_key4', array('name1' => 4, 'name2' => 'val4'));



/**

And we can insert more than one row at a time:
$row1 = array('name1' => 'val1', 'name2' => 'val2');
$row2 = array('foo' => 'bar');
$column_family->batch_insert(array('row1' => $row1, 'row2' =
*
*/

$rows = $column_family->get('row_key3');

/**
 returns an Iterator over:
 array('row_key5' => array('name' => 'val'),
 'row_key6' => array('name' => 'val'),
 'row_key7' => array('name' => 'val'))

 */
foreach($rows as $key => $columns) {
	// Do stuff with $key or $columns
	Print_r($columns);
}


//$column_family->remove('row_key');


/**
 *
 * Or a specific set of columns from a row:

 $column_family->remove('key', array("col1", "col2");

 You cannot remove a slice of columns from a row.
 */
?>
