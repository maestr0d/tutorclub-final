/*

////////////////////////

*/

id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
first_name varchar(30) NOT NULL,
middle_name varchar(30),
last_name varchar(30) NOT NULL,
gender varchar(1) NOT NULL,
birth_date DATE NOT NULL,
country_residence varchar(30) NOT NULL,
about_you varchar(255) NOT NULL,
school varchar(60),
degree varchar(60),
s_year_from YEAR,
s_year_to YEAR,
company varchar(30),
position varchar(30),
w_year_from YEAR,
w_year_to YEAR,

)


