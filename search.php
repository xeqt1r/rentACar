<h1>Търсене по различни критерии</h1>

<form method="post">
    Start Date <input type="date" name="startDate"><br>
    End Date <input type="date" name="endDate"><br>
    Color <input type="text" name="color"><br>
    Model <input type="text" name="model"><br>
    Horse power <input type="text" name="horsePower"><br>
    Driver Age <input type="number" name="age"><br>
    <input type="submit" name="search" value="Search!">
</form>

<a href="index.php">HOME PAGE</a>

<?php

include "common.php";

if(!empty($_POST['startDate'])){
    @$where .= " AND get_date >= '" . mysqli_real_escape_string($conn,$_POST['startDate']) . "'";
}
if(!empty($_POST['endDate'])){
    @$where .= " AND return_date <= '" . mysqli_real_escape_string($conn,$_POST['endDate']) . "'";
}
if(!empty($_POST['color'])){
    @$where .= " AND color = '" . mysqli_real_escape_string($conn,$_POST['color']) . "'";
}
if(!empty($_POST['model'])){
    @$where .= " AND model = '" . mysqli_real_escape_string($conn,$_POST['model']) . "'";
}
if(!empty($_POST['horsePower'])){
    @$where .= " AND horse_power = '" . mysqli_real_escape_string($conn,$_POST['horsePower']) . "'";
}
if(!empty($_POST['age'])){
    @$where .= " AND age = '" . mysqli_real_escape_string($conn,$_POST['age']) . "'";
}

if (isset($_POST['search'])){
    $query = 'SELECT brand,model,horse_power,color,registration_number,costumers.first_name
              FROM reservation
              INNER JOIN costumers ON costumers.id_costumer = reservation.costumer_ID
              INNER JOIN cars ON cars.id_car = reservation.car_ID
              WHERE 1
               ' . @$where;
    $result = mysqli_query($conn,$query);


    echo "<table border='1'>
            <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Hrorse Power</th>
            <th>Color</th>
            <th>Registration Number</th>
            <th>Frist Name</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
              <td>".$row["brand"]."</td>
              <td>".$row["model"]."</td>
              <td>".$row["horse_power"]."</td>
              <td>".$row["color"]."</td>
              <td>".$row["registration_number"]." </td>
              <td>".$row["first_name"]." </td>
              </tr>
              ";

    }

}
