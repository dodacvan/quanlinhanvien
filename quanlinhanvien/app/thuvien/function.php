
<?php
function newmanager($data){
foreach($data as $key => $val){
$id=$val["id"];
$name=$val["name"];
echo "<option value='$id'>$name</option>";
}
}
?>