
  <?php
session_start();
$conn=mysqli_connect("localhost","root","","editionbakame");
$qry=$conn->query("SELECT * FROM messade where user_id='".$_SESSION['user_id']."'");
$count=$qry->num_rows;
if($count > 0)
{
    echo "<table><tr><th>SUBJECT</th><tr>";
    while($rows=mysqli_fetch_assoc($qry))
    {
        echo "<tr><td>".$rows['subjects']."</td><tr>";
    }
    echo "</table>";
}
?>
