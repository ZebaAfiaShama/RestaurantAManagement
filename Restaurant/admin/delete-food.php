<?php 
//Include constants.php file here
include('../config/constants.php');
// Check whwther the id and image_name value is set or not
        if(isset($_GET['id']) AND isset($_GET['image_name']))
        {
            // Get the value
           $id = $_GET['id'];
           $image_name = $_GET['image_name'];
         
        //    Remove the physical image file if available
        if($image_name !="")
        {
            // Image is available,So remove it
            $path ="../images/food/".$image_name;
            // Remove the image
            $remove=unlink($path);
            // If failed to remove the image then add an error message and stop process

            if($remove==false)
            {
                // Set the SESSION Message
                $_SESSION['upload']="<div class='error'>Failed to Remove Image</div>";

                // Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-food.php');

                // Stop the process
                die();

            }
        }
        

        // delete data from database
        // SQL query to delete data from databse
        $sql= "DELETE FROM tbl_food WHERE id=$id";
        // Execute the query
        $res=mysqli_query($conn, $sql);
        // check whether the data is deleted from database or not
        if($res==true)
        {
            // Set success message and redirect
            $_SESSION['delete']="<div class='success'>Food deleted successfully</div>";
            // Redirect to manage-category page
            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else{
            // Set fail message and redirect
          
            $_SESSION['delete']="<div class='error'>Failed to delete food.</div>";
            // Redirect to manage-food page
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    
    

        

        }
        else 
        {
            // Redirect to manage food  page
            $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }

?>