<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
    <style>
        body{
            background-color: #AAAAAA;
            margin: 0;
            padding: 15px;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #555555;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        h1 {
            color: #f2f2f2;
            text-align: center;
        }
        .success{
            color: #1bb12c;
        }
        .error{
            color:red;
        }
        .added{
            color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #1bb12c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        p {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User List</h1>

    <?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // See the contents of $_POST, submitted from index.html
    var_dump($_POST);

    // Collect input using POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = htmlspecialchars($_POST['first']);
        $lastname = htmlspecialchars($_POST['last']);
        $country = htmlspecialchars($_POST['country']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);

        echo "<p class='added'>Adding <strong>$firstname</strong>.</p>";

        // DATABASE OPERATIONS:   
        /*     
        $servername = "localhost";   // school server
        $username = "user50";        // get this from the email
        $password = "50dato";        // get this from the email 
        $dbname = "db50";            // get this from the email*/

        $servername = "localhost";   // local dev server
        $username = "root";        // get this from the email
        $password = "mysql";        // get this from the email 
        $dbname = "db50";            // get this from the email
        try {
            // Create a PDO connection (PHP Data Object)
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL and bind parameters
            $stmt = $conn->prepare("INSERT INTO randuser (first, last, country, phone, email) VALUES (:first, :last, :country, :phone, :email)");
            $stmt->bindParam(':first', $firstname); // bind firstname
            $stmt->bindParam(':last', $lastname); // bind lastname
            $stmt->bindParam(':country', $country);   // bind country 
            $stmt->bindParam(':phone', $phone);       // bind phone
            $stmt->bindParam(':email', $email);       // bind email
            

            echo "<div>";
            if ($stmt->execute()) {
                echo "<p class='success'> New record created successfully!</p>";
            } else {
                echo "<p class='error'>Error: Unable to create a new record.</p>";
            }
            echo "</div>";

            // Select and display all users from the database
            $sql = "SELECT first, last, country, phone, email FROM randuser";// MySQL: read every record from the table. Hint: https://www.w3schools.com/mysql/mysql_select.asp
            $result = $conn->query($sql);

            echo "<div>";
                echo "<table>";
                echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Country</th><th>Phone</th><th>Email</th></tr></thead><tbody>";

                // output data of each row
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>"; //headers for each column
                    echo "<td>" . htmlspecialchars($row['first']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['last']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['country']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            echo "</div>";

        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }

        // Close the connection
        $conn = null;

    } else {
        echo "<p>No data was submitted.</p>";
    }
    ?>
    </div>
</body>
</html>