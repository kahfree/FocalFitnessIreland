# Focal Fitness Ireland # 
## Purpose of the website ##
The problem this system solves is the lack of motivation to exercise, doing the same monotonous set of workouts each day. This leads to an abundance of time spent browsing fitness articles and/or watching YouTube tutorials to try and find that new workout that will ‘get you back into the swing of things.”.

The system will incorporate a library of workouts for the user to browse, along with the option for the user to randomly generate their own workout. By inputting the duration and targeted muscle, the system will respond with a circuit for the user to follow. The user will be able to save this randomly generated workout to their own personal ‘Workout Library’. They can also select that they have completed the workout, posting the workout details to their profile.

The System will be designed so that users can register to have an account and then login/log out.

A Moderator will be able to add workouts to a ‘Featured’ section in the library, as well as add/delete a workout within the database and . 

## Prerequisites ##
*Note: This is only for those who want to download the code for themselves and poke around with the internals*
* XAMPP. This is for hosting the website locally
  * Have both apache and sql instances running.
* An IDE of some sort. I personally use Visual Studio Code but any will work.
* (Optional) MySQL Workbench. As one can use PHPmyAdmin this is not required, but I personally use it.

## Installation ##
1.	Make sure your Apache server is running – check your XAMPP control panel
2.	Download and unzip the application file. Take the folder labelled “focal_fitness_ireland” and place this inside your htdocs folder (“C://xampp/htdocs”)
3.	Open the project folder in your IDE. 
4.	In the app folder there is a folder called ‘Database’, this is the database backup for the application, restore this database before using the application.
5.	Navigate to your “php.ini” file (C://xampp/php/”). In this file, uncomment (or remove the ‘;’) from the line “extension=intl”. Save this file and restart your apache server.
6.	Now enter the following url into your url bar in your browser “localhost/focal_fitness_ireland/project-root/public/”. This will bring you to the homepage of the application.

## Contributing ##
Issue Tracker: https://github.com/kahfree/FocalFitnessIreland/issues

## Contact ##
ethancaff@gmail.com

