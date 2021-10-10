<?php
require('_dbconnect.php');

if(isset($_GET['query'])){
    $query = $_GET['query'];
    $search_sql = "SELECT * FROM `movies` WHERE moviename LIKE '%$query%' OR actor LIKE '%$query%' OR actress LIKE '%$query%' OR director LIKE '%$query%' OR year LIKE '%$query%'";
    $res = mysqli_query($conn,$search_sql) or die("Query Failed");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <ul>
    <?php
    $count=mysqli_num_rows($res);
    if($count==0)
    echo 'No Matching records found';
    else{
        while($rows= mysqli_fetch_assoc($res)){
            echo 
            '<span>Movie Name:'.$rows["moviename"].' </span><br>'.
            '<span>Actor Name:'.$rows["actor"].' </span><br>'.
            '<span>Actress Name:'.$rows["actress"].' </span><br>'.
            '<span>Released Year:'.$rows["year"].' </span><br>'.
            '<span> Director'.$rows["director"].' </span><br>';
        }
}
    ?>


    </ul>
</body>
</html>