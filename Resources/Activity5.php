<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 5</title>
    <style> 

* {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Garamond', serif;
}

.container {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    height: 100vh;
}

header {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 12%;
    background-color: #4F6F52;
    padding: .5rem;
    position: relative;
   border: 1px;
    margin-bottom: 10px;
    
}

table {
    margin: auto;
    text-align: center; 
    width: 80%; 
}
        
th {
    background-color: #75A47F; 
    color: white;
}
td:hover{
    background-color: grey;
}
        a{
            text-decoration: none;
            color: grey;
        }

.insertcontainer {
    height: 68%; 
    width: 25%;
    position: absolute;
    top: 12%; 
    right: 0; 
    background-color: #C6EBC5; 
    display:  relative;
    margin-bottom: 10px;
    justify-content: center; 
    align-items: center;
}

.tablecontainer {
    height: 69%; 
    width: 75%;
    background-color: white;
    overflow-y: auto;
    top: 12%; 
    left: 0;
    display:relative;
    justify-content: center; 
    align-items: center; 
}

.crudcontainer {
    height: 20%;
    width: 100%;
    background-color: rgba(1, 1, 1, 0.5); 
    display:flex;
    justify-content: center; 
    align-items: center; }

    
    .submit-button {
    padding: 5px 10px;
    background-color: #ADD8E6; 
    color: grey;
    text-align: right;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit-button:hover {
    background-color: #87CEEB; 
}

       
    </style>
</head>
<body>
    <div class="container">
        <header>
        <h1><i>Activity 5</i></h1>
    </header>
   

   <div class="insertcontainer">
       
            <div>
                
            <form method="post" action="">
                <div style="margin: 20px;">
                <p><b>Create Data:</b></p>
                <br>
                <div style=" background-color:  rgba(255, 255, 255, 0.3); padding: 10px; border-radius:5px">
               
                    <label for="name"><br>Name:</label>
                    <input type="text" name="name">
                    <br>
                    <label for="address"><br>Address:</label>
                    <input type="text" name="address">
                    <br>
                    <label for="age"><br>Age:</label>
                    <input type="text" name="age">
                    <br>
                    <label for="contactNo"><br>Contact No:</label>
                    <input type="text" name="contactNo">
                    <br>
                    <label for="guardianName"><br>Guardian Name:</label>
                    <input type="text" name="guardianName">
                    <br>
                    <label for="gender"><br>Gender:</label>
                    <input type="text" name="gender">

                    <br>
                <br>
                
</div>
<br>

<input type="submit" class="submit-button" name="Create" value="Submit">
                </div>
                
            </form>
        </div>

       <?php   
       if(isset($_POST['Create'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $contactNo = $_POST['contactNo'];
            $guardianName = $_POST['guardianName'];
            $gender = $_POST['gender'];

            
            $sql = "INSERT INTO information (name, address, age, contact_No, guardian_name, gender) 
                    VALUES ('$name', '$address', '$age', '$contactNo', '$guardianName', '$gender')";
            $result = mysqli_query($conn, $sql);

            if($result) {   
                echo "<script>alert('Data Inserted Successfully');</script>";
            } else {
                echo "<script>alert('Failed to insert data');</script>";
            }

            header("Location: Activity5.php");
        }?>
                
        </div>





        <div class="tablecontainer">
        <p><i>@Gerard Michael Virtucio</i></p>
                <?php 
            
            $sql = "SELECT * FROM information";       
            $result = mysqli_query($conn, $sql);

    
                echo "<table border = 1>";
                
         
                echo "<br><br>";
                echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Age</th><th>Contact No</th><th>Guardian Name</th><th>Gender</th></tr>";
            
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["Age"] . "</td>";
                    echo "<td>" . $row["Contact_No"] . "</td>";
                    echo "<td>" . $row["Guardian_Name"] . "</td>";
                    echo "<td>" . $row["Gender"] . "</td>";

                    echo "<td><a  href='?view=" . $row["ID"] . "' style='color: #6AD4DD;'>View</a></td>";
                    echo "<td><a  href='?Update=" . $row["ID"] . "' style='color: #8B93FF;'>Update</a></td>";
                    echo "<td><a  href='?delete=" . $row["ID"] . "' style='color: #E1ACAC;'>Delete</a></td>";
                
                
                    echo "</tr>";
                }
                echo "</table>";
                echo'<br><br><br><br><br><br>';
            
        
         
            
            
            ?>
            
        </div>

        
    <div class="crudcontainer">
    <?php 
        if (isset($_GET['view'])) {
            $view_id = $_GET['view'];
            
            echo "  <br><br>";
            $query = "SELECT * FROM information WHERE ID = $view_id";
            $view_info = mysqli_query($conn, $query);
            echo "<table border = 1 style='width: 35%;'>";

            echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Age</th><th>Contact No</th><th>Guardian Name</th><th>Gender</th></tr>";

            while ($row = mysqli_fetch_assoc($view_info)) {
                echo "<tr >";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>" . $row["Age"] . "</td>";
                echo "<td>" . $row["Contact_No"] . "</td>";
                echo "<td>" . $row["Guardian_Name"] . "</td>";
                echo "<td>" . $row["Gender"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        if (isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
    
            $query = "DELETE FROM information WHERE ID = $delete_id";
            $delete = mysqli_query($conn, $query);
            
        }
       
        
  
    if (isset($_GET['Update'])) {
        $update_id = $_GET['Update'];
    
      
        $query = "SELECT * FROM information WHERE ID = $update_id";
        $result = mysqli_query($conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
        
            $name = $row['Name'];
            $address = $row['Address'];
            $age = $row['Age'];
            $contactNo = $row['Contact_No'];
            $guardianName = $row['Guardian_Name'];
            $gender = $row['Gender'];
        } else {
            echo "No record found with the provided ID.";
        }
    

        echo '
       
        <form method="post">
        <div style="margin: 180px;">
        <p><b>Update Data: </b></p><br>
        <label for="name">Name:</label>
        <input type="text" name="name" value="' . $name . '">
    
        <label for="address">Address:</label>
        <input type="text" name="address" value="' . $address . '">
    
        <label for="age">Age:</label>
        <input type="text" name="age" value="' . $age . '">
    
        <label for="contactNo">Contact No:</label>
        <input type="text" name="contactNo" value="' . $contactNo . '">
    
        <label for="guardianName">Guardian Name:</label>
        <input type="text" name="guardianName" value="' . $guardianName . '">
    
        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="' . $gender . '"> <br><br>
        <input type="submit" class="submit-button" name="Update" value="Update">

        
    </div>
  
</form>
        ';


if (isset($_POST['Update'])) {
   
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $contactNo = $_POST['contactNo'];
    $guardianName = $_POST['guardianName'];
    $gender = $_POST['gender'];

  
    $update_id = $_GET['Update'];

    
    $query = "UPDATE information SET Name='$name', Address='$address', Age='$age', Contact_No='$contactNo', Guardian_Name='$guardianName', Gender='$gender' WHERE ID=$update_id";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Record updated successfully");</script>';
    } else {
        echo '<script>alert("Error updating record: ' . mysqli_error($conn) . '");</script>';
    }
 
echo '<script>window.location.href = "Activity5.php";</script>';
}

    } 

        
?>
 </div> 
    </div> 
        </body>
<html>  