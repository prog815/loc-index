<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

echo "привет всем" ;

$link = mysqli_connect('mysql', 'user', 'mypassword','loc-poisk') or die('Не удалось соединиться: ' . mysqli_error()) ;

// mysql_select_db('loc-poisk') or die('Не удалось выбрать базу данных') ;

$query = 'SELECT * FROM files';
$result = mysqli_query($link,$query) or die('Запрос не удался: ' . mysqli_error()) ;

echo "<table>\n";
while ($line = mysqli_fetch_array($result)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

mysqli_free_result($result);

mysqli_close($link);

    ?>


    
</body>
</html>