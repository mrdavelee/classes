<h1>Readme for the classes demo</h1>

<h2>Sanitisation</h2>
Sanitisation in the form of ```mysqli_real_escape_string()``` is not included in the demo.

<h2>Setup</h2>

to set up the app the following sql should be added to a database named <strong>test</strong>

```
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `join_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
```
