# PHP Note

## Update 2/9

I have deployed the demo app using DigitalOcean.  This is my first application deploying live where I had to use a service, along with the LAMP stack.  I will update this readme on the process of deploying this application within the next few days

<!-- Link to site: <http://www.xmtphp-note.bid/> -->
**2/12**        
**Site temporarily down as I work on a readme tutorial for deploying a PHP site on DigitalOcean**


**Main Table of Contents**      
[Introduction](#introduction)       
[Resources](#resources)       
[Login System](#login-system)       
[Refactor to Use Prepared Statements](#refactor-to-use-prepared-statements)       
[Mysqli Fetch](#mysqli-fetch)   




## Introduction

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

**Table of Contents**       
[Create a Database](#create-a-database)     
[Connect to the Database](#connect-to-the-database)     
[Signup Form](#signup-form)     
[Signup Script](#signup-script)     
[Login Script](#login-script)     
[Logout Script](#logout-script)     

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

When developing locally (and for this application) these are typically defined like so:
```php
$dbServername = "localhost"; // When deploying live change this to the name of the host server
$dbUsername = "root";
$dbPassword = ""; // By default, there is no password but for this application my db has a password
$dbName = "noteapp"; // this is just the name of the db that was setup earlier
```

These four variables can then be used to make a mysqli instance/connection:
```php
$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
```

### Signup Form

When clicking on the *log in* button on index.php, a modal opens up to sign in and there is a signup button as well.  Clicking on the signup button redirects to the **signup.php** page where there is a sign up form.  Here's a snippet of the important parts:
```html
<form action="config/signup.config.php" method="POST">
    <div class="row">
        <div class="input-field col m6 s12">
            <input name="first" id="first_name" type="text" class="validate">
            <label for="first_name">First Name</label>
        </div>
        <!-- ...more input fields... -->

        <!-- submit button -->
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="submit">Sign Up
                <i class="material-icons right">send</i>
            </button>
        </div>
</form>
```

The first thing to note is the **action** attribute on the form tag.  When submitting the form information, it goes to wherever the action points to.  In this case, there is another file named *signup.config.php* inside the config folder.  This file contains the PHP code that manipulates the data (more information about this file can be found in the next section).

The next important attribute of the form is the **method** attribute.  This attribute can be set to POST or GET.  For a more in depth explanation of the difference between the two, check out this [stack overflow](https://stackoverflow.com/questions/3477333/what-is-the-difference-between-post-and-get) page.

For a signup form like this, POST should be used instead of GET so that sensative information (such as passwords) are not displayed in the URL when submitting the form.

The most important part of the form inputs and submit button is ensuring a name attribute is set.  The input field name and button are set to "first" and "submit".  When submitting the form, the name set by the name attribute is how the information will be accessed from the **signup.config.php** file.

### Signup Script

As mentioned in the section before, the **signup.config.php** file is where the PHP code exist that will interact with the data submitted from the signup form.

The first thing to check for is that the signup for was submitted.  Without this check, a user could access the signup.config.php file by simply placing the file name inside the URL.  Since this file isn't meant to be seen or interacted with by a user, it's important to make sure the form was submitted.  This can be done by using the [isset()](http://php.net/manual/en/function.isset.php) function:
```php
if (isset($_POST['submit'])) {

} else {
    header("Location: ../signup.php");
    exit();
}
```
Passing ```$_POST['submit']``` to the isset() function checks if it results in NULL.  If the file is accessed from the URL, $_POST['submit'] would result in NULL (since it wasn't posted from the signup form) and would immediately go to the else clause, which sends the user back to the signup page and exits the script.

If isset() is not null, that means the information from the signup form was posted and the script will continue to process the information:
```php
include_once('dbh.config.php');

$first = mysqli_real_escape_string($mysqli, $_POST['first']);
$last = mysqli_real_escape_string($mysqli, $_POST['last']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$uid = mysqli_real_escape_string($mysqli, $_POST['uid']);
$pwd = mysqli_real_escape_string($mysqli, $_POST['pwd']);
```
To interact with the database, the config file [created earlier](#connect-to-the-database) needs to be included in the script.

All the $_POST information is passed into their own variables, which are all set to the [mysqli_real_escape_string](http://php.net/manual/en/mysqli.real-escape-string.php) function.  This function takes in the connection to the database (```$mysqli```) and the value from the $_POST.  Using the mysqli_real_escape_string is necessary to prevent SQL Injection.  Essentially, if a user attempts to pass in SQL commands into the input, they will be escaped and NOT interpreted as valid SQL commands, but instead as just regular text.

The next step is error handling, starting with checking for empty fields:
```php
//Check for empty fields
if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
    header("Location: ../signup.php?signup=empty");
    exit();
} else {
    // ...
}
```
If this passes, another check that can be performed is checking for valid characters in the inputs:
```php
//Check if input characters are valid
if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
    header("Location: ../signup.php?signup=invalid");
    exit();
} else {
    // ...
}
```
[preg_match(http://php.net/manual/en/function.preg-match.php)] performs a regular expression match.  The regular expression used in this example checks that the $first and $last variables only contain upper and lowercase letters.

Another error check could be checking if the email passed in is valid or not:
```php
// Check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?signup=email");
    exit();
} else { 
    // ...
}
```
Here, the [filter_var()](http://php.net/manual/en/function.filter-var.php) function is used to verify if an email is valid or not.

The final check before registering the user is to check if the username submitted already exist.  Doing this requires a query to be made:

```php
$sql = "SELECT * FROM users WHERE user_uid = $uid";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);
```

This query selects all users from the *users* table that matches the userid (```$uid```) created when the form was submitted.  The query is made using the ```mysqlil_query()``` function and set to the ```$result``` variable, which is then passed into the ```mysqli_num_rows()``` function that's set to the ```$resultCheck``` variable.  The mysqli_num_rows() function returns the number of rows from an SQL query.

```php
if ($resultCheck > 0) {
    header("Location: ../signup.php?signup=usertaken");
    exit();
}
```

If ```$resultCheck``` is a number greater than 0, then the user exist and the user is taken back to the signup page.

*There are several other checks that can be performed (and probably should be for production apps) like checking password length and character set, but for this example project these error handlers will be enough.*

If all these checks are passed, the user can be created and entered in the the database:

```php
//Hashing the password
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
//Insert the user into the database
$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
mysqli_query($mysqli, $sql);
header("Location: ../signup.php?signup=success");
exit();
```

Databases should never store passwords, instead they should store hashes of passwords.  This not only makes it more difficult for malicious users who steal information, but also prevents administrators from learning passwords as well.

As in the example above, the [password_hash()](http://php.net/manual/en/function.password-hash.php) function takes in the password (```$pwd```) submitted and, with the PASSWORD_DEFAULT argument, creates a new password hash using a hashing algorithm.

The newly converted hashed password, along with the first name, last name, email and userid are inserted into the users table.

Once the query is made, the page reloads.  The new user is registered and can now log in.


### Login Script

The PHP code that manipulates the login data can be found in the **login.config.php** file.  like the signup php file, the first thing to do is prevent users from navigating to the script through the URL by checking if the form was submitted:

```php
if (isset($_POST['submit'])) {
    // ...
}
```

If the login form was submitted, a connection to the database is made and the userid and password are set to variables:

```php
include('dbh.config.php');

$uid = mysqli_real_escape_string($mysqli, $_POST['uid']);
$pwd = mysqli_real_escape_string($mysqli, $_POST['pwd']);
```

Next, error handlers are performed starting with a check for empty fields:

```php
//Check if inputs are empty
if (empty($uid) || empty($pwd)) {
    header("Location: ../index.php?login=empty");
    exit();
}
```

The next check is to verify if a user exist in the database:

```php
$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1) {
    header("Location: ../index.php?login=error");
    exit();
}
```

In this code snippet, the users table is queried to get a ```user_uid``` or ```user__email``` based on the entered user (```$uid```).  If ```$resultCheck``` is less than 1, then a user does not exist.  The user is taken back to the index.php page and the script is exited.

If the script continues at this point, a user exist but the user password still needs to be verified.

As noted in the login script section, the password saved in the database is a hashed password.  Verifying that the password entered matches the hash password requires the ```password_verify()``` function.  This function takes in the entered password and the hashed password as arguments:

```php
//De-hashing the password
$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
if ($hashedPwdCheck == false) {
    header("Location: ../index.php?login=error");
    exit();
```

The ```password_verify()``` function will return a true or false value depending on if it is verified or not.  If it isn't, the script is exited and the user is taken back to the index.php page with a login error.

If password_verify() is true then the user is logged in and a session is started:

```php
//Log in the user here
$_SESSION['u_id'] = $row['user_id'];
$_SESSION['u_first'] = $row['user_first'];
$_SESSION['u_last'] = $row['user_last'];
$_SESSION['u_email'] = $row['user_email'];
$_SESSION['u_uid'] = $row['user_uid'];
header("Location: ../index.php?login=success");
exit();
```

The [$_SESSION](http://php.net/manual/en/reserved.variables.session.php) variable is a superglobal that allows access to the variable from all pages within the website.

In order for the $_SESSION variable to work within the website, it requires a session to be started.  This can be done using the ```session_start()``` function, which is placed at the top of the login script and at the top of the **header.php** file.

*The ```session_start()``` function is placed in the header.php file because the header.php file is included in all pages of the website, thus giving access to the $_SESSION variables to all pages on the website as well.*

To verify that the $_SESSION variables are working and that a session has successfully been started the following code can be placed into the index.php page:

```php
<?php
    if (isset($_SESSION['u_id'])) {
        echo "You are logged in!";
    }
?>
```

If the user id is seen on the page, then the $_SESSION variables are working and a session has been started.

### Logout Script

When clicking on the logout button inside the modal that pops out, the logout script is submitted:

```php
if (isset($_POST['submit'])) {
    session_start(); // required to destory session
    session_unset(); // unset session variables in the browser
    session_destroy();
    header("Location: ../index.php");
    exit();
}
```

As always, first there is a check to see if the form was submitted and not navigated to.  If it was submitted, ```session_unset()``` and ```session_destory()``` terminate the session, but in order to do so, ```session_start()`` needs to be included.

After the session is desotryed the script is exited and the user is taken back to the index.php page.


## Refactor to Use Prepared Statements

The login system tutorial I used as a guide to creating the login system for this application doesn't use prepared statements.  Although the ```mysqli_real_escape_string``` function is used for all variables, the best practice with modern PHP is to use prepared statements.

*Even while using the mysqli_real_escape_string() function, SQL Injection is still possible.  See this [stack overflow](https://stackoverflow.com/questions/5741187/sql-injection-that-gets-around-mysql-real-escape-string) page for a more detailed explanation.*

Selecting a user from the users table looks like this using a prepared statement:

```php
$sql = "SELECT * FROM users WHERE user_uid = ?";

// Prepared statements
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $uid);
$stmt->execute();

// Store result to get number of rows
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: ../signup.php?signup=usertaken");
    exit();
}
```

The ```$uid``` variable is no longer set directly in the SQL.  Instead, it's replaced with a ? place holder then a ```$stmt``` is prepared, passing in the $sql variable.  The bind_param() function is used to bind the variable to the placeholder when it is executed.

*bind_param() takes in at least two arguments.  The first argument is the data type of the variable, then, in order as they appear in the SQL query, the variables.*

After the variables are bound, the $stmt is executed.  For this particular statement, the result is stored using ```get_result()```and set to the $result variable.  The ```$result``` variable is then checked for the number of rows using the ```num_rows``` property.  If the number of rows is greater than 0, the user already exist in the database and is taken back to the sign up page.

Below is another example of using a prepared statement, this time with a longer SQL query:

```php
//Insert the user into the database
$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, 
user_pwd) VALUES (?, ?, ?, ?, ?);";

// Prepared statements
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('sssss', $first, $last, $email, $uid, $hashedPwd);
$stmt->execute();
```
It's the same process as the previous example that better demonstrates how bind_param() works.  Notice there are five placeholders, thus 5 ```sssss``` that represents each variable as a string.  Then each variable is passed into bind_param in the order they would be placed in the SQL query.

## Mysqli Fetch

Fetching data from a prepared statement using mysqli is a bit more involved compared to using PDO.  I found the solution at this [Stack Overflow](https://stackoverflow.com/questions/11048622/how-to-fetch-all-in-assoc-array-from-a-prepared-statement) page

Below is the prepared statement and the code that gets the query data:

```php
include('config/dbh.config.php');
$user_id = $_SESSION['u_id'];

$sql = "SELECT * FROM notes WHERE user_id = ?;";
// Prepared statements
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();

$result = $stmt->get_result();
// Put result data into $notes array
while ($data = $result->fetch_assoc()) {
    $notes[] = $data;
}
```

First a database connection is made then the $user_id is set to the $_SESSION u_id.  The user id is needed to get the users notes from the notes table.  The $user_id isn't passed directly into the SQL statement, but is instead prepared, bound and executed using prepared statements.

As before, the ```get_result()``` function is used to get the results from the prepared statement.  Using a while loop, the result data is converted to an associative array and each $data row is added to the ```$notes[]``` array.

Now that the needed data is in an array, it can be used within the HTML to create cards:

```php
<?php foreach ($notes as $note): ?>
    <div class="card blue-grey darken-1">
        <div class="card-content white-text">
            <span class="card-title"><?php echo $note['note_title']; ?></span>
            <p><?php echo $note['note_text']; ?></p>
        </div>
        <div class="card-action">
            <a href="#">Edit</a>
            <a href="#">Delete</a>
        </div>
    </div>
<?php endforeach; ?>
```

Here, a foreach loop is used to create cards and iterate over the $notes array to extract **note_title** and **note__text** to place in the card html. 








