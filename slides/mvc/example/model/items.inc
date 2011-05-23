<?php
/*
  id    INTEGER PRIMARY KEY,
  cat   TEXT NOT NULL,
  sdesc TEXT NOT NULL,
  ldesc TEXT NOT NULL,
  price REAL DEFAULT 0
*/

class items extends db {
  function insert($item) {
    $t = $_SERVER["REQUEST_TIME"];
    try {
      if(!self::$dbh) $this->connect();
      self::$dbh->beginTransaction();
      $stmt = self::$dbh->prepare("INSERT INTO items 
                                    (id,cat,sdesc,ldesc,price,ctime)
                                   VALUES 
                                    (NULL,:cat,:sdesc,:ldesc,:price,$t)");
      $params = array(':cat'  =>$item['cat'],
                      ':sdesc'=>$item['sdesc'],
                      ':ldesc'=>$item['ldesc'],
                      ':price'=>$item['price']);
      $ret = $stmt->execute($params);
      self::$dbh->commit();
    } catch (PDOException $e) {
      self::$dbh->rollback();
      $this->fatal_error($e->getMessage());
    }
    return $ret;
  }

  function modify($item) {
    try {
      if(!self::$dbh) $this->connect();
      self::$dbh->beginTransaction();
      $stmt = self::$dbh->prepare("UPDATE items SET 
                                    cat=:cat, sdesc=:sdesc, 
                                    ldesc=:ldesc, price=:price 
                                   WHERE id=:id");
      $params = array(':cat'  =>$item['cat'],
                      ':sdesc'=>$item['sdesc'],
                      ':ldesc'=>$item['ldesc'],
                      ':price'=>$item['price'],
                      ':id'=>$item['id']);
      $ret = $stmt->execute($params);
      self::$dbh->commit();
    } catch (PDOException $e) {
      self::$dbh->rollback();
      $this->fatal_error($e->getMessage());
    }
    return $ret;
  }

  function load($id=-1) {
    $where = '';

    if($id!=-1) $where = "where id=".(int)$id;
    try {
      if(!self::$dbh) $this->connect();
      $result = self::$dbh->query("SELECT * FROM items
                             $where order by ctime desc");
      $rows = $result->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
      $this->fatal_error($e->getMessage());
    }
    // Some databases can do this right in the SELECT
    // SQLite can't, so we add a formatted column ourselves
    foreach($rows as $i=>$row) {
      $rows[$i]['fprice'] = number_format($row['price'],2);
    }
    return $rows;
  }
}
?>
