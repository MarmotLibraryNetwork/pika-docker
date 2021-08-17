<!doctype html>
<?php
$link = mysqli_connect("database", "root", "marmot", "pika");
$dbMsg = "<p>";
if (!$link) {
    $dbMsg .= "Error: Unable to connect to MySQL." . PHP_EOL;
    $dbMsg .= "<br />Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    $dbMsg .= "<br />Debugging error: " . mysqli_connect_error() . PHP_EOL;
} else {
  $dbMsg .= "Success: A proper connection to MySQL was made! The docker database is great." . PHP_EOL;
  $dbMsg .= "<br />Host information: " . mysqli_get_host_info($link) . PHP_EOL;
}
$dbMsg .= "</p>";

mysqli_close($link);

$memcache = new Memcached();
$memcache->addServer('192.168.112.5', 11211);
$r = $memcache->add('test', 'test', 60);
$memcacheMsg = "<p>";
if (!$r) {
  $memcacheMsg .= "Error: Unable to connect to Memcached." . PHP_EOL;
  $memcacheMsg .= "<br />Debugging resultcode: " . $memcache->getResultCode() . PHP_EOL;
  $memcacheMsg .= "<br />Debugging resultmsg: " . $memcache->getResultMessage() . PHP_EOL;
}
$memcacheMsg .= "</p>";
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pika Docker Tests</title>
  <meta name="description" content="Test for Pika Docker instance">
  
  <link rel="stylesheet" 
        href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" 
        integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" 
        crossorigin="anonymous">
  <!-- link rel="stylesheet" href="css/styles.css" -->
</head>

<body>
<div class="pure-g" style="padding: 1em 3em 1em 3em;">
  <h1>Apache, PHP, MariaDB, Memcached, Solr, Java</h1>
  <div class="pure-u-1">
    <p><a href="phpinfo.php">PHP Info</a></p>
    <p><a href="http://localhost:8983/solr/#/">Solr Admin</a></p>
  </div>
  <div class="pure-u-1">
    <h3>Database Test</h3>
    <?= $dbMsg ?>
    <h3>Memcached Test</h3>
    <?= $memcacheMsg ?>
  </div>
</div> 
<!-- script src="js/scripts.js"></script -->
</body>
</html>