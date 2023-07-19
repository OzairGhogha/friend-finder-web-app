
<?php

$conn = mysqli_connect('poseidon.salford.ac.uk','agd646','MJbXVeuFXy4Gl8v','agd646_cssy2');


$return = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM usertable 
	WHERE id  LIKE '%".$search."%'
	OR username LIKE '%".$search."%' 
	OR firstname LIKE '%".$search."%' 
	OR lastname LIKE '%".$search."%' LIMIT 20
	";}
else
{
    $query = "SELECT * FROM usertable WHERE username = 'no'";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $return .='
	<div class="table-responsive">
	<table class="table table bordered">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Image</th>
	</tr>';
    while($row1 = mysqli_fetch_array($result))
    {
        $return .= '
		<tr>
		<td>'.$row1["id"].'</td>
		<td>'.$row1["username"].'</td>
		<td>'.$row1["firstname"].'</td>
		<td>'.$row1["lastname"].'</td>
		<td>' . "<img src=images/" . $row1['photoname'] . ' width=100px height="100px">' .' </td>
		</tr>';
    }
    echo $return;
}
else
{
    echo 'There were no results found. Check your search terms for errors and try again!';
}


//$search = ("SELECT * FROM usertable WHERE username OR firstname OR lastname LIKE '%$data%' LIMIT 5");
//$result = $conn->query($search);
//
//if ($result) {
//    $out = $result->fetch_assoc();
//    echo "<h1>" . $out['firstname'] . "</h1>";
//
//}
