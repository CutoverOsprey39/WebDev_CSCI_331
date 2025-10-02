<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet'>
    <title>Results</title>
    
    <style>
    table{
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-family: 'Kaushan Script', cursive;
    }   
    th,td{
        border: 1px solid #444444;
        padding 10px;
        text-align: left;
    } 
    th{
        background-color: gold;
        color: black;
        font-size: 125%;
    }
    tr:nth-child(even) {
        background-color: #F1F2F3;
    }
    h1, p{
        text-align: center;
    }
    </style>

</head>

<body>
    <h1>Form Results</h1>
    <?php
    /* The form submission is collected in a PHP array called $_GET or $_POST */
    echo "<p>Here is the start of a form viewer: a PHP array of name/value pairs.</p>";
    $formData = $_GET ?: $_POST;

    if ($formData){
        echo "<table>";
        echo "<tr><th>Key</th><th>value</th></tr>";

        foreach ($formData as $key => $value) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($key) . "</td>";
            //for multiselect array values
            if (is_array($value)) {
                //joins strings for one cell for extras
                echo "<td>" . implode("<br>", array_map('htmlspecialchars',$value)) . "</td>";
            } else{
                //uses single values for cells
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else{
        echo "<p>No form data submitted.</p>";
    }
    /* variables do not need to be separated this is here in case I want to make 'get' or 'post' to do separate things later
    if ($_GET) {
        echo "<h2>GET Array:</h2>";
        print_r($_GET);
    }
    if ($_POST) {
        echo "<h2>POST Array:</h2>";
        print_r($_POST); 
    }
        */
    ?>

    <!-- TODO: Going need a table here: All the key/vaule pairs from the form.   -->


</body>

</html>