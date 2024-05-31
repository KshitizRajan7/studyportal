<?php 

$file = $_GET['file'] . ".pdf" ; // js.pdf huncha yeti garera


header("content-Disposition : attachment; filename=" .urlencode($file));

$fb= fopen($file,"r");
while(!feof($fb)){
    echo fread($fb,8192);
    flush();
}

fclose($fb);
?>