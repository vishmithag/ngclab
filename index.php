<?php
require "_dbconnect.php";
$fetch_sql = "SELECT * FROM `movies`";
$res = mysqli_query($conn, $fetch_sql) or die("Query Failed");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    </style>
</head>

<body>
    <form action="search.php" method="get">
        <div class="form-item">
            <label for="search-query">Search </label>
            <input type="text" name="query" id="search-query">
        </div>
    </form>


    <h1>All Movies Data</h1>
    <table>
        <tr>
            <th>Movie Name</th>
            <th>Actor</th>
            <th>Actress</th>
            <th>Released Year</th>
            <th>Director</th>
        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($res)) {
            echo '<tr>
                    <td>' . $rows['moviename'] . '</td>
                    <td>' . $rows['actor'] . '</td>
                    <td>' . $rows['actress'] . '</td>
                    <td>' . $rows['year'] . '</td>
                    <td>' . $rows['director'] . '</td>
                </tr>';
        }
        ?>
    </table>

    <h1>Add a Movie</h1>
    <form action="insert.php" method="post" onsubmit="return validate()">
        <div class="form-item">
            <label for="movie-name">Movie name</label>
            <input type="text" name="movieName" id="movie-name" autofocus>
        </div>
        <div class="form-item">
            <label for="actor">Actor Name</label>
            <input type="text" name="actor" id="actor" autofocus>
        </div>
        <div class="form-item">
            <label for="actress">Actress Name</label>
            <input type="text" name="actress" id="actress" autofocus>
        </div>
        <div class="form-item">
            <label for="year">Released Year</label>
            <input type="text" name="year" id="year" autofocus>
        </div>
        <div class="form-item">
            <label for="director">Director Name</label>
            <input type="text" name="director" id="director" autofocus>
        </div>
        <input type="submit" value="Add">
    </form>


    <script>
        var movie = document.getElementById("movie-name")
        var actor = document.getElementById("actor")
        var actress = document.getElementById("actress")
        var year = document.getElementById("year")
        var director = document.getElementById("director")

        function validate() {
            if (movie.value == '' || actor.value == '' || actress.value == '' || year.value == '' || director.value == '') return false;
            return true;
        }
    </script>
</body>

</html>