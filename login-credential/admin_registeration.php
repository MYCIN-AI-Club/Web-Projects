
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
    <title>admin_registeration</title>  
</head>  
<style>  
    .bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.6;
}  
   input{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.container{
    max-width: 80%; 
    padding: 34px; 
    margin: auto;
}
.container h1 {
    text-align: center;
    font-family: 'Sriracha', cursive;
    font-size: 40px;
}
.btn{
    color: white;
    background: purple;
    padding: 8px 12px;
    font-size: 20px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
}

</style>  
<body>  
<img class="bg" src="Kiet.jpg" alt="KIET GAZIABAD">  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h1 class="panel-title">Admin Registeration</h1>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="admin_registeration.php">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Adminname" name="admin_name" type="text" autofocus>  
                            </div>  
  
                            <div class="form-group">  
                                <input class="form-control" placeholder="ID" name="id" type="text" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="admin_pass" type="password" value="">  
                            </div>  
  
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
  
                        </fieldset>  
                    </form>  
                    <center><b>Already registered ?</b> <br></b><a href="admin_login.php">Login here</a></center><!--for centered text-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
<?php  

$dbcon=mysqli_connect("localhost","root","");  
mysqli_select_db($dbcon,"users");  
?>  
<?php  
  
//include("database/db_conection.php");//make connection here  
if(isset($_POST['register']))  
{  
    $admin_name=$_POST['admin_name'];//here getting result from the post array after submitting the form.  
    $admin_pass=$_POST['admin_pass'];//same  
    $id=$_POST['id'];//same  
  
  
    if($admin_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($admin_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
exit();  
    }  
  
    if($id=='')  
    {  
        echo"<script>alert('Please enter the id')</script>";  
    exit();  
    }  
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from admin WHERE id='$id'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('ID $id is already exist in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_admin="insert into admin (admin_name,admin_pass,id) VALUE ('$admin_name','$admin_pass','$id')";  
    if(mysqli_query($dbcon,$insert_admin))  
    {  
        echo"<script>window.open('admin_login.php','_self')</script>";  
    }  
} 
?>  