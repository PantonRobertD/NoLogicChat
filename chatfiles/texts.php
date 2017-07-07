<?php
// Texts added in site 
$en_site = array(

  'no1online'=>'- no one Online',
  'notchat'=>' &bull; no Chats in the Chat',
  'enterchat'=>'<font color="#525252" size="3">Hi <b>%s</b></font><br><img src="./images/gachatten.gif" width="200" >',
  'err_textchat'=>'Text must be at least 2 charaters long.',
  'err_textchat2'=>'Text may be no longer than 800 charaters.'
);


// Sets an json object for JavaScript with text messages according to language set
function jsTexts($lsite) {
$texts = 'var texts = {
 
 "no1online":"'.$lsite['no1online'].'",
 "notchat":"'.$lsite['notchat'].'",
 "err_textchat":"'.$lsite['err_textchat'].'",
 "err_textchat2":"'.$lsite['err_textchat2'].'"
};';

  return '<script type="text/javascript"><!--'.PHP_EOL.
  $texts.PHP_EOL.
  '//-->
  </script>';
}
?>