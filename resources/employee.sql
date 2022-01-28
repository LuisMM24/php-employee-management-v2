/*    EMPLOYEE TABLE    */
DROP DATABASE IF EXISTS manage_employees;
CREATE DATABASE IF NOT EXISTS manage_employees;
USE manage_employees;

CREATE TABLE employees(
  userId         INT            NOT NULL,
  birth_date     DATE           NOT NULL,
  first_name     VARCHAR(15)    NOT NULL,
  last_name      VARCHAR(15)    NOT NULL,
  gender         ENUM ('M','F') NOT NULL,
  PRIMARY KEY (userId)
);


/*    USER TABLE    */

CREATE TABLE users (
    userId        INT              NOT NULL,
    name          VARCHAR(16)      NOT NULL,
    password    VARCHAR(255)       NOT NULL,
    email       VARCHAR(255)       NOT NULL,
    PRIMARY KEY (userId)
);

/*   INSERT TABLE USER    */

INSERT INTO users (name, email, password) VALUES
('admin', 'admin@assemblerschool.com', '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC');

/*    TABLE OF EMPLOYEE */

INSERT INTO employees (userId, birth_date, first_name, last_name, gender) values
('1', '1988-08-12', 'Leomery', 'Briceño', 'F'),
('2', '1987-06-15', 'Nick', 'Mujica', 'M'),
('3', '1990-08-25', 'Stevens', 'Villamizar', 'M'),
('4', '1992-04-21', 'Kory', 'Perez', 'F'),
('5', '1992-12-22', 'Atteneri', 'Cute', 'F'),
('6', '1991-03-22', 'Alejandra', 'Blue', 'F'),
('7', '1993-03-24', 'Alexis', 'Silver', 'M'),
('8', '1991-02-24', 'Angel', 'Martin', 'M'),
('9', '1988-02-24', 'Alberto', 'Garcia', 'M'),
('10', '1989-02-24', 'Alberto', 'Garcia', 'M'),
('11', '1990-08-14', 'Romel', 'Garcia', 'M'),
('12', '1988-06-15', 'Fran', 'Covid', 'M'),
('13', '1992-05-16', 'Paola', 'Fer', 'F'),
('14', '1989-08-18', 'Isma', 'Rodriguez', 'M'),
('15', '1988-12-28', 'Gonzalo', 'Cachon', 'M');

