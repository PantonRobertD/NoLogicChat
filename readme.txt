Nedchat V1.05 English    (from Admin - http://nedfile.nl -)
Share your thoughts and opinions related to NedChat on the forum.
for more info go to:   http://nedfile.nl

 Documentation
-----------------------------------------------------------------------------------------------------------
1) Upload the whole nedchat directory (and all files/subdirectories in it) to your server root with an FTP program. 

2) CHMOD to 777 : 

    chattxt/NedChat.txt 
    draw/images
    typen/people.txt 
    uploads/ava-uploads 
    userload/useruploads 


3) If you want to use a other directory name for nedchat:
        open: chatfiles/chatsimple.php

    A) go to line 101... you see: $base_url = '../nedchat/draw/images';
        change nedchat to the directory name you have chosen.

     B) go to line 119... you see: $base_url2 = '../nedchat/userload/useruploads';
         change nedchat to the directory name you have chosen.


4) If you want to change the Sound when Chat is entered. (default is beep1.mp3)

     You see 9 mp3 sound files... pick the one you like and change in:
     chatfiles/chatfunctions   on line 14 your sound file. 


5) If you want to change the wooden background in a color.... open chatstyle.css in the style directory and change the body css in:
     
body {
//background-image:url('../images/wood-bg.jpg');
background: #DBE5EE;
text-align: center;
}


      
    
    

