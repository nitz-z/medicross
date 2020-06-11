 <?php
session_start();
include_once("db.php");
if(isset($_SESSION['loguser']))
{
    $user=$_SESSION['loguser'];
    $pass=$_SESSION['logpass'];
    $name201=$_SESSION['logname'];
    $job201=$_SESSION['logjob'];
   
         $val=mysqli_num_rows(mysqli_query($conn,"select * from login where username='$user' and password='$pass'"));
if($val>0)
{
  if($name201=="admin" or $job201=="accountant")
    {
}
 else
 {
         header("location:index.php");

 }
}
else
{
    header("location:login.php");
}

    }
else
{
    header("location:login.php");
}
   
?>