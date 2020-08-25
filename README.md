# Basic-Learning-Management-System-PHP
This is my second project on web development based on core PHP and MySQL and i also used a package(phpoffice/phpspreadsheet) downloaded from Composer. This project had CRUD and Content Upload operations for Excel and Word Files usually involving data from MySQL database tables.

# Tecnologies 
  * PHP-7
  * Bootstrap-4
  * HTML
  * CSS
  * MySQL
  * 3rd Party Packages.

# Interface
The first page “home.php” will be featuring a login button for admin/user/teacher after that they will be redirected to a page of their specific features respectively.

  * Home page has choice of semester and course using drop down for teacher and student.
  * There are Course Assignments and MCQ tabs for teacher and students, each tab has its respective functionality for the respective user.
  * File Submit option for assignments and attempt quiz option for MCQs for every student and for each course they are enrolled in. 
  * Teachers can give assignments and make MCQ quiz for any course they are teaching.
  * All uploaded files by teacher and submitted files by students are be saved in database. These files must be in excel(xlsx/xls) or word(doc,docx) format. 
  * Student and teachers and download the files as well as upload them.
  * Admin Features such as add/delete user etc.
  
# Project Installation
 * Download the project and Setup the localhost.
 * After the localhost connection has been established the `code` folder must be placed into the `htdocs` folder ( a subfolder in the main XAMPP installation directory folder). 
 * Database (in `database` folder) must be imported into MySQL for the code to function properly, Database username and password are the default onez for Xampp.
 * To run the project type the link http://localhost[:PORT_NO_IF_ANY]/ [the name of the project folder]/ into the URL bar of the browser, which will take you to the home.php page. The process after that is already explained above.

# Project Demo
A demo video is available on [https://youtu.be/Jcf9aVP1OMU]. Previews are also available on this repo in `Previews` Folder

# More Info
The project was created 11-12 months before today(25/8/2020) on PHP-7.0 version, i had no clue about Github at that time so did'nt uploaded back then, the project does have some bugs which i did not fix.This project is an extension of my first project [https://github.com/huzaifa-99/attendance-system-php] and uses the same database.

The main aim of this project was for me to use a third party API/package and understand how `composer` works.
