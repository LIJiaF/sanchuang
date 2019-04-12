/*获取属性值*/
function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}

/*通过class获取节点*/
function getClass(parent,claName){
	var arr=[];
	var tol=parent.getElementsByTagName('*');
	for(var i=0;i<tol.length;i++){
		if(tol[i].className==claName){
			arr.push(tol[i]);
		}
	}
	return arr;
}

/*运动框架*/
function startMove(obj,attr,itarget,fn){
	clearInterval(obj.timer);
	var icur=0;
	obj.timer=setInterval(function(){
		if(attr=='opacity'){
			icur=parseFloat(getStyle(obj,attr)*100);
		}else{
			icur=parseInt(getStyle(obj,attr));
		}
		var speed=(itarget-icur)/8;
		speed=speed>0?Math.ceil(speed):Math.floor(speed);
		if(icur==itarget){
			clearInterval(obj.timer);
			if(fn){
				fn();
			}
		}else{
			if(attr=='opacity'){
				obj.style.opacity=(icur+speed)/100;
				obj.style.filter='alpha(opacity:'+icur+speed+')';
			}else{
				obj.style[attr]=icur+speed+'px';
			}
		}
	},30)
}