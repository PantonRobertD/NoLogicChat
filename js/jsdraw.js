// by Chtiwi Malek on CODICODE.COM

var mousePressed = false;
var lastX, lastY;
var ctx;

function InitThis() {
    ctx = document.getElementById('myCanvas').getContext("2d");

    $('#myCanvas').mousedown(function (e) {
        mousePressed = true;
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
    });

    $('#myCanvas').mousemove(function (e) {
        if (mousePressed) {
            Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('#myCanvas').mouseup(function (e) {
        mousePressed = false;
    });

    $('#myCanvas').mouseleave(function (e) {
        mousePressed = false;
    });
}

function Draw(x, y, isDown) {
    if (isDown) {
        ctx.beginPath();
        ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = $('#selWidth').val();
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
    }
    lastX = x;
    lastY = y;
}

function clearArea() {
    // Use the identity matrix while clearing the canvas
    ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}


function closedialog(){
   document.getElementById("dialog").style.display="none";
 
}



function saveViaAJAX()
{

	
	
	var testCanvas = document.getElementById("myCanvas");
	var canvasData = testCanvas.toDataURL("image/png");
	var ajax = new XMLHttpRequest();
 


	
	

	//alert("canvasData ="+canvasData );
	var ajax = new XMLHttpRequest();
	ajax.open("POST",'draw/save.php',true);
	ajax.setRequestHeader('Content-Type', 'canvas/upload');
	ajax.send(canvasData );
	//ajax.setRequestHeader('Content-TypeLength', postData.length);


	ajax.onreadystatechange=function()
  	{
		if (ajax.readyState == 4)
		{
			//alert(ajax.responseText);
			
				
				document.getElementById("dialog").style.display="block";
				
				window.setTimeout("closedialog();", 2000);
				
				window.setTimeout("dropdowncontent.hidediv('subcontent2')",2100);
				
		}
  	}
	
	

	ajax.send(postData);
}