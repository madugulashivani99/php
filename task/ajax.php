<?php
$conn = mysqli_connect('localhost','root','','server');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $q = "select * from product where c_id=".$id;
    $query=mysqli_query($conn,$q);
    $products=array();
    while ($row = mysqli_fetch_array($query)) {
    $product = array("id"=>$row['c_id'],"product"=>$row['product']);
  $products[] = $product;
}
    echo json_encode($products);
}
//$_POST['c_id'] = 2;
if (isset($_POST['p_id'])) {
    $p_id = $_POST['p_id'];
    $q = "select * from servername where p_id=".$p_id;
    $query=mysqli_query($conn,$q);
    $servernames=array();
    while ($row = mysqli_fetch_array($query)) {
    $servername = array("id"=>$row['p_id'],"servername"=>$row['servername']);
  $servernames[] = $servername;
       
}
  echo json_encode($servernames);
}
?>