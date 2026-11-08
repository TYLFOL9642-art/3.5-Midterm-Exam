<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "sdc310_midterm"
);

if($conn->connect_error)
{
    die("Connection Failed");
}

if(isset($_POST['add']))
{
    $sql = "INSERT INTO addresses
    (First, Last, Street, City, State, Zip)

    VALUES(
    '{$_POST['First']}',
    '{$_POST['Last']}',
    '{$_POST['Street']}',
    '{$_POST['City']}',
    '{$_POST['State']}',
    '{$_POST['Zip']}'
    )";

    $conn->query($sql);
}
if(isset($_POST['update']))
{
    $sql = "UPDATE addresses SET

    First='{$_POST['First']}',
    Last='{$_POST['Last']}',
    Street='{$_POST['Street']}',
    City='{$_POST['City']}',
    State='{$_POST['State']}',
    Zip='{$_POST['Zip']}'

    WHERE AddressNo={$_POST['AddressNo']}";

    $conn->query($sql);
}
if(isset($_POST['update']))
{
    $sql = "UPDATE addresses SET

    First='{$_POST['First']}',
    Last='{$_POST['Last']}',
    Street='{$_POST['Street']}',
    City='{$_POST['City']}',
    State='{$_POST['State']}',
    Zip='{$_POST['Zip']}'

    WHERE AddressNo={$_POST['AddressNo']}";

    $conn->query($sql);
}

if(isset($_GET['delete']))
{
    $conn->query(
    "DELETE FROM addresses
     WHERE AddressNo=".$_GET['delete']);
}

$result = $conn->query(
"SELECT * FROM addresses");

?>

<!DOCTYPE html>

<html>

<head>

<title>Tyler Follis Midterm</title>

<style>

table{
    border-collapse:collapse;
}

th{
    background-color:skyblue;
}

td,th{
    border:1px solid black;
    padding:15px;
}

</style>

</head>

<body>

<table>

<tr>

<th>Address #</th>
<th>First Name</th>
<th>Last Name</th>
<th>Street Address</th>
<th>City</th>
<th>State</th>
<th>Zip Code</th>
<th></th>
<th></th>

</tr>

<?php

while($row = $result->fetch_assoc())
{
?>

<tr>

<form method="post">

<td>

<?php echo $row['AddressNo']; ?>

<input
type="hidden"
name="AddressNo"
value="<?php echo $row['AddressNo']; ?>">

</td>

<td>

<input
type="text"
name="First"
value="<?php echo $row['First']; ?>">

</td>

<td>

<input
type="text"
name="Last"
value="<?php echo $row['Last']; ?>">

</td>

<td>

<input
type="text"
name="Street"
value="<?php echo $row['Street']; ?>">

</td>

<td>

<input
type="text"
name="City"
value="<?php echo $row['City']; ?>">

</td>

<td>

<input
type="text"
name="State"
value="<?php echo $row['State']; ?>">

</td>

<td>

<input
type="text"
name="Zip"
value="<?php echo $row['Zip']; ?>">

</td>

<td>

<input
type="submit"
name="update"
value="Update">

</td>

<td>

<a href="?delete=<?php echo $row['AddressNo']; ?>">
Delete
</a>

</td>

</form>

</tr>

<?php
}
?>

</table>

<br><br>

<form method="post">

<p>
Enter your first name:
<input type="text" name="First" required>
</p>

<p>
Enter your last name:
<input type="text" name="Last" required>
</p>

<p>
Enter your street address:
<input type="text" name="Street" required>
</p>

<p>
Enter your city:
<input type="text" name="City" required>
</p>

<p>
Enter your state:
<input type="text" name="State" maxlength="2" required>
</p>

<p>
Enter your zip code:
<input type="text" name="Zip" required>
</p>

<input type="submit"
       name="add"
       value="Add User">

</form>

</body>

</html>