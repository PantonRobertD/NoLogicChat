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
?>

<script type="text/javascript" src="js/dropdowncontent.js">
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
 
 $(function(){
  $(document).ready(function(){
    $.ajaxSetup({cache: false});
  });
  getStatus();
});
 
// leest de Chatuser uit people.txt en loopt elke X sec.//
function getStatus() {
 
    $('div#status').load('typen/typeread.php?name=<?php echo urlencode($_SESSION['username']); ?>');
    setTimeout("getStatus()",3000);
}


// geeft de chstUser door aan people.txt //
function keydown()
{
    $("#content1").load("typen/typewrite.php?name=<?php echo urlencode($_SESSION['username']); ?>");
	
}

// na X (setTimeout hierboven) seconden delete de inhoud van people.txt //
function Contentoff()
{
    $("#content2").load("typen/typeclear.php");
}

</script>

<script type="text/javascript">
function setFocus(){

document.forms['inputtext'].elements['adchat'].focus();

 }
 
</script>

<script type="text/javascript">
function showingoff()
{

document.getElementById('showing').style.display = 'none';

}
</script>

 <script type="text/javascript">
 // counter welke na 7 sec startstop aanroept (delete is aan het typen) //
        var check = null;
        function startstop() {
           clearInterval(check);
            check = null;     
        
            if (check == null) {
                var cnt = 0;
                check = setInterval(function () {
                   cnt += 1;
                    // hoeveel sec tot delete .. wie typen?..//
                    if ( cnt == '4' )
               {
			   Contentoff();
               startstop();
               } 
                }, 1000);}            
        }
    </script>


 <DIV id="subcontent2" style="position: absolute; visibility: hidden; border: 7px solid  #8799C1; background-color: #FEF0DC; width: 350px; height: 200px; padding: 4px; margin-top:-150px; margin-left:150px;">


<body onLoad="InitThis(); enterChat();">
    
    <script type="text/javascript" src="js/jsdraw.js"></script>
	
    <div align="center">
	<div>
        <canvas id="myCanvas" width="320" height="80" style="border:2px solid gray; background-color:#F1F1F1"></canvas>
        <br /><br />
        
        Line thickness: <select id="selWidth">
            <option value="1">1</option>
            <option value="3" selected="selected">3</option>
			<option value="5">5</option>
            <option value="7">7</option>
            <option value="9">9</option>
            <option value="11">11</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp; 
        Color: <select id="selColor">
            <option value="black">black</option>
            <option value="blue">blue</option>
            <option value="red">red</option>
            <option value="green" selected="selected">green</option>
            <option value="yellow">yellow</option>
            <option value="gray">gray</option>
        </select> <br>
		<span id="dialog" style="display:none; margin-top:-66px; padding-left:50px; position:absolute;"><img src="images/tooltip7.gif"></span>
<br>
<button  class="formbutton" onClick="javascript:clearArea();return false;">Clear</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button  class="formbutton" onClick="addSmile('*Draw-a6e2*', 'adchat'); saveViaAJAX();">add Image</button>
    </div>
		
</div>
<br>
<div align="right" style="padding-top:7px; margin-right:-2px"><a href="javascript:dropdowncontent.hidediv('subcontent2')"><img src="images/close-icon1.png" border="0" width="24"></a></div>
</DIV>

<div align="center" style=" margin-top:-70px; margin-bottom:70px; margin-left:640px; height:40px; width:140px; text-align:center;" id="status"></div>

<form action="" name="inputtext" method="post" id="form_chat" onSubmit="return addChatS(this)">
<div id="name_code">
<?php
echo '<input type="hidden" name="chatroom" id="chatroom" value="'. $this->chatrooms[0]. '" />';

if(defined('CHATUSER')) {
  echo '<input type="hidden" name="chatuser" id="chatuser" value="'. CHATUSER. '" />
   <span id="enterchat" onclick="enterChat()">'.sprintf($this->lsite['enterchat'], CHATUSER).'<br><br></span>';
}

?>
</div>


 <div id="chatadd" style="padding-right:20px">
