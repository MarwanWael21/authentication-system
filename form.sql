CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nickname varchar(25) UNIQUE,
    username varchar(25),
    email varchar(50),
    password varchar(100), 
    avatar varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;