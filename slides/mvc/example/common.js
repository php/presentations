// Catch JSON replies
var fN = function callBack(o) {
  myDebug(o.responseText);
  var resp = eval('(' + o.responseText + ')');
  if(resp['debug']) {
    myDebug(resp["debug"]);
  }
  // Put up a Status message and fade it out
  if(resp['status']) {
    div = document.createElement("div");
    div.className='status'; 
    div.innerHTML = resp['status'];
    pos = YAHOO.util.Dom.getXY(resp['elem']);
    div.style.visibility = 'hidden'
    document.body.appendChild(div);
    YAHOO.util.Dom.setXY(div,[pos[0],pos[1]+40]);
    div.style.visibility = 'visible'
    fnc = function() {
      if(resp['reset']) { 
         document.forms[resp['formName']].reset();
      }
      window.location.reload(false);
    }
    fade(div,2,fnc);
  }
  // Flash the field that had the error
  if(resp['validate_error']) {
    var el = document.getElementById(resp['validate_error']);
    var over = el.cloneNode(true);
    over.style.position = 'absolute';
    over.style.zIndex=9999;
    addClass(over,'error');
    over.style.visibility = 'hidden'
    document.body.appendChild(over);
    YAHOO.util.Dom.setXY(over, YAHOO.util.Dom.getXY(el));
    over.style.visibility = 'visible'

    // Whoa - nested onCompletes can look a bit confusing ;)
    fade(over,0.5, function() { 
      unfade(over,0.5, function() { 
        fade(over,2, function() { 
          over.parentNode.removeChild(over);
        } ); 
      } );
    } );
  } 
  // Fill in formName
  if(resp['load_item']) {
    var oForm = document.forms[resp['formName']];
    for(var k in resp.load_item[0]) {
      if(oForm['f_'+k]) {
        if(resp.load_item[0][k].length) 
             oForm['f_'+k].value = resp.load_item[0][k];
        else oForm['f_'+k].value = oForm['desc_'+k].value;
      }
    }
  }
}

var callback = { success:fN }

// Post form fields from formName to target
function postForm(target,formName) {
  YAHOO.util.Connect.setForm(formName);
  YAHOO.util.Connect.asyncRequest('POST',target,callback);
}

function postData(target,data) {
  YAHOO.util.Connect.asyncRequest('POST',target,callback,data);
}

function addClass(o,cls) {
  o.className+=" "+cls;
}

function delClass(o,cls) {
  o.className=o.className.replace(new RegExp(" "+cls+"\\b"), "");
}

function fade(o, dur, fnc) {
  var oAnim = new YAHOO.util.Anim(o, {opacity: {from: 1, to: 0}}, dur);
  if(fnc) oAnim.onComplete.subscribe(fnc);
  oAnim.animate();
}

function unfade(o, dur, fnc) {
  var oAnim = new YAHOO.util.Anim(o, {opacity: {from: 0, to: 1}}, dur);
  if(fnc) oAnim.onComplete.subscribe(fnc);
  oAnim.animate();
}

// Javascript for the item table
function clickItemPost(event) {
  var target = YAHOO.util.Event.getTarget(event, true);
  if(target.nodeName=='TD') target = target.parentNode;
  postData('add.php','formName=fItem&load_item=' + target.id);
}

function mouseoverItem() {
  this.className = 'its';
}

function mouseoutItemEven() {
  this.className = 'it0';
}

function mouseoutItemOdd() {
  this.className = 'it1';
}

function fancyItems() {
  var oT = document.getElementById('tItems');
  var oTr = oT.getElementsByTagName('TR');
  for(var i=0; i<oTr.length; i++){
    YAHOO.util.Event.addListener(oTr[i], "mouseover", mouseoverItem);
    YAHOO.util.Event.addListener(oTr[i], "mouseout", i%2 ? mouseoutItemOdd:mouseoutItemEven);
    YAHOO.util.Event.addListener(oTr[i], "click", clickItemPost);
  }
}

// Javascript for the form entry section

function onfocusFormElem(event) {
  var target = YAHOO.util.Event.getTarget(event, true);
  var descElem = document.getElementById('desc_'+target.name);
  if(document.all) { addClass(this,'iefocus') } 
  if(this.value == descElem.value) { this.value = ''; }

}

function onblurFormElem(event) {
  var target = YAHOO.util.Event.getTarget(event, true);
  var descElem = document.getElementById('desc_'+target.name);
  if(document.all) { delClass(this,'iefocus') }
  if(this.value == '') { this.value = descElem.value; }
}

function addHidden(oElm) {
  var newE = document.createElement("INPUT")
  newE.type = "hidden"; newE.value = oElm.value;
  newE.name = "desc_"+oElm.name; newE.id = newE.name;
  oElm.parentNode.insertBefore(newE, oElm);
}

function fancyForm() {
  var oF = document.forms['fItem'];
  var oElm = oF.getElementsByTagName('INPUT');
  var els = oElm.length;
  for(var i=0; i<els; i++) {
    if(oElm[i].type != 'hidden' && oElm[i].type != 'submit' && oElm[i].type != 'reset') {
      YAHOO.util.Event.addListener(oElm[i], "focus", onfocusFormElem);
      YAHOO.util.Event.addListener(oElm[i], "blur", onblurFormElem);
      addHidden(oElm[i]); i++; els++;
    }
  } 
  oElm = oF.getElementsByTagName('TEXTAREA');
  els = oElm.length;
  for(var i=0; i<els; i++) {
    if(oElm[i].type != 'hidden') {
      YAHOO.util.Event.addListener(oElm[i], "focus", onfocusFormElem);
      YAHOO.util.Event.addListener(oElm[i], "blur", onblurFormElem);
      addHidden(oElm[i]); i++; els++;
    }
  } 
  oElm = oF.getElementsByTagName('SELECT');
  els = oElm.length;
  for(var i=0; i<els; i++) {
    if(oElm[i].type != 'hidden') {
      addHidden(oElm[i]); i++; els++;
    }
  } 
}

function myDebug(msg) {
  var oDebug = document.getElementById('debug');
  if(typeof(msg)=='object') {
    tmp = '';
    for(var i in msg) {
      tmp += i + " = " + msg[i] + "<br />";
    }
  } else tmp = msg;
  oDebug.innerHTML = [oDebug.innerHTML,tmp,'<br />'].join('');
  oDebug.scrollTop = oDebug.scrollHeight * 2;
}
