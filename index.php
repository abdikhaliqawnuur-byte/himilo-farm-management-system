<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require_once ("db/connection.php");

$query = "SELECT COUNT(*) AS total_crops FROM crops";
$stmt = $pdo->prepare($query);
$stmt->execute();
$crops_result = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT COUNT(*) AS total_employee FROM employee";
$stmt = $pdo->prepare($query);
$stmt->execute();
$employee_result = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT COUNT(*) AS total_equipments FROM equipments";
$stmt = $pdo->prepare($query);
$stmt->execute();
$equipments_result = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT COUNT(*) AS total_livestock FROM livestock";
$stmt = $pdo->prepare($query);
$stmt->execute();
$livestock_result = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT COUNT(*) AS total_pesticides FROM pesticides";
$stmt = $pdo->prepare($query);
$stmt->execute();
$pesticides_result = $stmt->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Himilo Farm</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .analysis-section {
            max-width: 400px;
            margin: 10px;
            background: #333;
            color: #fff;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* margin-bottom: 20px; */
            display: inline-block;  
           
        }

        .analysis-section i {
            margin-bottom: 10px;
        }

        .analysis-section p {
            margin-bottom: 20px;
            font-family: 'times new roman';
            font-size: 20px;
            font-weight: bold;
        }

        .analysis-section a button {
            margin-bottom: 20px;
            font-family: 'times new roman';
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
        }

/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-image: url("../sawiro/babaaay.jpg");
    background-repeat: center;
 
}

header {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    text-align: center;
}

/* Styling for the sidebar */
.sidebar {
    background-color: #4CAF50;
    color: #fff;
    width: 250px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 20px;
    overflow-y: auto;
    /* box-shadow: 1px 0 10px rgba(0, 0, 0, 0.2); */
}

.sidebar-logo {
    text-align: center;
    padding: 10px 0;
}

.sidebar-logo img {
    max-width: 110px; /* Adjust the max-width as per your preference */
    border: 1px dashed #fff;
    border-radius: 30px;

}

.sidebar-logo h1 {
    color: #fff;
    font-size: 24px;
}

.sidebar-nav {
    list-style: none;
    padding-left: 0;
}

.sidebar-nav li {
    margin: 0;
    
}

.sidebar-nav a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 15px 20px;
    transition: background-color 0.2s ease;
}

.sidebar-nav a:hover {
    background-color: #fff;
    color: #555
}

.sidebar-nav .active {
    background-color: #fff;
    color: #555;

}

/* ... Other CSS rules ... */

.sidebar-nav a {
    color: #fff;
    text-decoration: none;
    display: flex;
    padding: 15px 20px;
    transition: background-color 0.2s ease;
    display: flex;
    align-items: center;
}

.sidebar-nav a i {
    margin-right: 10px;
}

/* ... Other CSS rules ... */


main {
    margin-left: 250px;
    padding: 20px;
}

.report-button {
    max-width: 400px;
    margin: 10px;
    background: #4CAF50;
    color: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: inline-block;
    margin-top: 80px;
   margin-left: 45%;
}

.report-button i {
    margin-bottom: 10px;
    font-size: 4rem; /* Adjust the icon size */
    color: #fff;
}

.report-button a button {
    margin-bottom: 20px;
    font-family: 'times new roman';
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    padding: 10px;
    border-radius: 10px;
    cursor: pointer;
    background: #4CAF50;
    color: #fff;
}




</style>
</head>
<body>
<header>
        <h1>Himilo Mixed Farm</h1>
    </header>

    <nav class="sidebar">
    <div class="sidebar-logo">
    <img src="sawiro/Himilo.jpg" alt="">
    </div>
    <ul class="sidebar-nav">
        <li><a href="index.php"class="active"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="crops/crops.php"><i class="fa-solid fa-carrot"></i> Crops</a></li>
        <li><a href="equipment/equipments.php"><i class="fa-solid fa-tractor"></i> Equipments</a></li>
        <li><a href="employee/employee.php"><i class="fas fa-users"></i> Employee</a></li>
        <li><a href="livestock/livestock.php"><i class="fas fa-cow"></i> Livestock</a></li>
        <li><a href="pesticides/pesticides.php"><i class="fas fa-seedling"></i> Pesticides</a></li>
        <li><a href="../report/generate_report.php"><i class="fas fa-file-pdf"></i> Generate Report</a></li>
        <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
        <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>

<main>

    <div class="analysis-section">
            
            <i class="fa-solid fa-carrot fa-4x"></i><br><br>
            <p>Total Crops:  <?php echo $crops_result['total_crops']; ?></p>
            <a href="../crops/crops.php"> <button type="submit">Crops Data</button></a>
            
    </div>
    <div class="analysis-section">
    <i class="fas fa-users fa-4x"></i><br><br>
            <p>Total Employee:  <?php echo $employee_result['total_employee']; ?></p>
            <a href="../employee/employee.php"> <button type="submit">Employee Data</button></a>
    </div>
    <div class="analysis-section">   
    <i class="fa-solid fa-tractor fa-4x"></i><br><br>
            <p>Total Equipments: <?php echo $equipments_result['total_equipments']; ?></p>
            <a href="../equipment/equipment.php"> <button type="submit">Equipment Data</button></a>
    </div>
    <div class="analysis-section">
    <i class="fas fa-cow fa-4x"></i><br><br>
            <p>Total Livestock:  <?php echo $livestock_result['total_livestock']; ?></p>
            <a href="../livestock/livestock.php"> <button type="submit">Livestock Data</button></a>
    </div>
    <div class="analysis-section">
    <i class="fas fa-seedling fa-4x"></i><br><br>
            <p>Total Pesticides:  <?php echo $pesticides_result['total_pesticides']; ?></p>
            <a href="../pesticides/pesticides.php"> <button type="submit">Pesticides Data</button></a>
    </div>

    <div class="report-button">
    <a href="../report/generate_pdf_report.php">
        <button class="report-btn" type="button">
            <i class="fas fa-file-pdf"></i>
        </button>
    </a>
</div>






</main>


</body>
</html>