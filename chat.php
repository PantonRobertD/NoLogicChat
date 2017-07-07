<?php
/*
 NedChat - Version 1.05

 Copyright (c) 2016, http://nedfile.nl

 This Chat script was created by Admin / NedFile.
 
Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the nedfile.nl nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING,  BUT NOT LIMITED TO,  THE 
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS  FOR A PARTICULAR PURPOSE 
ARE DISCLAIMED. IN  NO  EVENT  SHALL  NEDFILE.NL  BE LIABLE FOR ANY DIRECT, 
INDIRECT,   INCIDENTAL,   SPECIAL,  EXEMPLARY,  OR  CONSEQUENTIAL   DAMAGES 
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND 
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR  TORT 
(INCLUDING  NEGLIGENCE  OR  OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF 
THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
ob_start();
?>

<link rel="stylesheet" type="text/css" href="style/chatstyle.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/animatedcollapse.js"></script>
<script type="text/javascript" src="draw/signature.js"></script>
<script type="text/javascript" src="js/alert-main.js"></script>
<link rel="stylesheet" type="text/css" href="js/alert-style.css" />


<script type="text/javascript">
    function abc() {
	
	addSmile('*UpL-e7a3*', 'adchat')
       
    }
   </script>


<script type="text/javascript">
animatedcollapse.addDiv('drawing', 'optional_attribute_string');

//additional addDiv() call...
animatedcollapse.init()
</script>

<script type="text/javascript">

function closechat()
{
     window.location="index.php";
	
	}
</script>


<div id="chatarea">

<div style="display:none"  id="content3"></div>

 <div id="chatrooms" style="background-color:#6E84B4">
 
<?php
        if (isset($_POST['submitBtn'])){

      $name  = isset($_POST['name']) ? $_POST['name'] : "Unnamed";
	   
      $_SESSION['username'] = $name;
	  
	  $avatar = $_POST['ava'];
	  $avatarfoto = $_POST['avatar'];
	  if ($avatar == '1'){$avatar = "<img src=\"uploads/$avatarfoto\">";}
	  if ($avatar == '2'){$avatar = "<img src=\"images/ava/ava2.jpg\">";}
	  if ($avatar == '3'){$avatar = "<img src=\"images/ava/ava3.jpg\">";}
	  if ($avatar == '4'){$avatar = "<img src=\"images/ava/ava4.jpg\">";}
	  if ($avatar == '5'){$avatar = "<img src=\"images/ava/ava5.jpg\">";}
	  if ($avatar == '6'){$avatar = "<img src=\"images/ava/ava6.jpg\">";}
	  if ($avatar == '7'){$avatar = "<img src=\"images/ava/ava7.jpg\">";}
	  if ($avatar == '8'){$avatar = "<img src=\"images/ava/ava8.jpg\">";}
	  if ($avatar == '9'){$avatar = "<img src=\"images/ava/ava9.jpg\">";}
	  if ($avatar == '10'){$avatar = "<img src=\"images/ava/ava10.jpg\">";}
	  if ($avatar == '11'){$avatar = "<img src=\"images/ava/ava11.jpg\">";}
	  if ($avatar == '12'){$avatar = "<img src=\"images/ava/ava12.jpg\">";}
	  if ($avatar == '13'){$avatar = "<img src=\"images/ava/ava13.jpg\">";}
      if ($avatar == '14'){$avatar = "<img src=\"images/ava/ava14.jpg\">";}
	  if ($avatar == '15'){$avatar = "<img src=\"images/ava/ava15.jpg\">";}
	  if ($avatar == '16'){$avatar = "<img src=\"images/ava/ava16.jpg\">";}
	  if ($avatar == '17'){$avatar = "<img src=\"images/ava/ava17.jpg\">";}
	  if ($avatar == '18'){$avatar = "<img src=\"images/ava/ava18.jpg\">";}
	  if ($avatar == '19'){$avatar = "<img src=\"images/ava/ava19.jpg\">";}
	  if ($avatar == '20'){$avatar = "<img src=\"images/ava/ava20.jpg\">";}
	  if ($avatar == '21'){$avatar = "<img src=\"images/ava/ava21.jpg\">";}
	  if ($avatar == '22'){$avatar = "<img src=\"images/ava/ava22.jpg\">";}
	  if ($avatar == '23'){$avatar = "<img src=\"images/ava/ava13.jpg\">";}
	  if ($avatar == '24'){$avatar = "<img src=\"images/ava/ava24.jpg\">";}
	  if ($avatar == '25'){$avatar = "<img src=\"images/ava/ava25.jpg\">";}
	  if ($avatar == '26'){$avatar = "<img src=\"images/ava/ava26.jpg\">";}
	  if ($avatar == '27'){$avatar = "<img src=\"images/ava/ava27.jpg\">";}
      if ($avatar == '28'){$avatar = "<img src=\"images/ava/ava28.jpg\">";}
	  if ($avatar == '29'){$avatar = "<img src=\"images/ava/ava29.jpg\">";}
	  if ($avatar == '30'){$avatar = "<img src=\"images/ava/ava30.jpg\">";}
	  if ($avatar == '31'){$avatar = "<img src=\"images/ava/ava31.jpg\">";}
	  
}

$avadecode = htmlentities($avatar);

setcookie("avatar1", $avadecode);

include('chatfiles/setchat.php');

?>

<div style="height:40px">
<table border="0" width="100%">
	<tr>
		<td width="220">&nbsp;&nbsp;<img src="images/chaticon1.png" height="37" align="absmiddle"  border="0"/>&nbsp;&nbsp;<font size="5" color="#DADADA" face="Arial, Helvetica, sans-serif"><b>NedChat</b></font></td>
		<td alt=" Sound On/Off " title=" Sound On/Off " style="cursor:pointer" onclick="setPlayBeep(playbeep)" onMouseOver="this.style.background='#8598C0'" onMouseOut="this.style.background=''" width="60"><img src="sound/playbeep2.png" align="absmiddle" height="23" border="0"  name="playbeep" id="playbeep" /><span id="chatbeep"></span></td>
		<td alt=" go Offline " title=" go Offline " style="cursor:pointer" onclick="delCookie('name_c')" onMouseOver="this.style.background='#8598C0'" onMouseOut="this.style.background=''" align="center" width="60"><img src="images/offline.png"   height="27"  border="0" align="absmiddle"/></td>
		<td alt=" Delete all Messages " title=" Delete all Messages " id="empty" style="cursor:pointer" onMouseOver="this.style.background='#8598C0'" onMouseOut="this.style.background=''" align="center" width="60"><img src="images/trashcan.png"  height="25"   border="0" align="absmiddle" /></td>
		<td alt=" Upload Image " title=" Upload Image " id="searchlink" rel="subcontent" style="cursor:pointer" onMouseOver="this.style.background='#8598C0'" onMouseOut="this.style.background=''" align="center" width="60"><img src="images/upload.png" align="absmiddle"  border="0" height="27" /></td>
		
		<td width="140">&nbsp;</td>
		
	
		<td>&nbsp;</td>
		<td align="right"><img id="logout" src="images/logout1.png" style="cursor:pointer" border="0" height="15"  alt=" Logout "  title=" Logout " />&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>

</div>


<div style="display:none"><?php echo $chatS->chatRooms();  // add the chat rooms ?></div>
 </div>
 
 
 <DIV id="subcontent" style="position:absolute; visibility:hidden; border:3px solid orange; background-color:#E9E9E9; width:550px; height:355px; padding:0px; margin-left:100px;">

<div><iframe id="myFrame" src="userload/usersubmit.php" WIDTH="550" HEIGHT="320"  scrolling="no"  frameborder="0" ></iframe></div>

<div style=" vertical-align:bottom; background-color:#E9E9E9; height:30px; padding-top:3px; padding-right:3px" align="right">
<a href="javascript:dropdowncontent.hidediv('subcontent')"><img src="images/close-icon1.png" border="0" width="24"></a>
</div>


</DIV>
 
 
<div id="chatwindow">
 
 <table border="0" width="100%">
	<tr>
		<td ><div id="chats"></div></td>
		
		
		
		<td width="120" valign="top"><div id="chatlogd" style="background-image:url(images/bgchat3.jpg)"><font style="font-weight:500; color:#963636">Logged in as:</font></div>
 <div id="chatusersPic">
 
 <div align="center" style="padding-top:12px;"><div style="border:solid 1px #B1B1B1; padding:8px; width:50px; background-color:#E6E6E6"><?php echo "$avatar" ; ?></div>
 <div id="chatusrname"><?php echo "$name"; ?></div><br>
 </div>
 </div>
 <div style="background-image:url(images/bgchat3.jpg);" id="chatonline"><font style="font-weight:500; color:#963636">Online</font></div>

 <div id="chatusers" ></div></td>
 </tr>
</table>
 </div>
  

 <div style=" height:160px"><?php echo $chatS->chatForm().jsTexts($lsite); ?></div>
 
 
 
 <script type="text/javascript" src="chatfiles/chatfunctions.js"></script>
<div style="height:14px; background-image:url(images/bgchat2.jpg)"></div>
</div>

<script type="text/javascript">
			
		$(document).ready( function() {
						
		$("img#logout").click( function() {
			jConfirm('Goodbye <?php echo "$name"; ?>!<br>Are you sure you want to leave the Chat?<br>&nbsp;', 'Message',
			function (r) {
                    if( r )
                     closechat();
					  
		});
		});
					
	});
	
	$(document).ready( function() {
						
		$("td#empty").click( function() {
			jConfirm('All posts from the Chat will be deleted.<br>Are you sure?<br>&nbsp;', 'Message',
			function (r) {
                    if( r )
                     $('#content3').load('chatfiles/emptychat.php');
					  
		});
		});
					
	});
		
</script>