<div id="drawpop" style="display:none; margin-bottom:-30px; margin-top:1px; margin-left:20px;  position:absolute"><a href="#" id="contentlink" rel="subcontent2"><img src="images/icon-paint.png" border="0"></a></div>
  <div id="chatex" style="padding-right:3px">
 
<a  style="text-decoration:none" class="tooltip1" href="#">Text<span>
<img src="images/url.png" alt=" http://link " title=" http://link " onClick="addChatBIU('[url]','[/url]', 'adchat');" />
<img src="images/bold.png" alt=" vette tekst " title=" vette tekst " onClick="addChatBIU('[b]','[/b]', 'adchat');" />
  <img src="images/italic.png" alt=" tekst onderlijnen " title=" tekst onderlijnen " onClick="addChatBIU('[i]','[/i]', 'adchat');" />
  <img src="images/underline.png" alt=" tekst schuin " title=" tekst schuin " onClick="addChatBIU('[u]','[/u]', 'adchat');" />
</span></a>
 &nbsp;
  <img src="images/smile/af.gif"  onClick="addSmile('*a1*', 'adchat');" />
  <img src="images/smile/ag.gif"  onClick="addSmile('*a2*', 'adchat');" />
  <img src="images/smile/ab.gif"  onClick="addSmile('*a3*', 'adchat');" />
  <img src="images/smile/ai.gif"  onClick="addSmile('*a4*', 'adchat');" />
  <img src="images/smile/ao.gif"  onClick="addSmile('*a5*', 'adchat');" />
  <img src="images/smile/ap.gif"  onClick="addSmile('*a6*', 'adchat');" />
  <img src="images/smile/bb.gif"  onClick="addSmile('*a8*', 'adchat');" />
  <img src="images/smile/bh.gif"  onClick="addSmile('*a9*', 'adchat');" />
  <img src="images/smile/bm.gif"  onClick="addSmile('*b1*', 'adchat');" />
  <img src="images/smile/bn.gif"  onClick="addSmile('*b2*', 'adchat');" />
  <img src="images/smile/bp.gif"  onClick="addSmile('*b3*', 'adchat');" />
  <img src="images/smile/cb.gif"  onClick="addSmile('*b5*', 'adchat');" />
  <img src="images/smile/c1.gif"  onClick="addSmile('*c1*', 'adchat');" />
  <img src="images/smile/b9.gif"  onClick="addSmile('*b9*', 'adchat');" />
  <img src="images/smile/b7.gif"  onClick="addSmile('*b7*', 'adchat');" />
   &nbsp;
   
 <a  style="text-decoration:none" class="tooltip2" href="#">more<span>

