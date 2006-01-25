
// Catch JSON replies
var fN = function callBack(o) {
  if(o.readyState == 4) {
    myDebug(o.responseText);
    var resp = eval('(' + o.responseText + ')');
    if(resp['debug']) {
      myDebug(resp["debug"]);
    }
    // Put up a Status message and fade it out
    if(resp['status']) {
      var el = document.getElementById(resp['elem']);
      div = document.createElement("div");
      div.className='status'; 
      div.innerHTML = resp['status'];
      pos = ygPos.getPos(el);
      ygPos.setPos(div,[pos[0],pos[1]+40]);
      document.body.appendChild(div);
      fnc = function() {
        if(resp['reset']) { document.forms[resp['formName']].reset(); }
        window.location.reload(false);
      }
      fade(div,4,fnc);
    }
    // Flash the field that had the error
    if(resp['validate_error']) {
      var el = document.getElementById(resp['validate_error']);
      var over = el.cloneNode(true);
      over.style.zIndex=9999;
      addClass(over,'error');
      ygPos.setPos(over,ygPos.getPos(el));
      document.body.appendChild(over);
      fnc = function() {
        over.parentNode.removeChild(over);
      }
      fade(over,0.5); unfade(over,0.5);
      fade(over,0.5); unfade(over,0.5);
      fade(over,3,fnc);
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
}

// Post form fields from formName to target
function postForm(target,formName) {
   var req_o = ygConn.getObject();
   ygConn.http.setForm(formName);
   ygConn.http.asyncRequest(req_o,'POST',target,false,fN,null);
}

function postData(target,postData) {
   var req_o = ygConn.getObject();
   ygConn.http.asyncRequest(req_o,'POST',target,false,fN,null,postData);
}

function addClass(o,cls) {
   o.className+=" "+cls;
}

function delClass(o,cls) {
   o.className=o.className.replace(new RegExp(" "+cls+"\\b"), "");
}

function fade(o, dur, fnc) {
  var a = [ 1, .3, 0 ];
  var oAnim = new ygAnim_Fade(o, dur, a);
  if(fnc) oAnim.onComplete=fnc;
  oAnim.setStart(1);
  oAnim.animate();
}

function unfade(o, dur, fnc) {
  var a = [ 0, .7, 1 ];
  var oAnim = new ygAnim_Fade(o, dur, a);
  if(fnc) oAnim.onComplete=fnc;
  oAnim.setStart(0);
  oAnim.animate();
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
