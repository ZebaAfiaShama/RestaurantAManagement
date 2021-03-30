<?php 

//Include constants.php file here
  include('../config/constants.php');

   //1. Get the Id of Admin to be deleted
       $id=$_GET['id'];

   //2. Create SQL Query to delete admin
       $sql="DELETE FROM tbl_admin WHERE id=$id";

       //Execute the query
       $res=mysqli_query($conn, $sql);

       //Check whether the query is executed successfully or not

       if($res==true)
       {
           //Query Executed successfully and admin deleted
           //echo "Admin Deleted";
           //Create SESSION variable to display message
           $_SESSION ['delete']="<div class='success'>Admin Deleted Successfully</div>";

           //Redirect to Message Admin Page
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else{ 
            //Failed to Delete Admin
            //echo "Failed To Delete Admin";

            $_SESSION ['delete']="<div class='error'Failed to Delete Admin. Try Again Later!</div>";
            //Redirect to Message Admin Page
             header('location:'.SITEURL.'admin/manage-admin.php');
           }
   //3.Rdirect the Manage Admin page with message (success/error)
        
         

?>