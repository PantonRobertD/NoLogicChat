

var dropdowncontent={
	disableanchorlink: true, //when user clicks on anchor link, should link itself be disabled (always true if "revealbehavior" above set to "click")
 hidedivmouseout: [true, 200], //Set hiding behavior within Drop Down DIV itself: [hide_div_onmouseover?, miliseconds_before_hiding]
	

	getposOffset:function(what, offsettype){
		return (what.offsetParent)? what[offsettype]+this.getposOffset(what.offsetParent, offsettype) : what[offsettype]
	},

	isContained:function(m, e){
		var e=window.event || e
		var c=e.relatedTarget || ((e.type=="mouseover")? e.fromElement : e.toElement)
		while (c && c!=m)try {c=c.parentNode} catch(e){c=m}
		if (c==m)
			return true
		else
			return false
	},

	show:function(anchorobj, subobj, e){
		if (!this.isContained(anchorobj, e) || (e && e.type=="click")){
			var e=window.event || e
			if (e.type=="click" && subobj.style.visibility=="visible"){
				subobj.style.visibility="hidden"
				return
			}
		//var horizontaloffset="-100" //calculate user added horizontal offset
		//var verticaloffset="-100"//calculate user added vertical offset
			//subobj.style.left=this.getposOffset(anchorobj, "offsetLeft") + horizontaloffset + "px"
			//ubobj.style.top=this.getposOffset(anchorobj, "offsetTop")+verticaloffset+"px"
			//subobj.style.clip=(subobj.dropposition[1]=="top")? "rect(auto auto auto 0)" : "rect(0 auto 0 0)" //hide drop down box initially via clipping
			subobj.style.visibility="visible"
			subobj.startTime=new Date().getTime()
			subobj.contentheight=parseInt(subobj.offsetHeight)
			if (typeof window["hidetimer_"+subobj.id]!="undefined") //clear timer that hides drop down box?
				clearTimeout(window["hidetimer_"+subobj.id])
			this.slideengine(subobj, (subobj.dropposition[1]=="top")? "up" : "down")
		}
	},

	curveincrement:function(percent){
		return (1-Math.cos(percent*Math.PI)) / 2 //return cos curve based value from a percentage input
	},

	slideengine:function(obj, direction){
		var elapsed=new Date().getTime()-obj.startTime //get time animation has run
		if (elapsed<obj.glidetime){ //if time run is less than specified length
			var distancepercent=(direction=="down")? this.curveincrement(elapsed/obj.glidetime) : 1-this.curveincrement(elapsed/obj.glidetime)
			var currentclip=(distancepercent*obj.contentheight)+"px"
			obj.style.clip=(direction=="down")? "rect(0 auto "+currentclip+" 0)" : "rect("+currentclip+" auto auto 0)"
			window["glidetimer_"+obj.id]=setTimeout(function(){dropdowncontent.slideengine(obj, direction)}, 10)
		}
		else{ //if animation finished
			obj.style.clip="rect(0 auto auto 0)"
		}
	},

	hide:function(activeobj, subobj, e){
		if (!dropdowncontent.isContained(activeobj, e)){
			window["hidetimer_"+subobj.id]=setTimeout(function(){
				subobj.style.visibility="hidden"
				subobj.style.left=subobj.style.top="rect(100 100 auto auto)"
				clearTimeout(window["glidetimer_"+subobj.id])
			}, dropdowncontent.hidedivmouseout[1])
		}
	},

	hidediv:function(subobjid){
		document.getElementById(subobjid).style.visibility="hidden"
	},

	

 init:function(anchorid, pos, glidetime, revealbehavior){
		var anchorobj=document.getElementById(anchorid)
		if (anchorobj)
			var subobj=document.getElementById(anchorobj.getAttribute("rel"))
		if (!anchorobj || !subobj)
			return
		var subobjsource=anchorobj.getAttribute("rev")
		if (subobjsource!=null && subobjsource!="")
			this.ajaxconnect(subobjsource, anchorobj.getAttribute("rel"))
		subobj.dropposition=pos.split("-")
		subobj.glidetime=glidetime || 1000
		subobj.style.left=subobj.style.top="rect(100 100 auto auto)"
		if (typeof revealbehavior=="undefined" || revealbehavior=="mouseover"){
			anchorobj.onmouseover=function(e){dropdowncontent.show(this, subobj, e)}
			anchorobj.onmouseout=function(e){dropdowncontent.hide(subobj, subobj, e)}
			if (this.disableanchorlink) anchorobj.onclick=function(){return false}
		}
		else
			anchorobj.onclick=function(e){dropdowncontent.show(this, subobj, e); return false}
		if (this.hidedivmouseout[0]==false) //hide drop down DIV when mouse rolls out of it?
			subobj.onmouseout=function(e){dropdowncontent.hide(this, subobj, e)}
	}
}