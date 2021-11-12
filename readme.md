# Autoconnection process

The Home page requires a connection to a user, so after run all the tests, 
you will need to change the configuration file that is name "config.php" 
and change the value of the user you want to pick.

```php
<?php
const AUTOLOGINID = 7;
```
And reload the autoloader file.

# Database connection

During the conception of this project, i used MariaDB for my database server, you can download it directly here[https://mariadb.org/download/?t=mariadb&p=mariadb&r=10.6.5&os=windows&cpu=x86_64&pkg=msi&m=mva]

After that you can execute my script : "create_teambuilder_and_inserts.sql" that you can find in the folder "SQL", it will create the database and insert all the data needed.

# Modification from the exam
All the modifications in the database that the exam required is in the folder "sql/Examen_request.sql", you can launch it for add all the updates that i made.