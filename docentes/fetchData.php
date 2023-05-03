<?php
// Include config file 
include "../db/var.php";
 
// Database connection info 
$dbDetails = array( 
    'host' => $MySQL_server , 
    'user' => $MySQL_user , 
    'pass' => $MySQL_pass , 
    'db'   => $MySQL_DB  
); 

// DB table tu use
$table = 'usuarios';

// Table's primary key 
$primaryKey = 'id';

// Array of databases columns which should be read and sent back tu DataTables.
// The 'db' parameter represents the colum name in the database.
// The 'dt' parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'nombre', 'dt' => 0 ),
	array( 'db' => 'apellidos', 'dt' => 1 ),
	array( 'db' => 'correo', 'dt' => 2 ),
	array( 'db' => 'rol', 'dt' => 3 ),
	array( 
        'db'        => 'estatus', 
        'dt'        => 4, 
        'formatter' => function( $d, $row ) { 
            return ($d == 'A')?'Active':'Inactive'; 
        } 
    ),
	array(
		   'db'	=> 'id',
		   'dt' => 5,
		   'formatter' => function( $d, $row ){
		   	return '<a href="javascript:void(0);" class="btn btn-warning" onclick="editData('.htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8').')"><i class="bi bi-pencil"></i></a>&nbsp; 
                <a href="javascript:void(0);" class="btn btn-danger" onclick="deleteData('.$d.')"><i class="bi bi-trash"></i></a> 
            ';
		   }
		)
);

// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);

?>