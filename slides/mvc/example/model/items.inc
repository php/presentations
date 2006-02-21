<?php
/*
  id    INTEGER PRIMARY KEY,
  cat   TEXT NOT NULL,
  sdesc TEXT NOT NULL,
  ldesc TEXT NOT NULL,
  price REAL DEFAULT 0
*/

function new_item($item) {
  global $dbh;
  $t = $_SERVER["REQUEST_TIME"];
  try {
    if(empty($dbh)) $dbh = db_connect();
    $stmt = $dbh->prepare("INSERT INTO items 
                           (id,cat,sdesc,ldesc,price,ctime)
                           VALUES 
                           (NULL,:cat,:sdesc,:ldesc,:price,$t)");
    $stmt->bindParam(':cat', $item['cat']); 
    $stmt->bindParam(':sdesc', $item['sdesc']); 
    $stmt->bindParam(':ldesc', $item['ldesc']); 
    $stmt->bindParam(':price', $item['price']); 
    $ret = $stmt->execute();
  } catch (PDOException $e) {
    db_fatal_error($e->getMessage());
  }
  return $ret;
}

function modify_item($item) {
  global $dbh;

  try {
    if(empty($dbh)) $dbh = db_connect();
    $stmt = $dbh->prepare("UPDATE items SET 
                                  cat=:cat, sdesc=:sdesc, 
                                  ldesc=:ldesc, price=:price 
                            WHERE id=:id");
    $stmt->bindParam(':cat', $item['cat']); 
    $stmt->bindParam(':sdesc', $item['sdesc']); 
    $stmt->bindParam(':ldesc', $item['ldesc']); 
    $stmt->bindParam(':price', $item['price']); 
    $stmt->bindParam(':id', $item['id']); 
    $ret = $stmt->execute();
  } catch (PDOException $e) {
    db_fatal_error($e->getMessage());
  }
  return $ret;
}

function load_items($id=-1) {
  global $dbh;
  $where = '';

  if($id!=-1) $where = "where id=$id";
  try {
    if(empty($dbh)) $dbh = db_connect();
    $result = $dbh->query("SELECT * FROM items
                           $where order by ctime desc");
    $rows = $result->fetchAll(PDO::FETCH_ASSOC); 
  } catch (PDOException $e) {
    db_fatal_error($e->getMessage());
  }
  // Some databases can do this right in the SELECT
  // SQLite can't, so we add a formatted column ourselves
  foreach($rows as $i=>$row) {
    $rows[$i]['fprice'] = number_format($row['price'],2);
  }
  return $rows;
}

?>
