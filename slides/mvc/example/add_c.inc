<?php
include './model/db.inc';
include './model/items.inc';
$db = new items();
if($_SERVER['REQUEST_METHOD']=='POST') {
  header("Content-type: application/json");
  // Load an item entry from backend and send JSON request to populate form
  if(isset($_POST['load_item'])) {
    $entry = $db->load($_POST['load_item']);
    $entry[0]['submit'] = 'Modify Item';
    if($entry) echo json_encode(array('formName'=>$_POST['formName'],
                                      'load_item'=>$entry));
    exit;
  }
  // Validate form fields
  foreach($_POST as $k=>$v) {
    if(substr($k,0,5)=="desc_") {
      if(isset($_POST[substr($k,5)]) && $_POST[substr($k,5)]==$v) {
        echo json_encode(array('validate_error'=>'f_'.substr($k,5)));
        exit;
      }
    }
  }
  // Save changes and display status message
  $status = "Failure";
  if($_POST['f_submit']=='Modify Item') {
     $ret = $db->modify($_POST);
     if($ret) $status = "Modified";
  } else {
     $ret = $db->insert($_POST);
     if($ret) $status = "Added";
  }
  echo json_encode(array('status'=>$status,
                         'elem'=>'tItems',
                         'reset'=>$ret,
                         'formName'=>$_POST['formName']));
  exit;
}

// Initialize view data
if(!isset($categories)) load_list('categories');
if(!isset($item)) $item = array('cat'=>'');
$items = $db->load();
?>
