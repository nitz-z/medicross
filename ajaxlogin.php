 <?php
session_start();
include_once("db.php");
if(isset($_POST['user']))
{
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $res=mysqli_query($conn,"select * from login where username='$user' and password='$pass'");
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from login where username='$user' and password='$pass'"));
$name=$val['name'];
$job=$val['job'];
    $num=mysqli_num_rows($res);
if($num>0)
{
    $_SESSION['loguser']=$user;
    $_SESSION['logpass']=$pass;
    $_SESSION['logname']=$name;
    $_SESSION['logjob']=$job;
echo'1';
}
    else
    {
            echo 	'0';

    }
}

?>