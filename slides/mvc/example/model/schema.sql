DROP TABLE items;
CREATE TABLE items (
  id    INTEGER PRIMARY KEY,
  cat   TEXT NOT NULL,
  sdesc TEXT NOT NULL,
  ldesc TEXT NOT NULL,
  price REAL DEFAULT 0,
  ctime TEXT NOT NULL
);
