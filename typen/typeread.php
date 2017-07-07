<?php

$curchatter = $_GET['name'];    

$file = 'people.txt';

// Open the file to get existing content
$text = file_get_contents($file);

if ($text == $curchatter){

} else {


if ($text) {

echo "<div align=\"center\" ><img src=\"images/smilie2.gif\" height=\"17\" border=\"0\" /><br><span class=\"chatusr2\">$text</span><br> <font face=\"Arial\" size=\"2\" color=\"#424242\">is typing</font></div>";

}
};


?>



