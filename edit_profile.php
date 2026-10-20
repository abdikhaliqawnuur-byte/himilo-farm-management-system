<?php
require_once ("db/connection.php");

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Similar to the update_profile.php script
    // ...

    // After updating, redirect back to profile page
    header("location: profile.php");
    exit();
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    /* background-image: url("Himilo.jpg");
    background-repeat: center; 
 
} */

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
    max-width: 130px; /* Adjust the max-width as per your preference */
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
    display: block;
    padding: 15px 20px;
    transition: background-color 0.2s ease;
    display: flex;
    align-items: center;
}

.sidebar-nav a i {
    margin-right: 10px;
}



main {
    margin-left: 250px;
    padding: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}


.user-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            background-color: white;
            /* width: 50%; */
            margin-left: 350px;
            max-width: 500px;
            padding: 100px;
            border-radius: 20px;
            

        }

        .user-profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #4CAF50;
        }

        .user-profile h2 {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .user-profile p {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .edit-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .edit-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .edit-form {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .edit-form input {
            padding: 5px;
            margin: 5px;
            width: 80%;
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
        <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="crops/crops.php"><i class="fa-solid fa-carrot"></i> Crops</a></li>
        <li><a href="equipment/equipments.php"><i class="fa-solid fa-tractor"></i> Equipments</a></li>
        <li><a href="employee/employee.php"><i class="fas fa-users"></i> Employee</a></li>
        <li><a href="livestock/livestock.php"><i class="fas fa-cow"></i> Livestock</a></li>
        <li><a href="pesticides/pesticides.php"><i class="fas fa-seedling"></i> Pesticides</a></li>
        <li><a href="../generate_report.php"><i class="fas fa-file-pdf"></i> Generate Report</a></li>
        <li><a href="profile.php"class="active"><i class="fas fa-user"></i> Profile</a></li>
        <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</nav>

<main>
        <h2>Edit Profile</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?= $user['username'] ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>
            <button type="submit">Update Profile</button>
        </form>
    </main>


    <script>
        const editButton = document.getElementById("editButton");
        const editForm = document.getElementById("editForm");

        editButton.addEventListener("click", () => {
            editForm.style.display = "block";
            editButton.style.display = "none";
        });
    </script>


</body>
</html>
