<html>
<head>
<title>{PageTitle}</title>
<style type="text/css">

BODY, TD, P {
  font-family: sans-serif;
}

.pageheader {
  color:       #ffffff;
  background:  #339900;
  font-family: sans-serif;
}

.pagetitle {
  font-weight: bold;
  font-size:   large;
  font-family: sans-serif;
}

.pagesubtitle {
  font-size:   x-small;
  font-family: sans-serif;
}

.menubar {
  background:  #66cc33;
  color:       #ffffff;
  font-size:   small;
  font-family: sans-serif;
}

.menulink {
  color:       #ffffff;
}

</style>
</head>

<body bgcolor="#ffffff">

<table width="100%" border="1" cellpadding="2" cellspacing="0">
 <tr class="pageheader">
  <td width="32" height="32" valign="top">
   <img src="/pear-icon.png" width="32" height="32" alt="" /></td>
  <td valign="top" width="100%">
   <div class="pagetitle">{NodeName}&nbsp;</div>
   <div class="pagesubtitle">PEAR Wiki {Version}, logged in as {User}</div>
  </td>
 </tr>
 <tr class="menubar">
  <td width="100%" colspan="2">
   <a class="menulink" href="{Self}">Root</a> |
   <a class="menulink" href="{Self}?mode=new">new</a> |
   <a class="menulink" href="{Self}/{Node}?mode=edit">edit</a> |
   <a class="menulink" href="{Self}/{Node}?mode=delete">delete</a> |
   <a class="menulink" href="{Self}?mode=logout">logout</a> |
   <a class="menulink" href="{Self}/{Node}?mode=mail">mail to a friend</a>
  </td>
 </tr>
</table>
