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

 if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
 {
 // Get the data
 $img=$GLOBALS['HTTP_RAW_POST_DATA'];

 define('UPLOAD_DIR', 'images/');
	//$img = $_POST['img'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	//print $success ? $file : 'Unable to save the file.';
 }


 // Limit the number of saved files in draw/images

 $folder_name = 'images';
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
