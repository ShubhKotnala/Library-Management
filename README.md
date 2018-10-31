# Library Management System

Library management system is a simple website that handles the basic operations of any library including book issuing, searching, fine on late return, user and admin login, etc.

### Technologies Used
- HTML
- CSS
- JavaScript
- PHP
- MySql

# Features

- Login protected using Captcha
- Search for the books in the database
- Request for the book
- Separate console for Admin
- Add/Remove/Edit book database
- Add/Remove user
- Change Password(encrypted)

# Prerequisites

To run this project, you are required to fulfill the following requirements
- A Web Server
- Database(MySql)
**That's it!**


# Getting Started

Clone this repository and modify the contents of the following files to get connected to your Database.

- /src/php/config.php
- /src/php/config.inc
```
<?php
//Your host name
$sDbHost = 'Host';
//Your Database Name
$sDbName = 'YourDatabaseName';
//Username to access the database
$sDbUser = 'YourDBUserName';
//Password to authenticate the connection to the Database
$sDbPwd = 'YourDBPassword';
...
?>
```
- Use the ` 'library.sql' ` to import the database structure.

**That's it! You can now go to your server directory and use this project.**