<img src="images/smile/c3.gif" onClick="addSmile('*c3*', 'adchat')" />
<img src="images/smile/c4.gif" onClick="addSmile('*c4*', 'adchat')" />
<img src="images/smile/c5.gif" onClick="addSmile('*c5*', 'adchat')" />
<img src="images/smile/c6.gif" onClick="addSmile('*c6*', 'adchat')" />
<img src="images/smile/c7.gif" onClick="addSmile('*c7*', 'adchat')" /><br>
<img src="images/smile/at.gif" onClick="addSmile('*a7*', 'adchat')" />
<img src="images/smile/b8.gif" onClick="addSmile('*b8*', 'adchat')" />
<img src="images/smile/ca.gif" onClick="addSmile('*b4*', 'adchat')" />
<img src="images/smile/aw.gif" onClick="addSmile('*b6*', 'adchat')" />
<img src="images/smile/c2.gif" onClick="addSmile('*c2*', 'adchat')" />
<img src="images/smile/c8.gif" onClick="addSmile('*c8*', 'adchat')" />
<img src="images/smile/c9.gif" onClick="addSmile('*c9*', 'adchat')" />
<img src="images/smile/d1.gif" onClick="addSmile('*d1*', 'adchat')" />
<img src="images/smile/d2.gif" onClick="addSmile('*d2*', 'adchat')" />
<img src="images/smile/d3.gif" onClick="addSmile('*d3*', 'adchat')" />
<img src="images/smile/d4.gif" onClick="addSmile('*d4*', 'adchat')" />
<img src="images/smile/d5.gif" onClick="addSmile('*d5*', 'adchat')" />
<img src="images/smile/d6.gif" onClick="addSmile('*d6*', 'adchat')" />
<img src="images/smile/d7.gif" onClick="addSmile('*d7*', 'adchat')" />
<img src="images/smile/n1.gif" onClick="addSmile('*n1*', 'adchat')" />
<img src="images/smile/n2.gif" onClick="addSmile('*n2*', 'adchat')" />
<img src="images/smile/l1.gif" onClick="addSmile('*l1*', 'adchat')" />
<img src="images/smile/l2.gif" onClick="addSmile('*l2*', 'adchat')" />
<img src="images/smile/l3.gif" onClick="addSmile('*l3*', 'adchat')" />
<img src="images/smile/l4.gif" onClick="addSmile('*l4*', 'adchat')" />
<img src="images/smile/l5.gif" onClick="addSmile('*l5*', 'adchat')" />
<img src="images/smile/l6.gif" onClick="addSmile('*l6*', 'adchat')" />
<img src="images/smile/l8.gif" onClick="addSmile('*l8*', 'adchat')" />
<img src="images/smile/l7.gif" onClick="addSmile('*l7*', 'adchat')" />
<img src="images/smile/l9.gif" onClick="addSmile('*l9*', 'adchat')" />
<img src="images/smile/l10.gif" onClick="addSmile('*l10*', 'adchat')" />
<img src="images/smile/l11.gif" onClick="addSmile('*l11*', 'adchat')" />
<img src="images/smile/l12.gif" onClick="addSmile('*l12*', 'adchat')" />
<img src="images/smile/l13.gif" onClick="addSmile('*l13*', 'adchat')" />
<img src="images/smile/l14.gif" onClick="addSmile('*l14*', 'adchat')" />
<img src="images/smile/l15.gif" onClick="addSmile('*l15*', 'adchat')" />
<img src="images/smile/l16.gif" onClick="addSmile('*l16*', 'adchat')" />
<img src="images/smile/l17.gif" onClick="addSmile('*l17*', 'adchat')" />
<img src="images/smile/l18.gif" onClick="addSmile('*l18*', 'adchat')" />
<img src="images/smile/l19.gif" onClick="addSmile('*l19*', 'adchat')" />
<img src="images/smile/l20.gif" onClick="addSmile('*l20*', 'adchat')" />
<img src="images/smile/l21.gif" onClick="addSmile('*l21*', 'adchat')" />
<img src="images/smile/l22.gif" onClick="addSmile('*l22*', 'adchat')" />
<img src="images/smile/l23.gif" onClick="addSmile('*l23*', 'adchat')" />
<img src="images/smile/l24.gif" onClick="addSmile('*l24*', 'adchat')" />
<img src="images/smile/l25.gif" onClick="addSmile('*l25*', 'adchat')" />
<img src="images/smile/l26.gif" onClick="addSmile('*l26*', 'adchat')" />

</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
   
 </div>
 
 
  <input type="text" name="adchat" id="adchat" size="100" maxlength="800"  onkeydown="keydown()" onKeyUp="startstop()"/>
  &nbsp; 
  
  <input type="image" align="absmiddle" src="images/chatbutton.png" id="submit" BORDER="0" ALT="SUBMIT!" onClick="setFocus()" onKeyDown="setFocus()">
  <br />&nbsp;<br />


  
 <span align="right" id="helpdiv" style="display:none; margin-top:-87px; padding-left:390px; position:absolute;"><img src="images/tooltip1.gif"></span>
 
</div>
</form>


<div style="display:none" id="content1" ></div>
<div style="display:none"  id="content2"></div>


<script type="text/javascript">
//Call dropdowncontent.init("anchorID", "positionString", glideduration, "revealBehavior"):

dropdowncontent.init("searchlink", "left-bottom", 500, "click")
dropdowncontent.init("contentlink", "left-top", 400, "click")

</script>