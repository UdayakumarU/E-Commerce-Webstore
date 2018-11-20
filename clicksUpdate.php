<?php 
//if(isset($_GET['id']) && !empty($_GET['id']))
//{
    $id = $_GET['id'];
    include('includes/config.php');
    //$query = mysql_query("select salesCount from product where id ='$id' ");
    //$count = mysql_fetch_array($query);

    $update = "UPDATE products SET salesCount = salesCount + 1 WHERE id = '$id'";

   mysql_query($update);
   // {
        //echo "Record updated successfully";
   //     mysqli_error($connect);
   // }
   // die;
//}
?>