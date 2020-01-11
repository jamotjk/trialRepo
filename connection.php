<?php
    /**********SERVERNAME OF MSSQL LOGIN START***********/
$serverName = "JAMOTJOHNKEVIN";
    /**********SERVERNAME OF MSSQL LOGIN END***********/

    /**********ADMIN ACCESS INTO DATABASES START***********/
$connectionInfo=array("Database"=>"hrms_rate_management_DB");
    /**********ADMIN ACCESS INTO DATABASES END***********/

    /**********COMBINED TWO VARIABLE NAME TO BE FUNCTION IN VARIABLE $conn START***********/
$conn = sqlsrv_connect($serverName,$connectionInfo);
    /**********COMBINED TWO VARIABLE NAME TO BE FUNCTION IN VARIABLE $conn END***********/
    
?> 