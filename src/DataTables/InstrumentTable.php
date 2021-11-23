<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = <<<EOT
 (
    SELECT 
      instruments.id,
      instrument_name,
      tag_name, 
      brand, 
      model,
      serial_number, 
      location_name,
      '<button class="btn btn-block btn-xs btn-secondary" id="buttonMore"><i class="fas fa-search"></i> More</button>
      <button class="btn btn-block btn-xs btn-info" id="buttonHistory"><i class="fas fa-history"></i> History</button>' as buttons,
       (@cnt := @cnt + 1) as instrument_no
    FROM
      instruments 
      JOIN locations
      ON locations.id = location_id
      CROSS JOIN (SELECT @cnt := 0) AS dummy
 ) temp
EOT;

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'instrument_no', 'dt' => 0),
    array('db' => 'id', 'dt' => 1),
    array('db' => 'instrument_name',  'dt' => 2),
    array('db' => 'tag_name',     'dt' => 3),
    array('db' => 'brand',     'dt' => 4),
    array('db' => 'model',     'dt' => 5),
    array('db' => 'serial_number',     'dt' => 6),
    array('db' => 'location_name',     'dt' => 7),
    array('db' => 'buttons',     'dt' => 8)
);

// SQL connection information
require('/webroot/www/InstruDB/config/DataTablesConfig.php');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('/webroot/www/InstruDB/config/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
