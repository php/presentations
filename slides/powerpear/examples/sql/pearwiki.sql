CREATE TABLE nodes (
       name      VARCHAR(200) NOT NULL,
       id        INTEGER NOT NULL,
       content   TEXT,
       mtime	 INTEGER,
       PRIMARY KEY(name),
       UNIQUE INDEX(id)
);

CREATE TABLE users (
       username  VARCHAR(20) NOT NULL,
       password  VARCHAR(32),
       PRIMARY KEY(username)
);
