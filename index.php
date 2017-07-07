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
session_start();
?>

<link rel="stylesheet" href="style/chatstyle.css"  type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/animatedcollapse.js"></script>


<script type="text/javascript">
animatedcollapse.addDiv('avatar1', 'optional_attribute_string');
animatedcollapse.addDiv('avatar2', 'optional_attribute_string');
//additional addDiv() call...
animatedcollapse.init()
</script>


<script type="text/javascript">
function validate(form)
{
    if (form.name.value == '') {
	
	document.getElementById("helpdiv2").style.display="block";

	  window.setTimeout("closeHelpDiv2();", 4000);
	  
	    focus2();
        return false;
    }
	
	
	if (form.name.value.length < 2) {
	
	document.getElementById("helpdiv").style.display="block";

	  window.setTimeout("closeHelpDiv();", 4000);
	  
	    focus2();
        return false;
    }
	
	
	
	
	if (form.name.value.length > 20) {
	
	document.getElementById("helpdiv1").style.display="block";

	  window.setTimeout("closeHelpDiv1();", 4000);
	  
	    focus2();
        return false;
    }
	
	
	
if(document.getElementById('1').checked) {
      } else if(document.getElementById('2').checked) {
      } else if(document.getElementById('3').checked) {
	   } else if(document.getElementById('4').checked) {
      } else if(document.getElementById('5').checked) {
	   } else if(document.getElementById('6').checked) {
      } else if(document.getElementById('7').checked) {
	   } else if(document.getElementById('8').checked) {
      } else if(document.getElementById('9').checked) {
	   } else if(document.getElementById('10').checked) {
      } else if(document.getElementById('11').checked) {
	   } else if(document.getElementById('12').checked) {
      } else if(document.getElementById('13').checked) {
	   } else if(document.getElementById('14').checked) {
      } else if(document.getElementById('15').checked) {
	  } else if(document.getElementById('16').checked) {
      } else if(document.getElementById('17').checked) {
	   } else if(document.getElementById('18').checked) {
      } else if(document.getElementById('19').checked) {
	   } else if(document.getElementById('20').checked) {
      } else if(document.getElementById('21').checked) {
	   } else if(document.getElementById('22').checked) {
      } else if(document.getElementById('23').checked) {
	   } else if(document.getElementById('24').checked) {
      } else if(document.getElementById('25').checked) {
	   } else if(document.getElementById('26').checked) {
      } else if(document.getElementById('27').checked) {
	   } else if(document.getElementById('28').checked) {
      } else if(document.getElementById('29').checked) {
	  } else if(document.getElementById('30').checked) {
	   } else if(document.getElementById('31').checked) {
	  
      } else {
	  
	  
	  document.getElementById("helpdiv3").style.display="block";

	  window.setTimeout("closeHelpDiv3();", 6000);
	  
	    focus2();
        return false;
    }
	 }
	
 function closeHelpDiv(){
   document.getElementById("helpdiv").style.display="none";
   focus2();
   return false;
}

 function closeHelpDiv1(){
   document.getElementById("helpdiv1").style.display="none";
   focus2();
   return false;
}

function closeHelpDiv2(){
   document.getElementById("helpdiv2").style.display="none";
   focus2();
   return false;
}

function closeHelpDiv3(){
   document.getElementById("helpdiv3").style.display="none";
   focus2();
   return false;
}
</script>

<script language="javascript">
          function hello(string){
               var name=string
               document.getElementById('myAnchor1').value=name;
			   document.getElementById("myAnchor2").innerHTML="<img src=\"uploads/" +name+ " \">";       

           if (name.value) 
            {
             alert("Kan de Afbeelding niet vinden");  
                }
                 else
                    {
                   document.getElementById("radiob").style.display="block";
				   
				    animatedcollapse.toggle('avatar2'); 
					
					document.getElementById("1").checked=true;
					
					document.forms['repo'].elements['name'].focus();
                }
           }
		   </script>
		   
		  
		   
		  

<div id="chatareafront">
 <div align="left" id="chatroomsfront" style=" background-color:#6E84B4">
 <div style="height:40px">&nbsp;&nbsp;<font size="5" color="#F1F1F1" face="Arial, Helvetica, sans-serif"><img src="images/chaticon1.png" height="37" align="absmiddle"  border="0"/>&nbsp;&nbsp;<b>NoLogic Radio</b></font></div>

 </div>
 
 <div id="chatwindow">
 
 
 
<div id="mainfront">
      <div align="center" id="caption"><img src="images/chaticon128.png" height="80" align="absmiddle">&nbsp; NoLogic Radio!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	   <span align="right" id="helpdiv3" style="display:none; margin-top:-40px; padding-left:270px; position:absolute;"><img src="images/tooltip4.gif"></span>
      <form action="chat.php" method="post" name="repo" onSubmit="javascript: return validate(this);">
        <table align="center" width="100%">
	<tr>
					<td valign="top" align="center" >
					<div><br />
