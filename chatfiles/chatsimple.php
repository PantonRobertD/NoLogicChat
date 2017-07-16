<?php
/*
 NedChat - Version 1.05
 Copyright (c) 2016, http://nedfile.nl
 This Chat script was created by Admin / NedFile.
 */
 
class ChatSimple {
  public $maxrows = 30000;
  public $chatrooms = array();            // for chat rooms
  public $chatroomcnt = '';               // store chat room content

  protected $lsite = array();              // will contains the texts in the defined language
  protected $chatdir = 'chattxt';         // directory that store TXT files for chat
  protected $fileroom;                    // store the file of current chat room
  protected $chatuser = '';               // store user name
  protected $chatadd = 1;                

  // constructor (receives the array with chat rooms)
  public function __construct($chatrooms) {
    // set properties value
    $this->lsite = $GLOBALS['lsite'];
    $this->chatrooms = $chatrooms;
    if(defined('CHATADD')) $this->chatadd = CHATADD;
    if(defined('CHATDIR')) $this->chatdir = (basename(dirname($_SERVER['PHP_SELF'])) == 'chatfiles') ? '../'.CHATDIR : CHATDIR;
    if(defined('MAXROWS')) $this->maxrows = MAXROWS;

    $this->fileusers = $this->chatdir.'/chatusers.txt';
    $this->fileroom = isset($_POST['chatroom']) ? ($this->chatdir.'/'.trim(strip_tags($_POST['chatroom'].'.txt'))) : ($this->chatdir.'/'.$this->chatrooms[0].'.txt');

    // sets current chat user with the name added in form, and calls the method to set $chatroomcnt
    if(isset($_POST['chatuser'])) $this->chatuser = trim(htmlentities($_POST['chatuser'], ENT_NOQUOTES, 'utf-8'));
    $this->chatroomcnt = $this->setChatRoomCnt();

    // if data from the form to add chat, output chat room content
    if(isset($_POST['chatuser'])) echo $this->chatroomcnt;
  }

  // returns the HTML code with chat rooms
  public function chatRooms() {
    $nrooms = count($this->chatrooms);
    $chatrooms = '';
    if($nrooms > 0) {
      for($i=0; $i<$nrooms; $i++) {
        $id = ($i==0) ? 'id="s_room"' : '';
        $chatrooms .= '<span class="chatroom" '.$id.' onclick="setChatRoom(this)">'.$this->chatrooms[$i].'</span>';
      }
    }
    else $chatrooms = '<span><b> &nbsp; &nbsp; - Chat</span>';

    return $chatrooms;
  }


  // include the form to add text in chat room, or messaje to Logg in (if $chatuser false, and $chatadd not 1)
  public function chatForm() {
    if($this->chatadd !== 1) {
      if(defined('CHATUSER')) include('chatform.php');
      else echo $this->lsite['chatlogged']; 
    }
    else include('chatform.php');
  }

  // returns array with online users in chat, in last 7 sec.
  protected function getChatUsers($users) {
    $regtime = time();  $reusr = array();

    // if users, traverses the arrsy and stores the users in last 7 sec.
    if(count($users) > 0) {
      foreach($users as $t=>$usr) {
        if($usr == $this->chatuser) continue;
        else if(intval($t) > ($regtime - 8)) $reusr[$t] = $usr;
      }
    }

    // adds current user in list
    if($this->chatuser !== '') $reusr[$regtime] = $this->chatuser;

    $reusr = array_unique($reusr);
    return $reusr;
  }

