<?php
include 'common.php';

$queryCostumers = "SELECT *
                    FROM costumers";

$resultCostumers = mysqli_query($conn,$queryCostumers);
$startData = "'".$_GET['startDate']."'".",";
$endData = "'".$_GET['endDate']."'".",";
$carId = "'".$_GET['id_car']."'";
if (isset($_POST['rent'])){
    $costumerId = "'".$_POST['id_costumer']."'".",";
    @$where.= $startData.$endData.$costumerId.$carId;
    $queryInsertReservation = "INSERT INTO reservation(get_date, return_date, costumer_ID, car_ID)
                            VALUE ($where)
                            ";
    if (mysqli_query($conn, $queryInsertReservation)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $queryInsertReservation . "<br>" . mysqli_error($conn);
    }


}


?>

<h1> Наемане на кола </h1>

<form method="post">
    Име и телефон на наемател: <?php
    echo "<select name='id_costumer'>";
    while ($row = mysqli_fetch_assoc($resultCostumers)) {
        echo "<option value=" . '"' . $row['id_costumer'] . '"' . ">" . $row['first_name'] ."-". $row['mobile_number'] . "";
    }
    echo "</select>";
    ?>
    <input type="submit" name="rent" value="RENT!">

</form>
<a href="freeCars.php">Back</a>
