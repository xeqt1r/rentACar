<h1>Справка за заети кола и периода </h1>

<form action="" method="get">
    <label for="">Начална дата</label>
    <input type="date" name="startDate" value=""> <br>
    <label for="">Крайна дата</label>
    <input type="date" name="endDate" value=""> <br>
    <input type="submit" name="search" value="Find">
</form>

<a href="index.php">Home Page</a> <br>


<?php
include 'common.php';

if (isset($_GET['search'])) {

    $getDate = $_GET['startDate'];
    $returnDate = $_GET['endDate'];

    $query = "SELECT id_car,brand,color,registration_number,horse_power,model,get_date,return_date
          FROM cars
          INNER JOIN reservation ON reservation.car_ID = cars.id_car
          WHERE ((return_date BETWEEN '$getDate' AND '$returnDate') OR (get_date BETWEEN '$getDate' AND '$returnDate')
          OR (get_date < '$getDate' AND (return_date > '$returnDate' OR return_date IS NULL))
      )";
    $result = mysqli_query($conn, $query);

    echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Hrorse Power</th>
            <th>Color</th>
            <th>registration Number</th>
            <th>From Date</th>
            <th>To Date</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
              <td>".$row["id_car"]."</td>
              <td>".$row["brand"]."</td>
              <td>".$row["model"]."</td>
              <td>".$row["horse_power"]."</td>
              <td>".$row["color"]."</td>
              <td>".$row["registration_number"]."</td>
              <td>".$row["get_date"]."</td>
              <td>".$row["return_date"]."</td>
              </tr>
              ";
    }
    echo "</table>";

}



