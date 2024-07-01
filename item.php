<?php
require "dbcon.php";

$query = "SELECT * FROM sales_items";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Error - Query failed: " . mysqli_error($con));
}

$num_rows = mysqli_num_rows($result);

echo "This Table has " . $num_rows . " Rows<br>";

for ($row_num = 0; $row_num < $num_rows; $row_num++) {
    $row = mysqli_fetch_assoc($result);
    
    echo "<p> Result row number " . ($row_num + 1) . " <br>item_id: ";
    echo $row["item_id"]; 
    echo " <br>name: ";
    echo $row["name"];
    echo "<br> price: ";
    echo $row["price"];
    echo "</p>";
}

mysqli_free_result($result);
mysqli_close($con);
?>
