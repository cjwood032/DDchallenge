# DDchallenge

Installation
1. Download or clone the git repository to where you host PHP files
2. You need to set up the database in order to continue, see "setting up the database"
3. Navigate to where you host PHP sites with to load the index /ddchallenge/public/index.php
4. You will have to create a logon if you want to test the functionalities of the pages




## Setting up the database.
The project was built using MySQL

1. Log in as the root user: mysql -u root -p
2. enter the password for the root user
3. Commands for tables.txt has all the necessary commands for building the tables, they can be copy and pasted directly.
4. Note, you do not have to create the user, but you will have to change db_credentials.php to reflect whichever user used and give that user access to the delta_defense database. 