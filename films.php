<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;   
        }
        .wrapper{
            overflow: hidden;
        }
        .content{
            padding: 0 10px;
        }
        .container{
            max-width: 600px;
            margin: 0 auto;
        }
        body{
            font-family: sans-serif;
            font-size: 16px;
        }

        h2{
            text-align: center;
            padding: 40px 0 20px 0;
            font-weight: 400;
        }

        h2.message{
            color: #9A2222;
        }

        .search_value{
            font-weight: 700;
            font-size: 1.05em;
        }

        table{
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        table th, table td{
            padding: 10px 30px 10px 10px;
            text-align: left;
            min-width: 120px;
        }

        table tr{
            border-bottom: 1px solid #BEBEBE;
        }

        table tr:first-child{
            background-color: transparent;
            border-bottom: 2px solid #BEBEBE;
            border-top: 1px solid #BEBEBE;
        }

        table tr:last-child{
            border-bottom: none;
        }
    </style>
</head>
<body>
<?php 
    $films = [
        "Martin Scorsese" => [
            [
                "name" => "Goodfellas",
                "year" => 1990
            ],
            [
                "name" => "Shutter Island",
                "year" => 2010
            ]
        ],
        "Steven Spielberg" => [
            [
                "name" => "The Terminal", 
                "year" => 2004
            ],
            [
                "name" => "Jaws", 
                "year" => 1975
            ]
        ],
        "James Cameron" => [
            [
                "name" => "	Terminator 2: Judgment Day",
                "year" => 1991
            ],
            [
                "name" => "Titanic", 
                "year" => 1997
            ]
        ]
    ];

    function search($array, $data){
        $result = [];

        foreach ($array as $director => $films) {
            if (stristr($director, $data)) $result[$director] = [];
            foreach ($films as $film_index => $film_array) {
                foreach ($film_array as $key => $val) {
                    if (stristr(strval($val), strval($data))) $result[$director][] = $film_index;
                }
            } 
        }

        foreach ($result as $director => &$films) {
            if (empty($films)) $result[$director] = $array[$director];
            else $films = array_intersect_key($array[$director],array_unique(array_flip($films)));
        }

        return $result;
    }

    function print_table($array){
        if (!empty($array)){
            echo "<table><tr><th>Film</th><th>Year</th><th>Director</th></tr>";
            array_walk($array, "walk");
            echo "</table>";
        }
        else{
            echo "<h2 class='message'>No matching results...</h2>";
        }
    }

    function walk($dir, $dir_key){
        foreach ($dir as $film_key => $film_value) {
            echo "<tr>";
            foreach ($film_value as $key => $val) {
                echo "<td>$val</td>";
            }
            echo "<td>$dir_key</td></tr>";
        }
    }
?>

<div class="wrapper">
    <main class="content">
        <div class="container">
            <h2>Search value: <span class='search_value'><?=$search_val='Martin'?></span></h2>
            <?=print_table(search($films, $search_val))?>
            <h2>Search value: <span class='search_value'><?=$search_val='19'?></span></h2>
            <?=print_table(search($films, $search_val))?>
            <h2>Search value: <span class='search_value'><?=$search_val='The'?></span></h2>
            <?=print_table(search($films, $search_val))?>
            <h2>Search value: <span class='search_value'><?=$search_val='Gladiator'?></span></h2>
            <?=print_table(search($films, $search_val))?>
        </div>
    </main>
</div>

</body>
</html>

