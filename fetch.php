<?php





if(isset($_POST['limit'], $_POST['start']))
{
    $con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'blogger');
    $qu="SELECT * FROM loadd LIMIT  ".$_POST['start'].",".$_POST['limit']."  ";

    $result=mysqli_query($con,$qu);
    while($row=mysqli_fetch_array($result))
    {
        echo '
        
        <h5>'.$row["id"] .')  '. $row["title"].' </h5>
       <br>
      <p>'.$row["author"] .'  ->  '.  $row["date"].'  </p>
        
        
        
        ';
    }
}

?>