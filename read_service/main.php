<?php
        echo "Entered";



//$connection = new PDO(getenv( or die("cant connect");
/*$db = mysql_select_db("TestDb", $connection);
$query = mysql_query("select * from entries", $connection)ii;
while ($row = mysql_fetch_array($query)) {
        echo $row['content'];
}*/

        $dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');

        if(!isset($dsn,$user) || false === $password){
                throw new Exception("Error Processing Request", 1);
        }


        $db = new PDO($dsn,$user,$password);

        if($db == null){
                echo "cant connect";
        }

        $statement = $db->prepare('select * from data');
        if($statement == null){
                echo "Cant create statement";
        }
        $statement->execute();
        $res = $statement->fetchAll();
echo "<table border='1'><tr><td>File name</td><td>Path</td></tr>";
        foreach ($res as $data) {
                echo "<tr><td>".$data['filename']."</td><td>".$data['path']."</td></tr>";
        }
        echo "</table><br><br>Bye";
?>