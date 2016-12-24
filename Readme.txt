I've attached table and database dumps to this archive.
In case you have porblems here is sequence of commands to do it manually:

1) Create database `clients`

2) Create table `users`:

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `SecondName` text NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;# MySQL вернула пустой результат (т.е. ноль строк).


3) Insert info into database:
INSERT INTO `users` (`id`, `FirstName`, `SecondName`, `Email`) VALUES
(0, 'Vitaliy', 'Matveev', '123@mail.ru');


My server configuration:
Apache 2.4
PHP 5.6
MY SQL 5.5