// JavaScript code that enable the date to function
date = new Array();
date[0]=new Image();
date[0].src="clockimages/dg0.gif";
date[1]=new Image();
date[1].src="clockimages/dg1.gif";
date[2]=new Image();
date[2].src="clockimages/dg2.gif";
date[3]=new Image();
date[3].src="clockimages/dg3.gif";
date[4]=new Image();
date[4].src="clockimages/dg4.gif";
date[5]=new Image();
date[5].src="clockimages/dg5.gif";
date[6]=new Image();
date[6].src="clockimages/dg6.gif";
date[7]=new Image();
date[7].src="clockimages/dg7.gif";
date[8]=new Image();
date[8].src="clockimages/dg8.gif";
date[9]=new Image();
date[9].src="clockimages/dg9.gif";

function dodate(){ 
	var d = new Date();
	var dy=d.getDate(),mn=(d.getMonth()+1),yr=d.getYear();

	if(yr<1000) yr+=1900;//Y2K issue in some browsers

	document.dy1.src=getSrc(dy,10);
	document.dy2.src=getSrc(dy,1);
	document.mt1.src=getSrc(mn,10);
	document.mt2.src=getSrc(mn,1);
	document.yr1.src=getSrc(yr,1000);
	document.yr2.src=getSrc(yr,100);
	document.yr3.src=getSrc(yr,10);
	document.yr4.src=getSrc(yr,1);
}
window.onload=function(){
	dodate();
	setInterval(dodate,30000);//30 secs
}
function getSrc(digit,index){
	return date[(Math.floor(digit/index)%10)].src;
}