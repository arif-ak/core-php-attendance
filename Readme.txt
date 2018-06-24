* db -> attendance.sql
*login for student and teacher is given in db
teacher : username:teacher1,password:12345
student : roll_number:4pa14cs001,password:12345
*index.php shows list of students who have registered for teacher
*Create new session allows teacher to 
	:create a password for every session he/she takes
	:add a question for every session
*Create new session forces teacher to login if teacher has not logged in to the system

*students are required to login to /login.php, which has roll number and password as credentials
*students have to enter session password from one minute of creation of session, or else they will not be allowed to enter attendance.
*upon entering correct password, student is asked a question with 4 options(created by teacher at time of session creation) and feedback for the session.
*once students submits form, teacher can see attendance log in /index.php