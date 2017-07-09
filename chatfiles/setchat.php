<?php

define('MAXROWS', 30000);     // Maximum number of rows registered for chat
define('CHATLINK', 1);     // allows links in texts (1), not allow (0)

// Here create the room for chat
$chatrooms = array();
$chatrooms[] = 'NedChat';


// do not edit
define('CHATADD', 0);
if(CHATADD !== 1) {
  if(isset($_SESSION['username'])) define('CHATUSER', $_SESSION['username']);
}

// Name of the directory in which are stored the TXT files for chat rooms
define('CHATDIR', 'chattxt');

include('texts.php');             // file with the texts for different languages
$lsite = $en_site;                // Gets the language for site

if(!headers_sent()) header('Content-type: text/html; charset=utf-8');         // header for utf-8

// include the class ChatSimple, and create objet from it
include('chatsimple.php');
$chatS = new ChatSimple($chatrooms);


?>