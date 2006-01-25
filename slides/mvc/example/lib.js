function ygConnect(){}
ygConnect.prototype={_msxml_progid:['MSXML2.XMLHTTP.5.0','MSXML2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP'],_async_response:{},_http_header:[],_isFormPost:false,_sFormData:null,getConnObject:function(objectId,transactionId)
{var obj,http;try
{http=new XMLHttpRequest();obj={conn:http,oId:objectId,tId:transactionId};}
catch(e)
{for(var i=0;i<this._msxml_progid.length;++i){try
{http=new ActiveXObject(this._msxml_progid[i]);obj={conn:http,oId:objectId,tId:transactionId};}
catch(e){}}}
finally
{if(http!=undefined||obj!=undefined){var connObj=arguments.length>0?obj:http;return connObj;}
else{return null;}}},setProgId:function(id)
{this.msxml_progid.unshift(id);},syncRequest:function(o,sMethod,sUri,bXml,oPostData)
{if(!o){return;}
o.conn.open(sMethod,sUri,false);if(this._http_header.length>0)
this.setHeader(o);if(this._isFormPost){oPostData=this._sFormData;this._isFormPost=false;}
else if(oPostData){this.initHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');}
oPostData?o.conn.send(oPostData):o.conn.send(null);try
{if(o.conn.status==200){response=(bXml?o.conn.responseXML:o.conn.responseText);}
else{response=this.connectException(o);}}
catch(e)
{response=this.connectException(e,o.tId);}
finally
{ygConnect.superclass.releaseObject(o);return response;}},asyncRequest:function(o,sMethod,sUri,bXml,oCallback,oCallbackArgs,oPostData)
{if(!o){var queueObject={method:sMethod,uri:sUri,isXml:bXml,callback:oCallback,argument:oCallbackArgs,data:oPostData}
ygConnect.superclass.queueRequest(queueObject);}
else{var self=this;o.conn.open(sMethod,sUri,true);if(oCallback){o.conn.onreadystatechange=function()
{if(o.conn.readyState==4){try
{if(o.conn.status==200){oCallback(o.conn,o.tId,oCallbackArgs);}
else{var errorObj=self.connectException(o);oCallback(errorObj,oCallbackArgs);}}
catch(e)
{var errorObj=self.connectException(e,o.tId);oCallback(errorObj,oCallbackArgs);}
finally
{ygConnect.superclass.releaseObject(o);}}}}
else{o.conn.onreadystatechange=function(){self.stateChange(o,bXml)}}
if(this._isFormPost){oPostData=this._sFormData;this._isFormPost=false;}
else if(oPostData){this.initHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');}
if(this._http_header.length>0){this.setHeader(o);}
oPostData?o.conn.send(oPostData):o.conn.send(null);}},stateChange:function(o,bXml)
{var oResponse;switch(o.conn.readyState){case 4:try
{if(o.conn.status==200){oResponse={tId:o.tId,status:o.conn.status,message:(bXml?o.conn.responseXML:o.conn.responseText)}}
else
oResponse=this.connectException(o);}
catch(e)
{oResponse=this.connectException(e,o.tId);}
finally
{this.setResponse(oResponse);ygConnect.superclass.releaseObject(o);}
break;}},setResponse:function(o)
{this._async_response[o.tId]=o;},getResponse:function(tId)
{var oResponse=this._async_response[tId];if(oResponse){delete this._async_response[tId];return oResponse;}},initHeader:function(label,value)
{var oHeader=[label,value];this._http_header.push(oHeader);},setHeader:function(o)
{var oHeader=this._http_header;for(var i=0;i<oHeader.length;i++){o.conn.setRequestHeader(oHeader[i][0],oHeader[i][1]);}
oHeader.splice(0,oHeader.length);},getHeader:function(o,label)
{return o.conn.getResponseHeader(label);},getAllHeaders:function(o)
{return o.conn.getAllResponseHeaders();},setForm:function(formName)
{this._sFormData='';var prevElName;var oForm=document.forms[formName];for(var i=0;i<oForm.elements.length;i++){oElement=oForm.elements[i];elName=oForm.elements[i].name;elValue=oForm.elements[i].value;switch(oElement.type)
{case'select-multiple':for(var j=0;j<oElement.options.length;j++){if(oElement.options[j].selected){this._sFormData+=encodeURIComponent(elName)+'='+encodeURIComponent(oElement.options[j].value)+'&';}}
break;case'radio':case'checkbox':if(oElement.checked){this._sFormData+=encodeURIComponent(elName)+'='+encodeURIComponent(elValue)+'&';}
break;case'file':break;case undefined:break;default:this._sFormData+=encodeURIComponent(elName)+'='+encodeURIComponent(elValue)+'&';break;}}
this._sFormData=this._sFormData.substr(0,this._sFormData.length-1);this._isFormPost=true;this.initHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');},abort:function(o)
{if(this.isCallInProgress(o)){o.conn.abort();ygConnect.superclass.releaseObject(o);}},isCallInProgress:function(o)
{if(o)
return o.conn.readyState!=4&&o.conn.readyState!=0;},connectException:function(o,transactionId)
{if(o.conn){return{tId:o.tId,status:o.conn.status,message:o.conn.statusText}}
else{return{tId:transactionId,status:o.name,message:o.message}}}}
var ygConnManager=function(){}
ygConnManager.prototype={_object_count:0,_available_pool:[],_request_queue:[],_enable_pool:true,_max_pool_size:2,_transaction_id:0,http:new ygConnect()}
var ygConn=ygConnManager.prototype;ygConnect.superclass=ygConnManager.prototype;ygConnManager.prototype.setPoolSize=function(i)
{this._max_pool_size=2;}
ygConnManager.prototype.disablePooling=function()
{this._enable_pool=false;}
ygConnManager.prototype.enablePooling=function()
{this._enable_pool=true;}
ygConnManager.prototype.getTransactionId=function()
{return this._transaction_id;}
ygConnManager.prototype.incrObjCount=function()
{this._object_count++;}
ygConnManager.prototype.incrTransactionId=function()
{this._transaction_id++;}
ygConnManager.prototype.getObject=function()
{var o;var oId;var tId=this.getTransactionId();if(this._enable_pool){try
{if(window.XMLHttpRequest){oId=this._object_count;o=this.http.getConnObject(oId,tId);if(o){this.incrTransactionId();}
return o;}
else if(window.ActiveXObject){return this.getActiveXObject();}}
catch(e)
{return this.getActiveXObject();}}
else{return this.http.getConnObject();}}
ygConnManager.prototype.getActiveXObject=function()
{var o;var oId;var tId=this.getTransactionId();if(this._object_count<this._max_pool_size&&this._available_pool.length==0){oId=this._object_count;o=this.http.getConnObject(oId,tId);if(o){this.incrObjCount();this.incrTransactionId();}}
else if(this._available_pool.length>0){o=this.getAvailableObject();if(o){o.tId=tId;this.incrTransactionId();}}
return o;}
ygConnManager.prototype.getAvailableObject=function()
{return this._available_pool.shift();}
ygConnManager.prototype.releaseObject=function(o)
{try
{if(window.XMLHttpRequest){o=null;}
else{o.conn.onreadystatechange=detachStateListener;this._available_pool.push(o);}}
catch(e)
{o.conn.onreadystatechange=detachStateListener;this._available_pool.push(o);}
finally
{this.checkRequestQueue();}}
ygConnManager.prototype.checkRequestQueue=function()
{if(this._request_queue.length>0){var o=this.getObject();var q=this._request_queue.shift();this.http.asyncRequest(o,q.method,q.uri,q.isXml,q.callback,q.argument,q.data);}}
ygConnManager.prototype.queueRequest=function(o)
{this._request_queue.push(o);}
function detachStateListener(){return null;}

var ygPos=new function(){this.getPos=function(oEl){var pos=[oEl.offsetLeft,oEl.offsetTop];var parent=oEl.offsetParent;var tmp={x:null,y:null};if(parent!=oEl){while(parent){switch(browser){case'ie':if(_getStyle(parent,'position')=='relative'&&_getStyle(oEl,'width')=='auto'&&(_getStyle(oEl,'position')=='static'))
{return[oEl.offsetLeft,oEl.offsetTop];}
else if(_getStyle(parent,'width')!='auto'||_getStyle(oEl.parentNode,'position')!='static'){tmp.x=parseInt(_getStyle(parent,'borderLeftWidth'));tmp.y=parseInt(_getStyle(parent,'borderTopWidth'));if(!isNaN(tmp.x))pos[0]+=tmp.x;if(!isNaN(tmp.y))pos[1]+=tmp.y;}
break;case'gecko':if(_getStyle(parent,'position')=='relative'){tmp.x=parseInt(_getStyle(parent,'border-left-width'));tmp.y=parseInt(_getStyle(parent,'border-top-width'));if(!isNaN(tmp.x))pos[0]+=tmp.x;if(!isNaN(tmp.y))pos[1]+=tmp.y;}
break;}
pos[0]+=parent.offsetLeft;pos[1]+=parent.offsetTop;parent=parent.offsetParent;}}
if(browser=='ie'&&_getStyle(oEl,'width')!='auto'&&_getStyle(oEl.offsetParent,'width')=='auto'&&_getStyle(oEl.offsetParent,'position')=='relative'){parent=oEl.parentNode;while(parent.tagName!='HTML'){tmp.x=parseInt(_getStyle(parent,'marginLeft'));tmp.y=parseInt(_getStyle(parent,'paddingLeft'));if(!isNaN(tmp.x))pos[0]-=tmp.x;if(!isNaN(tmp.y))pos[0]-=tmp.y;parent=parent.parentNode;}}
return pos;};this.getX=function(oEl){return this.getPos(oEl)[0];};this.getY=function(oEl){return this.getPos(oEl)[1];};this.setPos=function(oEl,endPos){var offset=[0,0];var delta={x:0,y:0};var curStylePos=_getStyle(oEl,'position');if(curStylePos=='static'){oEl.style.position='relative';curStylePos='relative';}
if(oEl.offsetWidth){if(curStylePos=='relative'){offset=this.getPos(oEl);var tmp={x:_getStyle(oEl,'left'),y:_getStyle(oEl,'top')};delta.x=(tmp.x&&tmp.x.indexOf('px')!=-1)?parseInt(tmp.x):0;delta.y=(tmp.y&&tmp.y.indexOf('px')!=-1)?parseInt(tmp.y):0;}
else{offset=this.getPos(oEl.offsetParent);var tmp={x:_getStyle(oEl,'margin-left'),y:_getStyle(oEl,'margin-top')};delta.x=(tmp.x&&tmp.x.indexOf('px')!=-1)?0-parseInt(tmp.x):0;delta.y=(tmp.y&&tmp.y.indexOf('px')!=-1)?0-parseInt(tmp.y):0;}}
if(browser=='safari'){if(oEl.offsetParent&&oEl.offsetParent.tagName=='BODY'){if(_getStyle(oEl,'position')=='relative'){delta.x-=document.body.offsetLeft;delta.y-=document.body.offsetTop;}
else if(_getStyle(oEl,'position')=='absolute'||_getStyle(oEl,'position')=='fixed'){delta.x+=document.body.offsetLeft;delta.y+=document.body.offsetTop;}}}
if(endPos[0]!==null)oEl.style.left=endPos[0]-offset[0]+delta.x+'px';if(endPos[1]!==null)oEl.style.top=endPos[1]-offset[1]+delta.y+'px';};this.setX=function(oEl,x){this.setPos(oEl,[x,null]);};this.setY=function(oEl,y){this.setPos(oEl,[null,y]);};this.getRegion=function(oEl){return new yui.Region.getRegion(oEl);};var _getStyle=function(oEl,property){var dv=document.defaultView;if(oEl.style[property])return oEl.style[property];else if(oEl.currentStyle){if(property.indexOf('-')!=-1){property=property.split('-');property[1]=property[1].toUpperCase().charAt(0)+property[1].substr(1);property=property.join('');}
if(oEl.currentStyle[property])return oEl.currentStyle[property];}
else if(dv&&dv.getComputedStyle(oEl,'')&&dv.getComputedStyle(oEl,'').getPropertyValue(property)){return dv.getComputedStyle(oEl,'').getPropertyValue(property);}
return null;};var _getBrowser=function(){var ua=navigator.userAgent.toLowerCase();if(ua.indexOf('opera')!=-1)
return'opera';else if(ua.indexOf('msie')!=-1)
return'ie';else if(ua.indexOf('safari')!=-1)
return'safari';else if(ua.indexOf('gecko')!=-1)
return'gecko';else
return false;};var browser=_getBrowser();};yui=window.yui||{};yui.Region=function(t,r,b,l){this.top=t;this.right=r;this.bottom=b;this.left=l;};yui.Region.prototype.contains=function(region){return(region.left>=this.left&&region.right<=this.right&&region.top>=this.top&&region.bottom<=this.bottom);};yui.Region.prototype.getArea=function(){return((this.bottom-this.top)*(this.right-this.left));};yui.Region.prototype.intersect=function(region){var t=Math.max(this.top,region.top);var r=Math.min(this.right,region.right);var b=Math.min(this.bottom,region.bottom);var l=Math.max(this.left,region.left);if(b>=t&&r>=l){return new yui.Region(t,r,b,l);}else{return null;}};yui.Region.prototype.union=function(region){var t=Math.min(this.top,region.top);var r=Math.max(this.right,region.right);var b=Math.max(this.bottom,region.bottom);var l=Math.min(this.left,region.left);return new yui.Region(t,r,b,l);};yui.Region.prototype.toString=function(){return("Region {"+"  t: "+this.top+", r: "+this.right+", b: "+this.bottom+", l: "+this.left+"}");}
yui.Region.getRegion=function(el){var p=ygPos.getPos(el);var t=p[1];var r=p[0]+el.offsetWidth;var b=p[1]+el.offsetHeight;var l=p[0];return new yui.Region(t,r,b,l);};yui.Point=function(x,y){this.x=x;this.y=y;this.top=y;this.right=x;this.bottom=y;this.left=x;};yui.Point.prototype=new yui.Region();

function ygAnim(_1,_2,_3){if(_1){this.init(_1,_2,_3);}}ygAnim.prototype={oDomRef:null,iTotalFrames:0,iCurrentFrame:0,animate:function(){ygAnimMgr.registerElement(this);},stop:function(){ygAnimMgr.stop(this);},isAnimated:function(){return this._isAnimated;},setFrameBased:function(_4){if(_4===false){this._isFrameBased=false;this.iTotalFrames=ygAnimMgr.fps*this._units;}else{this._isFrameBased=true;this.iTotalFrames=this._units;}if(this.aTween){this.cacheTween();}},handleOptions:function(){},createTween:function(){},cacheTween:function(){},doTween:function(){},onStart:function(){},onTween:function(){},onComplete:function(){},init:function(el,_6,_7){if(el){this.oDomRef=el;}if(_6){this._units=_6;}if(_7){this.handleOptions(_7);}if(_6===null){this.iTotalFrames=null;}else{this.iTotalFrames=ygAnimMgr.fps*_6;}},getStyle:function(_8){var dv=document.defaultView;if(this.oDomRef.style[_8]){return this.oDomRef.style[_8];}else{if(this.oDomRef.currentStyle){if(_8.indexOf("-")!=-1){_8=_8.split("-");for(var i=1;i<_8.length;++i){_8[i]=_8[i].toUpperCase().charAt(0)+_8[i].substr(1);}_8=_8.join("");}if(this.oDomRef.currentStyle[_8]){return this.oDomRef.currentStyle[_8];}}else{if(dv&&dv.getComputedStyle&&dv.getComputedStyle(this.oDomRef,"").getPropertyValue(_8)){return dv.getComputedStyle&&dv.getComputedStyle(this.oDomRef,"").getPropertyValue(_8);}}}},_isAnimated:false,_isFrameBased:false};ygAnimMgr=new function(){this.fps=200;this.iDelay=1;var _11=null;var _12=[];var _13=0;var _14=this;this.registerElement=function(o){if(o._isAnimated){return false;}_12[_12.length]=o;_13+=1;o._isAnimated=true;o.onStart();o._startTime=new Date();this.start();};this.start=function(){if(_11===null){_11=setInterval(this.run,this.iDelay);}};this.stop=function(o){if(!o){clearInterval(_11);for(var i=0,len=_12.length;i<len;++i){_12[i]._isAnimated=false;}_12=[];_11=null;_13=0;}else{o._isAnimated=false;o.iCurrentFrame=0;o.onComplete();_13-=1;if(_13<=0){_14.stop();}}};this.run=function(){for(var i=_12.length-1;i>=0;--i){var o=_12[i];if(!o||!o._isAnimated){continue;}if(o.iCurrentFrame<o.iTotalFrames||o.iTotalFrames===null){var _16=(new Date()-o._startTime);var _17=(o.iCurrentFrame*o._units*1000/o.iTotalFrames);var _18=0;if(_16<o._units*1000){_18=Math.round((_16/_17-1)*o.iCurrentFrame);}else{_18=o.iTotalFrames-(o.iCurrentFrame+1);}if(_18>0&&isFinite(_18)){if(o.iCurrentFrame+_18>=o.iTotalFrames){_18=o.iTotalFrames-(o.iCurrentFrame+1);}o.iCurrentFrame+=_18;if(o._t){o._t+=_18*(1/(o.iTotalFrames-1));}}o.doTween();o.onTween();o.iCurrentFrame+=1;}else{ygAnimMgr.stop(o);}}};};ygBezier=new function(){this.getPosition=function(_19,t){var _21=[];var n=_19.length;for(var i=0;i<n;++i){_21[i]=[_19[i][0],_19[i][1]];}for(var j=1;j<n;++j){for(i=0;i<n-j;++i){_21[i][0]=(1-t)*_21[i][0]+t*_21[parseInt(i+1)][0];_21[i][1]=(1-t)*_21[i][1]+t*_21[parseInt(i+1)][1];}}return{x:_21[0][0],y:_21[0][1]};};};ygAnim_Move.prototype=new ygAnim();function ygAnim_Move(el,_24,_25){if(el){this.init(el,_24,_25);}}ygAnim_Move.prototype.doTween=function(){var p={};if(!this.oDomRef){ygAnimMgr.stop(this);return false;}if(!this.aTween||!this.aTween[this.iCurrentFrame]){if(this.iCurrentFrame===0){this._t=0;}p=this._getPoint(this._t);this._t+=1/(this.iTotalFrames-1);}else{p=this.aTween[this.iCurrentFrame];}this.oDomRef.style.left=p.x+"px";this.oDomRef.style.top=p.y+"px";};ygAnim_Move.prototype.createTween=function(_27){var t=0;var _28=[];if(_27){for(var i=0;i<this.iTotalFrames;++i){_28[i]={};var p=this._getPoint(t);_28[i].x=p.x;_28[i].y=p.y;t+=1/(this.iTotalFrames-1);}}return _28;};ygAnim_Move.prototype.cacheTween=function(){this.aTween=this.createTween(this._points,this.iTotalFrames);};ygAnim_Move.prototype.handleOptions=function(_29){this.setPoints(_29);};ygAnim_Move.prototype.setPoints=function(_30){if(_30.length==2){if(typeof _30[0]=="number"){_30=[_30];}}var _31=this._getPos();_30.unshift(_31);this._points=_30;if(this.aTween){this.cacheTween();}};ygAnim_Move.prototype.setStart=function(_32){this._points[0]=_32;if(this.aTween){this.cacheTween();}};ygAnim_Move.prototype._getPoint=function(t){var _33={};var _34=null;if(this.getStyle("position")!="relative"&&this.oDomRef.offsetWidth){_34=this.oDomRef.offsetParent;}var _35={x:0,y:0};while(_34&&_34.tagName!="HTML"&&_34.tagName!="BODY"){_35.x+=_34.offsetLeft;_35.y+=_34.offsetTop;_34=_34.offsetParent;}var pos=ygBezier.getPosition(this._points,t);_33.x=Math.round(pos.x)-_35.x;_33.y=Math.round(pos.y)-_35.y;return _33;};ygAnim_Move.prototype._getPos=function(){var pos=[0,0];if(this.getStyle("position")&&this.getStyle("position")=="relative"){if(this.getStyle("left").indexOf("px")!=-1){pos[0]=parseInt(this.getStyle("left"));}else{pos[0]=0;}if(this.getStyle("top").indexOf("px")!=-1){pos[1]=parseInt(this.getStyle("top"));}else{pos[1]=0;}}else{if(typeof ygPos!="undefined"){pos=ygPos.getPos(this.oDomRef);}else{if(this.oDomRef.offsetWidth){pos=[this.oDomRef.offsetLeft,this.oDomRef.offsetTop];var _37=this.oDomRef.offsetParent;if(_37!=this.oDomRef){while(_37){pos[0]+=_37.offsetLeft;pos[1]+=_37.offsetTop;_37=_37.offsetParent;}}}}}return pos;};ygAnim_Size.prototype=new ygAnim();function ygAnim_Size(el,_38,_39){if(el){this.init(el,_38,_39);}}ygAnim_Size.prototype.doTween=function(){var p={};if(!this.oDomRef){ygAnimMgr.stop(this);return false;}if(!this.aTween||!this.aTween[this.iCurrentFrame]){if(this.iCurrentFrame===0){this._t=0;}p=ygBezier.getPosition(this._sizes,this._t);this._t+=1/(this.iTotalFrames-1);}else{p=this.aTween[this.iCurrentFrame];}this.oDomRef.style.width=Math.round(p.x)+"px";this.oDomRef.style.height=Math.round(p.y)+"px";};ygAnim_Size.prototype.createTween=function(_40){var t=0;var _41=[];if(_40){for(var i=0;i<this.iTotalFrames;++i){_41[i]=ygBezier.getPosition(_40,t);t+=1/(this.iTotalFrames-1);}}return _41;};ygAnim_Size.prototype.cacheTween=function(){this.aTween=this.createTween(this._sizes,this.iTotalFrames);};ygAnim_Size.prototype.handleOptions=function(_42){this.setSizes(_42);};ygAnim_Size.prototype.setSizes=function(_43){if(_43.length==2){if(typeof _43[0]=="number"){_43=[_43];}}var _44=this._getSize();_43.unshift(_44);this._sizes=_43;if(this.aTween){this.cacheTween();}};ygAnim_Size.prototype.setStart=function(_45){this._sizes[0]=_45;if(this.aTween){this.cacheTween();}};ygAnim_Size.prototype._getSize=function(){var _46=[0,0];if(this.getStyle("width")&&this.getStyle("width").indexOf("px")!=-1){_46[0]=parseInt(this.getStyle("width"));}else{if(this.oDomRef.offsetWidth){_46[0]=this.oDomRef.offsetWidth;}}if(this.getStyle("height")&&this.getStyle("height").indexOf("px")!=-1){_46[1]=parseInt(this.getStyle("height"));}else{if(this.oDomRef.offsetHeight){_46[1]=this.oDomRef.offsetHeight;}}return _46;};ygAnim_Fade.prototype=new ygAnim();function ygAnim_Fade(el,_47,_48){if(el){if(_48===0){_48=0.01;}this.init(el,_47,_48);this.iTotalFrames=50*_47;}}ygAnim_Fade.prototype.doTween=function(){var p={};if(!this.oDomRef){ygAnimMgr.stop(this);return false;}if(!this.aTween||!this.aTween[this.iCurrentFrame]){if(this.iCurrentFrame===0){this._t=0;}p=ygBezier.getPosition(this._opac,this._t);this._t+=1/(this.iTotalFrames-1);}else{p=this.aTween[this.iCurrentFrame];}p.x=Math.round(p.x*100)/100;this.oDomRef.style.filter="alpha(opacity="+p.x*100+")";this.oDomRef.style.opacity=p.x;this.oDomRef.style["-moz-opacity"]=p.x;this.oDomRef.style["-khtml-opacity"]=p.x;};ygAnim_Fade.prototype.createTween=function(_49){var t=0;var _50=[];for(var i=0;i<this.iTotalFrames;++i){_50[i]=ygBezier.getPosition(this._opac,t);t+=1/(this.iTotalFrames-1);}return _50;};ygAnim_Fade.prototype.cacheTween=function(){this.aTween=this.createTween(this._opac,this.iTotalFrames);};ygAnim_Fade.prototype.handleOptions=function(_51){this.setOpac(_51);};ygAnim_Fade.prototype.setOpac=function(_52){if(typeof _52=="number"){_52=[[_52,1]];}else{for(var i=0;i<_52.length;++i){_52[i]=[_52[i],1];}}var _53=[this._getOpac(),1];_52.unshift(_53);this._opac=_52;if(this.aTween){this.cacheTween();}};ygAnim_Fade.prototype.setStart=function(_54){if(_54==="0"){_54=0.01;}else{if(_54=="1"){_54=0.99;this.oDomRef.style.opacity=_54;}}this._opac[0]=[_54,1];if(this.aTween){this.cacheTween();}};ygAnim_Fade.prototype._getOpac=function(){var _55;if(this.getStyle("opacity")){_55=this.getStyle("opacity");}else{if(this.getStyle("-moz-opacity")){_55=this.getStyle("-moz-opacity");}else{_55=0.99;}}if(_55=="0"){_55=0.01;}else{if(_55=="1"){_55=0.99;this.oDomRef.style.opacity=_55;}}return _55;};ygAnim_Scroll.prototype=new ygAnim();function ygAnim_Scroll(el,_56,_57){if(el){this.init(el,_56,_57);}}ygAnim_Scroll.prototype.doTween=function(){var p={};if(!this.oDomRef){ygAnimMgr.stop(this);return false;}if(!this.aTween||!this.aTween[this.iCurrentFrame]){if(this.iCurrentFrame===0){this._t=0;}p=ygBezier.getPosition(this._points,this._t);this._t+=1/(this.iTotalFrames-1);}else{p=this.aTween[this.iCurrentFrame];}this.oDomRef.scrollLeft=p.x;this.oDomRef.scrollTop=p.y;};ygAnim_Scroll.prototype.createTween=function(_58){var t=0;var _59=[];if(_58){for(var i=0;i<this.iTotalFrames;++i){_59[i]={};var p=this._getPoint(t);_59[i].x=p.x;_59[i].y=p.y;t+=1/(this.iTotalFrames-1);}}return _59;};ygAnim_Scroll.prototype.cacheTween=function(){this.aTween=this.createTween(this._points,this.iTotalFrames);};ygAnim_Scroll.prototype.handleOptions=function(_60){this.setPoints(_60);};ygAnim_Scroll.prototype.setPoints=function(_61){if(_61.length==2){if(typeof _61[0]=="number"){_61=[_61];}}var _62=[this.oDomRef.scrollLeft,this.oDomRef.scrollTop];_61.unshift(_62);this._points=_61;if(this.aTween){this.cacheTween();}};ygAnim_Scroll.prototype.setStart=function(_63){this._points[0]=_63;if(this.aTween){this.cacheTween();}};