  // adds HTML code with chat text in TXT file
  protected function setChatRoomCnt() {
    $chatrows = array('time'=>'', 'users'=>array(), 'chats'=>array(array('user'=>'', 'date'=>'', 'chat'=>'')));       // stores chat room data

    // if file for current chat room exists, gets its content, else, display 'no chat', and current user
    if(file_exists($this->fileroom)) {
      $getchats = file_get_contents($this->fileroom);
      if(strlen($getchats) > 11) $chatrows = json_decode($getchats, true);
      $chatrows['users'] = $this->getChatUsers($chatrows['users']);         // get the list with online users

      // if access to add new chat text
      if(isset($_POST['adchat'])) {
        $adchat = trim(htmlentities($_POST['adchat'], ENT_NOQUOTES, 'utf-8'));     // Transform HTML characters, and delete external whitespace
		
		
		// Get the last drawImage from draw/images file
		
		$dir = '../draw/images/';
          $base_url = '../nedchat/draw/images';
          $newest_mtime = 0;
          $show_file = 'BROKEN';
        if ($handle = opendir($dir)) {
           while (false !== ($file = readdir($handle))) {
        if (($file != '.') && ($file != '..')) {
            $mtime = filemtime("$dir/$file");
       if ($mtime > $newest_mtime) {
          $newest_mtime = $mtime;
          $show_file = "$base_url/$file";
       }
    }
  }
}
	
	 // Get the last uploadImage from userload/useruploads file
		
		$dir2 = '../userload/useruploads/';
          $base_url2 = '../nedchat/userload/useruploads';
          $newest_mtime2 = 0;
          $show_file2 = 'BROKEN';
        if ($handle2 = opendir($dir2)) {
           while (false !== ($file2 = readdir($handle2))) {
        if (($file2 != '.') && ($file2 != '..')) {
            $mtime2 = filemtime("$dir2/$file2");
       if ($mtime2 > $newest_mtime2) {
          $newest_mtime2 = $mtime2;
          $show_file2 = "$base_url2/$file2";
       }
    }
  }
}
	
	 // Begin BBCode for url 	
	  $adchat = preg_replace('/(\[url=)(.*?)(\])(.*?)(\[\/url\])/','<a href="$2" target="_blank">$4</a>',$adchat);
      $adchat = preg_replace('/(\[url\])(.*?)(\[\/url\])/','<a href="$2" target="_blank">$2</a>',$adchat);
     
	 
	 // Begin BBCode  	
	
	 $adchat = str_replace('[b]','<strong>',$adchat);
	 $adchat = str_replace('[/b]','</strong>',$adchat);
	 
	  $adchat = str_replace('[i]','<i>',$adchat);
	 $adchat = str_replace('[/i]','</i>',$adchat);
	 
	 $adchat = str_replace('[u]','<u>',$adchat);
	 $adchat = str_replace('[/u]','</u>',$adchat); 
	 
	
      // end mod BBcode  	 
	 
		
		$adchat = str_replace('*Draw-a6e2*','<img src="' .$show_file. '" alt="Drawing" height="50">',$adchat);
		$adchat = str_replace('*UpL-e7a3*','<img src="' .$show_file2. '" alt="Upload" >',$adchat);
		
		 $adchat = str_replace('*z2*','<img src="images/smile/z2.gif">',$adchat);
         $adchat = str_replace('*z1*','<img src="images/smile/z1.gif">',$adchat);
		 $adchat = str_replace('*z4*','<img src="images/smile/z4.gif">',$adchat);
         $adchat = str_replace('*z5*','<img src="images/smile/z5.gif">',$adchat);
         $adchat = str_replace('*z6*','<img src="images/smile/z6.gif">',$adchat);
		 $adchat = str_replace('*z7*','<img src="images/smile/z7.gif">',$adchat);
         $adchat = str_replace('*z12*','<img src="images/smile/z12.gif">',$adchat);
         $adchat = str_replace('*z13*','<img src="images/smile/z13.gif">',$adchat);
		 $adchat = str_replace('*z14*','<img src="images/smile/z14.gif">',$adchat);
         $adchat = str_replace('*z15*','<img src="images/smile/z15.gif">',$adchat);
         $adchat = str_replace('*z16*','<img src="images/smile/z16.gif">',$adchat);
	     $adchat = str_replace('*ca*','<img src="images/smile/ca.gif">',$adchat);
         $adchat = str_replace('*b5*','<img src="images/smile/b5.gif">',$adchat);
         $adchat = str_replace('*z8*','<img src="images/smile/z8.gif">',$adchat);
		 $adchat = str_replace('*z9*','<img src="images/smile/z9.gif">',$adchat);
         $adchat = str_replace('*l28*','<img src="images/smile/l28.gif">',$adchat);
         $adchat = str_replace('*c1*','<img src="images/smile/c1.gif">',$adchat);
         $adchat = str_replace('*c2*','<img src="images/smile/c2.gif">',$adchat);
         $adchat = str_replace('*c3*','<img src="images/smile/c3.gif">',$adchat);
		 $adchat = str_replace('*c4*','<img src="images/smile/c4.gif">',$adchat);
         $adchat = str_replace('*c6*','<img src="images/smile/c6.gif">',$adchat);
		 $adchat = str_replace('*c7*','<img src="images/smile/c7.gif">',$adchat);
         $adchat = str_replace('*c8*','<img src="images/smile/c8.gif">',$adchat);
         $adchat = str_replace('*c9*','<img src="images/smile/c9.gif">',$adchat);
		 $adchat = str_replace('*d1*','<img src="images/smile/d1.gif">',$adchat);
         $adchat = str_replace('*d2*','<img src="images/smile/d2.gif">',$adchat);
         $adchat = str_replace('*d3*','<img src="images/smile/d3.gif">',$adchat);
		 $adchat = str_replace('*d4*','<img src="images/smile/d4.gif">',$adchat);
         $adchat = str_replace('*d5*','<img src="images/smile/d5.gif">',$adchat);
		 $adchat = str_replace('*d6*','<img src="images/smile/d6.gif">',$adchat);
         $adchat = str_replace('*d7*','<img src="images/smile/d7.gif">',$adchat);
         $adchat = str_replace('*d8*','<img src="images/smile/d8.gif">',$adchat);
         $adchat = str_replace('*n1*','<img src="images/smile/n1.gif">',$adchat);
         $adchat = str_replace('*n2*','<img src="images/smile/n2.gif">',$adchat);
         $adchat = str_replace('*m1*','<img src="images/smile/m1.gif">',$adchat);
         $adchat = str_replace('*m2*','<img src="images/smile/m2.gif">',$adchat);
         $adchat = str_replace('*m3*','<img src="images/smile/m3.gif">',$adchat);
         $adchat = str_replace('*m4*','<img src="images/smile/m4.gif">',$adchat);
         $adchat = str_replace('*m5*','<img src="images/smile/m5.gif">',$adchat);
         $adchat = str_replace('*m6*','<img src="images/smile/m6.gif">',$adchat);
		 $adchat = str_replace('*m7*','<img src="images/smile/m7.gif">',$adchat);
         $adchat = str_replace('*m8*','<img src="images/smile/m8.gif">',$adchat);
         $adchat = str_replace('*m9*','<img src="images/smile/m9.gif">',$adchat);
		 $adchat = str_replace('*m10*','<img src="images/smile/m10.gif">',$adchat);
         $adchat = str_replace('*m11*','<img src="images/smile/m11.gif">',$adchat);
         $adchat = str_replace('*l8*','<img src="images/smile/l8.gif">',$adchat);
		 $adchat = str_replace('*l9*','<img src="images/smile/l9.gif">',$adchat);
         $adchat = str_replace('*l10*','<img src="images/smile/l10.gif">',$adchat);
		 $adchat = str_replace('*l11*','<img src="images/smile/l11.gif">',$adchat);
		 $adchat = str_replace('*l12*','<img src="images/smile/l12.gif">',$adchat);
		 $adchat = str_replace('*l14*','<img src="images/smile/l14.gif">',$adchat);
         $adchat = str_replace('*l15*','<img src="images/smile/l15.gif">',$adchat);
         $adchat = str_replace('*l16*','<img src="images/smile/l16.gif">',$adchat);
         $adchat = str_replace('*l17*','<img src="images/smile/l17.gif">',$adchat);
         $adchat = str_replace('*l18*','<img src="images/smile/l18.gif">',$adchat);
         $adchat = str_replace('*l19*','<img src="images/smile/l19.gif">',$adchat);
		 $adchat = str_replace('*l22*','<img src="images/smile/l22.gif">',$adchat);
		 $adchat = str_replace('*l23*','<img src="images/smile/l23.gif">',$adchat);
         $adchat = str_replace('*l24*','<img src="images/smile/l24.gif">',$adchat);
		 $adchat = str_replace('*l25*','<img src="images/smile/l25.gif">',$adchat);
		 $adchat = str_replace('*l26*','<img src="images/smile/l26.gif">',$adchat);
		 $adchat = str_replace('*l27*','<img src="images/smile/l27.gif">',$adchat);
		 $adchat = str_replace('*l29*','<img src="images/smile/l29.gif">',$adchat);
		 $adchat = str_replace('*a1*','<img src="images/smile/a1.gif">',$adchat);
		 $adchat = str_replace('*a2*','<img src="images/smile/a2.gif">',$adchat);
		 $adchat = str_replace('*a3*','<img src="images/smile/a3.gif">',$adchat);
		 $adchat = str_replace('*a4*','<img src="images/smile/a4.gif">',$adchat);
		 $adchat = str_replace('*a5*','<img src="images/smile/a5.gif">',$adchat);
		 $adchat = str_replace('*a6*','<img src="images/smile/a6.gif">',$adchat);
		 $adchat = str_replace('*a7*','<img src="images/smile/a7.gif">',$adchat);
		 $adchat = str_replace('*a8*','<img src="images/smile/a8.gif">',$adchat);
		 $adchat = str_replace('*a9*','<img src="images/smile/a9.gif">',$adchat);
		 $adchat = str_replace('*l5*','<img src="images/smile/l5.gif">',$adchat);
		 $adchat = str_replace('*l30*','<img src="images/smile/l30.gif">',$adchat);
		 $adchat = str_replace('*l131*','<img src="images/smile/l131.gif">',$adchat);
		 
		 
		 
		 

		
        if(get_magic_quotes_gpc()) $adchat = stripslashes($adchat);     // Removes slashes added by get_magic_quotes_gpc

        // set cookie for holding avatar url	
		$avatar2 = $_COOKIE ["avatar1"];    

		$avatar = html_entity_decode($avatar2);
		
		
		 // if text added, keep the last $maxrows rows, add the new chat data
        if(strlen($adchat)<1 || strlen($adchat)<801) {
          $chatrows['chats'] = array_slice($chatrows['chats'], -($this->maxrows));
		 
        $chatrows['chats'][] = array('user'=>$this->chatuser, 'date'=>date('H:i'), 'chat'=>$adchat, 'avat'=>$avatar);


          // if chat in 1st line is empty, remove 1st array with chat line data
          if($chatrows['chats'][0]['chat'] == '') array_shift($chatrows['chats']);
        }

        // sets chat room content
        $chatrows['time'] = time();
      }
    }

    // write the chat content in TXT file, returns $chatroomcnt, or message error
    $rechat = json_encode($chatrows);
    if(file_put_contents($this->fileroom, $rechat)) return $rechat;
    else return json_encode(array('error'=>sprintf($this->lsite['err_savechat'], $this->fileroom)));
  }
  
}
  
?>