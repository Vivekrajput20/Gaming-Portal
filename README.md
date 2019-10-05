# Gaming-Portal
A gaming portal for people of IIT Roorkee. A place where students can post about various games and gaming events and interested students can join them.
# Set Up
To begin working with this project, follow the steps below.

## Clone the repository
There are a number of tools you can use to clone the repository, which makes a copy on your local machine.

**Linux**

To do this is using SSH on the command line:

* Open a _terminal_
* Change to your desired directory, e.g. `cd ~/Projects/Gaming-Portal`
* Issue `git clone git@github.com:Vivekrajput20/Gaming-Portal.git`

## Create database and database user
This project uses MySQL (MariaDB should work) as its database engine.  You will need `mysql` installed on your computer in order to import the database.

First, login to `mysql` as the administrator user (root) by typing the following in your terminal:
`mysql -u root -p`  

* Create a database
```mysql
CREATE DATABASE gameportal;
``` 
* Create a user for the portal to use:  
```mysql
CREATE USER 'gameportal'@'localhost' IDENTIFIED BY 'PASSWORD_GOES_HERE';
```
* Grant the user all rights on the database `gameportal`:
```mysql
GRANT ALL ON gameportal.* TO gameportal@localhost;
``` 

## Initialise the database schema
Finally, import the database schema to your new database.  When prompted, you should enter the password you created in the previous step.

In a terminal:
```
mysql -u gameportal -p gameportal < Schema/gameportal.sql
```

You should replace the path (`Schema/gameportal.sql`) with the path to the provided `gameportal.sql` file.

## Configure the system
In the `public/includes` directory you will find `sample.config.php`.  Adjust the values to match the database configuration you used in the previous steps and save the file as `config.php`.

## Start the PHP server
Start the PHP server in Gaming-Portal directory by running `php -S localhost:8000` command in a terminal.

Browse the homepage at **http://localhost:8000/public/index.php** to access the system.
