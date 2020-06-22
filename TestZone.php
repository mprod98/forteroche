
<?php
$date = date("d-m-Y");
$heure = date("H:i");
Print("Nous sommes le $date et il est $heure");




date_default_timezone_set('Europe/Paris');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Le décalage horaire du script diffère du décalage horaire défini dans le fichier ini.';
} else {
    echo 'Le décalage horaire du script est équivalent à celui défini dans le fichier ini.';
}
echo $script_tz;
$db = new PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
echo timezone_offset_get('Asia/Taipei','Europe/Paris');
$db->query ("SET GLOBAL time_zone='Europe/Paris'");
foreach ($db->query ("select CONVERT_TZ(NOW(),'+00:00','+02:00')") as $key => $value) {
   var_dump($value);
};

/*$req = $db->prepare('UPDATE posts SET title = ?, content=?, creation_date= ADDTIME (NOW(), "2:00")  WHERE `posts`.`id` = ?');
$affectedLines = $req->execute(array($_POST['title'], $_POST['chapterContent'], $postId));*/
?>

