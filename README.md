# PHP Note

This will be a small application to get more practice using PHP.  What I want to build is something similar to [Google Keep](https://www.google.com/keep/), with the primary goal being to learn how to create a PHP log-in system and getting more practice making a CRUD application.

This will be my 3rd PHP project this month (January 2018).  Hopefully I will continue building upon what I have learned from my previous experiences.

For a front-end framework, I will be using [Materialize CSS](http://materializecss.com/), which is something I haven't used in several months.  Anything new I learn while working with this framework I will also document.

## Resources        

As far as creating the log-in system, I will follow along with this [tutorial](https://www.youtube.com/watch?v=xb8aad4MRx8), documenting the process along the way for future use.

For CRUD features I will use the same things I learned from previous projects while looking for opportunities to improve upon what I learned before.

**Other PHP Projects**      

* [PHP Flashcards](https://github.com/xmtrinidad/Flashcard-PHP)
* [Video Game Music](https://github.com/xmtrinidad/VideoGameMusic-PHP)

Any new resources I find while developing this application I will post in this section

## Login System

The sections below document how the login system for this application was created.  As I mentioned before, I am following along with a tutorial, adjusting it to fit my own application as I go along.

### Create a Database

Before touching PHP code, a database should be set-up through phpMyAdmin along with a table in that database that will hold the login information:

1.  From phpMyAdmin, click the Databases tab then enter a database name and click **Create**

2.  At this point, a table can be created by entering a table name, choosing the number of columns then clicking Go.  After clicking Go, table information can be entered and submitted.

    For the sake of practicing SQL (And because the tutorial I'm following does it this way), the alternative approach to creating a table will be used, which is clicking the SQL tab and entering a SQL query.

3. After clicking the SQL tab, the following query will create a users table along with table columns:
    ```sql
    CREATE TABLE users (
        user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_first VARCHAR(256) NOT NULL,
        user_last VARCHAR(256) NOT NULL,
        user_email VARCHAR(256) NOT NULL,
        user_uid VARCHAR(256) NOT NULL,
        user_pwd VARCHAR(256) NOT NULL
    );
    ```

Now the database is setup, waiting for information to add to the table from the application.

### Connect to the Database

A best practice when including PHP that won't be included in the website is to create another folder for those PHP files.  For this application I created a config folder and will put any PHP files that won't be displayed on the website in this folder.

One such file is the PHP file that connects to the database named **dbh.config.php**.  Another best practice for pure PHP files is to only include the opening ```<?php``` tag and not closing it.  The reasons for doing so can be found at this [stack overflow](https://stackoverflow.com/questions/4410704/why-would-one-omit-the-close-tag) link.

This project is using the [MySQL Improved Extension](http://php.net/manual/en/book.mysqli.php) (mysqli) to interact with the database.  (Another popular way to interact with databases in PHP is using [PHP Data Objects](http://php.net/manual/en/intro.pdo.php), which I experimented with in [another project](https://github.com/xmtrinidad/Flashcard-PHP)).

[Connecting](http://php.net/manual/en/mysqli.quickstart.connections.php) to the database requires four things to get started:
    1.  Server Name
    2.  Database user name
    3.  Database password
    4.  Database name





