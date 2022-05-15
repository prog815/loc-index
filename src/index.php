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
        $search = isset($_GET["search"]) ? $_GET["search"] : "" ;
        
     ?>

    <form action="index.php">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="искать">
    </form>

    <?php 

// echo "привет всем" ;

$link = mysqli_connect('mysql', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'),getenv('MYSQL_DATABASE')) or die('Не удалось соединиться: ' . mysqli_error()) ;

// mysql_select_db('loc-poisk') or die('Не удалось выбрать базу данных') ;

$where = trim(mysqli_real_escape_string($link,$search)) ;
if(!empty($where))
{
    $where = preg_replace('/[\s\t ]+/i',"%' AND path LIKE '%",$where) ;
    $where = " WHERE path LIKE '%{$where}%'" ;
    // echo $where ;
}

$query = "SELECT path FROM files{$where}";
$result = mysqli_query($link,$query) or die('Запрос не удался: ' . mysqli_error()) ;

echo "<table>\n";
while ($row = mysqli_fetch_array($result)) {
    echo "\t<tr>\n";
    
    echo "\t\t<td>$row[0]</td>\n";

    echo "\t</tr>\n";
}
echo "</table>\n";

mysqli_free_result($result);

mysqli_close($link);

    ?>


    
</body>
</html>