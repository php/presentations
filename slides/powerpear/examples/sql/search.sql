CREATE TABLE dictionary (
       word      VARCHAR(200) NOT NULL,
       PRIMARY KEY(word)
);

CREATE TABLE page_index (
       word      VARCHAR(200) NOT NULL,
       node      INTEGER NOT NULL,
       position  INTEGER,
       PRIMARY KEY(word,page)
);

