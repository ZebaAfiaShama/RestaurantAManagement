<?php include('partials/menu.php');?>

<div class="maincontent">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
<?php 
     if(isset($_GET['id']))
     {
         $id=$_GET['id'];
     }
?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td>
                    <input type="password" name="current_password" placeholder="Current Password">
                </td>

            </tr>
            <tr>
                <td>New Password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">

                </td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name=confirm_password placeholder="Confirm Password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                </td>
            </tr>

        </table>
        </form>
    </div>
</div>

<?php 

//check whether the submit is clicked or not
if(isset($_POST['submit']))
{
   // echo"clicked";
   //1. Get the Data from FORM 
   $id=$_POST['id']; 
   $current_password=md5($_POST['current_password']); 
   $new_password=md5($_POST['new_password']); 
   $confirm_password=md5($_POST['confirm_password']); 

   //2.Check whether the user with current id and current password exist or not
     $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

     //Execute the query
     $res=mysqli_query($conn, $sql);

     if($res==true)
     {
         //Check whether data is available or not
         $count=mysqli_num_rows($res);

         if($count==1){
             //User Exists and password can be changed
             //echo "User Found";
             //check whether the new password and confirm password match or not
             if($new_password==$confirm_password)
             {
                 //Update the Password
                 //echo"Matched";
                 $sql2="UPDATE tbl_admin SET
                 password='$new_password'
                 WHERE id=$id 
                 ";

                 //Execute The query
                 $res2=mysqli_query($conn, $sql2);

                 //Check whether query executed or not
                 if($res2==true)
                 {
                     //Display Success Message
                    //Redirect to Manage admin page with success message
                     $_SESSION['change-pass']="<div class='success'>Password Changed Successfully</div>";
                 //Redirect the User
                     header('location:'.SITEURL.'admin/manage-admin.php');

                 }
                 else{
                     //Display error message
                     //Redirect to Manage admin page with error message
                     $_SESSION['change-pass']="<div class='error'>Failed Changed Password</div>";
                 //Redirect the User
                     header('location:'.SITEURL.'admin/manage-admin.php');
                 }
             }
             else
             {
                 //Redirect to Manage admin page with error message
                 $_SESSION['pass-not-match']="<div class='error'>Password Not Matched</div>";
                 //Redirect the User
                //  header('location:'.SITEURL.'admin/manage-admin.php');
                 if(isset($_SESSION['pass-not-match']))
                 {
                     echo $_SESSION['pass-not-match'];
                     unset($_SESSION['pass-not-match']);
                 }
             }

         }
         else{
             //User doesnot exist than set message and Redirect
             $_SESSION['user-not-found']="<div class='error'>User Not Found </div>";
             //Redirect the User
             header('location:'.SITEURL.'admin/manage-admin.php');
         }
     }
   //3.Check Whether the new password and confirm password matched or not

   //4. Change the password if above is true



}
?>




<?php include('partials/footer.php');?>