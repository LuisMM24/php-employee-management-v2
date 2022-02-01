/*    EMPLOYEE TABLE    */
DROP DATABASE IF EXISTS manage_employees;

CREATE DATABASE IF NOT EXISTS manage_employees;

USE manage_employees;

/*    USER TABLE    */
CREATE TABLE users (
  userId INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(16) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PRIMARY KEY (userId)
);

/*   INSERT TABLE USER    */
INSERT INTO
  users (name, email, password)
VALUES
  (
    'admin',
    'admin@assemblerschool.com',
    '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC'
  );

CREATE TABLE employees(
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  first_name VARCHAR(15) NOT NULL,
  last_name VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  gender VARCHAR (10) NOT NULL,
  city VARCHAR(20) NOT NULL,
  streetAddress INT(10) NOT NULL,
  state CHAR(5) NOT NULL,
  age INT(3) NOT NULL,
  postalCode INT(15) NOT NULL,
  phoneNumber INT(20) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(userId)
);

/*    TABLE OF EMPLOYEE */
INSERT INTO
  employees(
    id,
    user_id,
    first_name,
    last_name,
    email,
    gender,
    city,
    streetAddress,
    state,
    age,
    postalCode,
    phoneNumber
  )
VALUES
  (
    1,
    1,
    'Rick',
    'Lei',
    'jackon@network.com',
    'Male',
    'San Jone',
    126,
    'CA',
    24,
    394221,
    7383627627
  ),
  (
    2,
    1,
    'John D',
    'Doe',
    'jhondoe@foo.com',
    'Male',
    'New York',
    89,
    'WA',
    34,
    09889,
    1283645645
  ),
  (
    3,
    1,
    'Leila',
    'Mills',
    'mills@leila.com',
    'F',
    'San Diego',
    55,
    'CA',
    29,
    098765,
    9983632461
  ),
  (
    4,
    1,
    'Richard',
    'Desmond',
    'dismond@foo.com',
    'Male',
    'Salt lake city',
    90,
    'UT',
    30,
    457320,
    90876987
  ),
  (
    5,
    1,
    'Susan',
    'Smith',
    'susanmith@baz.com',
    'Female',
    'Louisville',
    43,
    'KNT',
    28,
    445321,
    22435548
  ),
  (
    6,
    1,
    'Brad',
    'Simpson',
    'brad@foo.com',
    'Male',
    'Atlanta',
    128,
    'GEO',
    40,
    394221,
    685463
  ),
  (
    7,
    1,
    'Neil',
    'Walker',
    'walkerneil@baz.com',
    'Male',
    'Nashville',
    1,
    'TN',
    42,
    90143,
    45372788
  ),
  (
    8,
    1,
    'Robert',
    'Thomson',
    'jackon@network.com',
    'Male',
    'New Orleans',
    126,
    'LU',
    24,
    63281,
    91232876
  ),
  (
    9,
    1,
    'Ivan',
    'Gunchev',
    'ivan@ivan.com',
    'Male',
    'Valencia',
    1,
    'CV',
    35,
    46000,
    666555444
  );