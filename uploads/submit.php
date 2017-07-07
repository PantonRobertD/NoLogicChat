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

ini_set("memory_limit", "400000000"); // for large images so that we do not get "Allowed memory exhausted"

// upload the file
if ((isset($_POST["submitted_form"])) && ($_POST["submitted_form"] == "image_upload_form")) {
	
	// file needs to be jpg,gif,bmp,x-png and 2 MB max
	if (($_FILES["image_upload_box"]["type"] == "image/jpeg" || $_FILES["image_upload_box"]["type"] == "image/pjpeg" || $_FILES["image_upload_box"]["type"] == "image/gif" || $_FILES["image_upload_box"]["type"] == "image/png") && ($_FILES["image_upload_box"]["size"] < 2000000))
	{
		
  
		// some settings
		$max_upload_width = 2592;
		$max_upload_height = 1944;
		  
		// if user chosed properly then scale down the image according to user preferances
		if(isset($_REQUEST['max_width_box']) and $_REQUEST['max_width_box']!='' and $_REQUEST['max_width_box']<=$max_upload_width){
			$max_upload_width = $_REQUEST['max_width_box'];
		}    
		if(isset($_REQUEST['max_height_box']) and $_REQUEST['max_height_box']!='' and $_REQUEST['max_height_box']<=$max_upload_height){
			$max_upload_height = $_REQUEST['max_height_box'];
		}	

		
		// if uploaded image was JPG/JPEG
		if($_FILES["image_upload_box"]["type"] == "image/jpeg" || $_FILES["image_upload_box"]["type"] == "image/pjpeg"){	
			$image_source = imagecreatefromjpeg($_FILES["image_upload_box"]["tmp_name"]);
		}		
		// if uploaded image was GIF
		if($_FILES["image_upload_box"]["type"] == "image/gif"){	
			$image_source = imagecreatefromgif($_FILES["image_upload_box"]["tmp_name"]);
		}	
		// BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
		// if uploaded image was BMP
		if($_FILES["image_upload_box"]["type"] == "image/bmp"){	
			$image_source = imagecreatefromwbmp($_FILES["image_upload_box"]["tmp_name"]);
		}			
		// if uploaded image was PNG
		if($_FILES["image_upload_box"]["type"] == "image/png"){
			$image_source = imagecreatefrompng($_FILES["image_upload_box"]["tmp_name"]);
		}
		

		$remote_file = "ava-uploads/".$_FILES["image_upload_box"]["name"];
		imagejpeg($image_source,$remote_file,100);
		//chmod($remote_file,0644);
	
	
	
	
	/////// MOD: set Image Min. Width and Height ///////////////////////
 
	list($width, $height) = getimagesize($remote_file); 
	$min_width = '49';
	$min_height = '49';
	
if ($width < $min_width) {

		header("Location: submit.php?upload_message=Error, the width of the image must be greater than 50px&upload_message_type=error");
		exit;

	}
if ($height < $min_height) {

		header("Location: submit.php?upload_message=Error, the height of the image must be greater than 50pxn&upload_message_type=error");
		exit;

	}
	
  ///////// End  ////////////////////
	
	
	
	

		// get width and height of original image
		list($image_width, $image_height) = getimagesize($remote_file);
	
		if($image_width>$max_upload_width || $image_height >$max_upload_height){
			$proportions = $image_width/$image_height;
			
			if($image_width>$image_height){
				$new_width = $max_upload_width;
				$new_height = round($max_upload_width/$proportions);
			}		
			else{
				$new_height = $max_upload_height;
				$new_width = round($max_upload_height*$proportions);
			}		
			
			
			$new_image = imagecreatetruecolor($new_width , $new_height);
			
			$image_source = imagecreatefromjpeg($remote_file);
			
			imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
			
			
///// mod sharpen /////////////////

$sharpen = array(
	   array(0.0, -1.0, 0.0),
 array(-1.0, 6.0, -1.0),
 array(0.0, -1.0, 0.0)


);

// calculate the sharpen divisor
$divisor = array_sum(array_map('array_sum', $sharpen));

// apply the matrix
imageconvolution($new_image, $sharpen, $divisor, 0);

//////// end Mod /////////////
			
			imagejpeg($new_image,$remote_file,100);
			
			imagedestroy($new_image);
		}
		
		imagedestroy($image_source);
		
		
		header("Location: submit.php?show_image=".$_FILES["image_upload_box"]["name"]);
		exit;
	}
	else{
		header("Location: submit.php?upload_message=Error, check if the imagestype is jpg, gif or png and smaller than 2 MB&upload_message_type=error");
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Upload with resize</title>


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 12px;
	text-align:center;
	background-color:#E9E9E9;
	
}

.upload_message_success {
	padding:3px;
	background-color:#E4EEF8;
	border:1px solid #808080;
	color:000000;
	margin-top:7px;
	margin-bottom:7px;
}

.upload_message_error {
	padding:3px;
	background-color:#FFFFDD;
	border:1px solid #808080;
	color:#000000;
	margin-top:7px;
	margin-bottom:7px;
}

.formbutton {
  font-size: 12px;
  background-color: #E5E5E5;
  border-top: 1px solid #FFFFFF;
  border-left: 1px solid #FFFFFF;
  border-right: 1px solid #677175;
  border-bottom: 1px solid #677175;
  color: #505050;
  cursor:pointer;
}
.line_outer {
	padding-top: 3px;
	padding-left: 7px;
	padding-bottom: 3px;
	padding-right: 7px; 
}
-->
</style>



<script language="JavaScript">

function val(form)
{
     
	 var iChars = "!@#$%";
        for (var i = 0; i < document.image_upload_form.image_upload_box.value.length; i++) {
                if (iChars.indexOf(document.image_upload_form.image_upload_box.value.charAt(i)) != -1) {
                 alert ("The image name contains invalid characters such as @ % $ #     \n             these are not allowed");
                return false;
        }
                }

    if (form.image_upload_box.value == '') {
	
	
	
	document.getElementById("geenbestand").style.display="block";

	  window.setTimeout("close();", 4000);
	  
	    
        return false;
	
        //alert("Geef s.v.p. een Fotobestand op.   ");
        //return false;
		
		
		
    } else {
     document.getElementById('hidden').style.display = 'block';
    } } 
	
	
	function close(){
   document.getElementById("geenbestand").style.display="none";
   
   return false;
}
</script>




</head>

<body >
<div  id="afbtype" class="line_outer" style="background-color:#E4EEF8; margin-bottom:8px; border:solid; border-width:1px; border-color:#A7A7A7">
				<img src="../images/icon-right2.gif"> Images larger than 2MB and other than jpg, gif or png are not allowed.
</div>

        <?php if(isset($_REQUEST['upload_message'])){ ?>
		<script>
		document.getElementById("afbtype").style.display="none";
		</script>
		
        <div class="upload_message_<?php echo $_REQUEST['upload_message_type'];?>">
            <?php echo htmlentities($_REQUEST['upload_message']);?>
</div>
		<?php }?>

 <span align="right" id="geenbestand" style="display:none; margin-top:-28px; padding-left:230px; position:absolute;"><img src="../images/tooltip6.gif"></span>
<form action="submit.php" method="post" enctype="multipart/form-data" name="image_upload_form" id="image_upload_form" onsubmit="javascript: return val(this);"  style="margin-bottom:0px;">
<br />

          <input name="image_upload_box" type="file" id="image_upload_box" size="40" class="formbutton"  style="font-size:12px; background-color:#FFFFFF"/>&nbsp;<img src="../images/upload1.gif" align="absmiddle">&nbsp;
          <input type="submit" name="submit" value="Upload Image" class="formbutton" />     
     
     <br />
	<br />
	
	  <div id="hidden" style="display:none; width:100%; height:17px; background-color:#E4EEF8">&nbsp;<img src="../images/uploadbar1.gif" align="absmiddle">&nbsp;&nbsp;please wait the image is uploading..&nbsp;</div>
	

     <div style="display:none;">
      <label>Scale down image? (2592 x 1944 px max):</label>
      <br />
      <input name="max_width_box" type="text" id="max_width_box" value="50" size="4">      
      <input name="max_height_box" type="text" id="max_height_box" value="50" size="4">
  </div>

     

      

<input name="submitted_form" type="hidden" id="submitted_form" value="image_upload_form" />
</form>



	<?php if(isset($_REQUEST['show_image']) and $_REQUEST['show_image']!=''){ ?>
	
<div style="display:none">
	<img src="ava-uploads/<?php echo $_REQUEST['show_image'];?>" /><br />
	<form name="frm2"  >
<input type="text" name="resp"  id="input" value="ava-uploads/<?php echo $_REQUEST['show_image'];?>"/>
<input type="button" id="skip" onclick="parent.hello(this.form.resp.value);" value="Submit" />

   </form>
   
   <script type="text/javascript">
      setTimeout(function(){
      document.getElementById("skip").click();
       },500);
    </script>
   
</div>


<?php
 
 // Limit the number of saved Imagefiles in uploads/ava-uploads
 
 $folder_name = 'ava-uploads';
 $limit_files = '35' ;
 $file_list = array();
 
    if ($handle = opendir($folder_name)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $file_list[filemtime($folder_name."/".$file)] = $folder_name."/".$file;
            }
        }
        closedir($handle);
    }
    krsort($file_list);
    $i = 0;
    foreach($file_list as $key => $value)
    {
        $i++;
        if ($i <= $limit_files) continue;
        unlink($value);
    }

?>

<?php }?>
</body>
</html>