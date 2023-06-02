<?php
$opcion = $_GET['opcion'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$response;

if($opcion = 1){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $sql = "SELECT  correoE_Alumno, contrasenia FROM LoginAlumno WHERE correoE_Alumno = '". $user ."'";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          //echo $row['NoControl'].", ".$row['nombre']."<br />";
          if($row['contrasenia'] == $pass){
            $response = array(
                'mensaje' => true
            );
          }else{
            $response = array(
                'mensaje' => false
            );
          }
    }
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}
?>