## Project Requirements
1. SMTP Settings:

PHPMailer SMTP Settings:

inside _sendEmail.php file you need update ;

Username: your_gmail@gmail.com (Enter your Gmail address here)
Password: your_gmail_password (Add your Gmail API password here)
Sender Information: youremail@gmail.com (Enter email sender information here)


## Composer Requirement:
If you are sending emails via localhost, ensure that Composer is installed and up to date on your computer. If you do not have you can reach it fro there https://getcomposer.org/download/ 

## MySQL Database Settings:
Before you start the project make sure that you create this two tables named book_test and covid_data. 

markdown
Copy code
- book_test Table:

  ```sql
  CREATE TABLE IF NOT EXISTS book_test (
      id INT(11) AUTO_INCREMENT PRIMARY KEY,
      nhsNumber INT(10) NOT NULL,
      email VARCHAR(250) NOT NULL,
      nameSurname VARCHAR(250) NOT NULL,
      address1 VARCHAR(500) NOT NULL,
      address2 VARCHAR(500),
      postCode VARCHAR(15) NOT NULL
  );
covid_data Table:

sql
Copy code
CREATE TABLE IF NOT EXISTS covid_data (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(255),
    infected INT(11),
    tested INT(11),
    recovered INT(11),
    deceased INT(11)
);



## Google Analytics:
Ensure that you have entered the Google Tag Manager and relevant IDs for Google Analytics inside index.php file. These IDs allow you to monitor and analyze the performance of your project with Google Analytics.