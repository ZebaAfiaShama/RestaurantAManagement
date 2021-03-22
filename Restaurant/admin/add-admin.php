<?php include('partials/menu.php');?>
<div class="main-content">

<div class="wrapper">
    <h1>Add Admin</h1>
    <br>
    <br>
    <form action="" method="POST">
<table class="tbl-30">
    <tr>

    <td>Full Name:</td>
       <td>
        <input type="text" name="full_name" placeholder="Enter Your Name">
       </td>
    </tr>

    <tr>
        <td>Username:</td>
        <td>
            <input type="text" name="username" placeholder="Username">
        </td>
    </tr>
    <tr>
        <td>Password:</td>
        <td>
            <input type="password" name="password" placeholder="Your password">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
        </td>
    
    </tr>
</table>
    </form>
</div>
</div>



<?php include('partials/footer.php');?>
<?php 
// Process the value from FROM and save it to Database
// Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // Button Clicked
    // get the data from FORM
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']); //Password Encrypted by MD5

    // SQL Query to save the data into database
    $sql="INSERT INTO tbl_admin SET
    
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    // Execute Query and save data in database
    $conn=mysqli_connect('localhost', 'root', '') or die (mysqli_error()); //database connection
    $db_select =mysqli_select_db($conn,'restaurant') or die(mysqli_error()); //Selecting database
    $res=mysqli_query($conn, $sql)or die (mysqli_error());

}



?>