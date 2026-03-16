<?php
include('db.inc.php');
function emptyInput($input)
{
    if (empty($input)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function fileTypepdf($fileType)
{
    $pdf = 'application/pdf';
    if ($pdf != $fileType) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function existInput($column, $table, $clmcondition, $frmInput, $dbVar){
    $sql ='select '.$column.' from '.$table.' where '.$clmcondition.' = "'.$frmInput.'"';
    $query = mysqli_query($dbVar, $sql);
    $row_count = mysqli_num_rows($query);
    if ($row_count != 0){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}


function selectID($column, $table, $clmcondition, $frmInput, $dbVar){
$sql ='select '.$column.' from '.$table.' where '.$clmcondition.' = "'.$frmInput.'"';
 $query = mysqli_query($dbVar, $sql);
 $row = mysqli_fetch_assoc($query);
$result = $row[$column];
return $result;

}