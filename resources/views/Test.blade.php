
<?php
$list = array ($id_events, $id_users);
$fp = fopen("export.csv", "w");
foreach($list as $fields):
    fputcsv($fp, $fields);
endforeach;
fclose($fp);
?>