<a href="javascript:animatedcollapse.toggle('avatar1'); javascript:animatedcollapse.hide('avatar2');"><img src="images/kiesavatar.png"  border="0"  onmousedown="this.src='images/kiesavatara.png';" onmouseout="this.src='images/kiesavatar.png';" onmouseup="this.src='images/kiesavatar.png';"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:animatedcollapse.toggle('avatar2'); javascript:animatedcollapse.hide('avatar1');"><img src="images/kiesavatar1.png"  border="0"   onmousedown="this.src='images/kiesavatar1a.png';" onmouseout="this.src='images/kiesavatar1.png';"  onmouseup="this.src='images/kiesavatar1.png';"/></a></div>
					
					
					
					<div style="display:none; padding:0px" id="avatar1" >
					<br />

			<table>
	            <tr>		
		<td valign="top" align="center"><img src="images/ava/ava2.jpg" border="0" /><br/><input id="2" name="ava" value="2" type="radio" class="radio" onclick="focus2();"/></td>
		<td valign="top" align="center"><img src="images/ava/ava3.jpg" border="0" /><br/><input id="3" name="ava" value="3" type="radio" class="radio" onclick="focus2();"/></td>
		<td valign="top" align="center"><img src="images/ava/ava4.jpg" border="0" /><br/><input id="4" name="ava" value="4" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava5.jpg" border="0" /><br/><input id="5" name="ava" value="5" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava6.jpg" border="0" /><br/><input id="6" name="ava" value="6" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava7.jpg" border="0" /><br/><input id="7" name="ava" value="7" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava8.jpg" border="0" /><br/><input id="8" name="ava" value="8" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava9.jpg" border="0" /><br/><input id="9" name="ava" value="9" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava10.jpg" border="0" /><br/><input id="10" name="ava" value="10" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava11.jpg" border="0" /><br/><input id="11" name="ava" value="11" type="radio" class="radio" onclick="focus2()"/></td>
				</tr>
				
				<tr>
		<td valign="top" align="center"><img src="images/ava/ava12.jpg" border="0" /><br/><input id="12" name="ava" value="12" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava13.jpg" border="0" /><br/><input id="13" name="ava" value="13" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava14.jpg" border="0" /><br/><input id="14" name="ava" value="14" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava15.jpg" border="0" /><br/><input id="15" name="ava" value="15" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava16.jpg" border="0" /><br/><input id="16" name="ava" value="16" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava17.jpg" border="0" /><br/><input id="17" name="ava" value="17" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava18.jpg" border="0" /><br/><input id="18" name="ava" value="18" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava19.jpg" border="0" /><br/><input id="19" name="ava" value="19" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava20.jpg" border="0" /><br/><input id="20" name="ava" value="20" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava21.jpg" border="0" /><br/><input id="21" name="ava" value="21" type="radio" class="radio" onclick="focus2()"/></td>
				</tr>
				
				<tr>
		<td valign="top" align="center"><img src="images/ava/ava22.jpg" border="0" /><br/><input id="22" name="ava" value="22" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava23.jpg" border="0" /><br/><input id="23" name="ava" value="23" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava24.jpg" border="0" /><br/><input id="24" name="ava" value="24" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava25.jpg" border="0" /><br/><input id="25" name="ava" value="25" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava26.jpg" border="0" /><br/><input id="26" name="ava" value="26" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava27.jpg" border="0" /><br/><input id="27" name="ava" value="27" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava28.jpg" border="0" /><br/><input id="28" name="ava" value="28" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava29.jpg" border="0" /><br/><input id="29" name="ava" value="29" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava30.jpg" border="0" /><br/><input id="30" name="ava" value="20" type="radio" class="radio" onclick="focus2()"/></td>
		<td valign="top" align="center"><img src="images/ava/ava31.jpg" border="0" /><br/><input id="31" name="ava" value="31" type="radio" class="radio" onclick="focus2()"/></td>
				</tr>
				
				<tr>
				<td valign="top" align="center"></td>
					<td valign="top" align="center"></td>
					</tr>
                    </table>
					</div>
					
					
					<div style="display:none; padding:0px" id="avatar2" >
					<br />
					<div>
					<iframe src="./uploads/submit.php" WIDTH="600" HEIGHT="140"  scrolling="no"  frameborder="0" ></iframe>
					<input type="hidden" id="myAnchor1" name="avatar" >
					
					
					</div>

					<table>
	                 <tr>
				    <td valign="top" align="center">
					
					
					</td>
					
					
					<td valign="top" align="center"></td>
					<td valign="top" align="center"></td>
					<td valign="top" align="center"></td>
					</tr>
                    </table>
					</div>
					
					
					
					
					</td>						
						
						</tr>
          <tr><td align="center"><br />
<div  id="radiob" style="display:none"><a id="myAnchor2"></a><br />
<input id="1" name="ava" value="1" type="radio" class="radio"  onclick="focus2()" /></div><br></td></tr>
          
          <td align="center"><font size="2">Choose a Chatname: </font><input class="text" type="text" name="name" id="adchatfront" />&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span align="right" id="helpdiv" style="display:none; margin-top:-66px; padding-left:330px; position:absolute;"><img src="images/tooltip2.gif"></span>
		  <span align="right" id="helpdiv1" style="display:none; margin-top:-66px; padding-left:330px; position:absolute;"><img src="images/tooltip5.gif"></span>
		   <span align="right" id="helpdiv2" style="display:none; margin-top:-66px; padding-left:330px; position:absolute;"><img src="images/tooltip3.gif"></span>
		   
		  
		  </td></tr>
          <tr><td  align="center"><br>
<br>
<br>

             <input  style="cursor:pointer; background-color:#21BB37; border:solid; border-color:#808080; border-width:1px; font-size:14px; color:#FFFFFF; font-weight:bold; height:20px; width:120px;" type="submit" name="submitBtn" value="Login" /><br>
<br><br><br>



          </td></tr>
        </table>
      </form>
	  
	   <script language="javascript">
		   function focus2(){
		   document.forms['repo'].elements['name'].focus();
		   }
     </script>

<script type="text/javascript">
document.forms['repo'].elements['name'].focus();
</script>
</div>
<div style="height:20px; background-image:url(images/bgchat2.jpg)"></div>
</div>






