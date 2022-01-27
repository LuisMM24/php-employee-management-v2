CREATE TABLE users(
  userId         INT            NOT NULL,
  birth_date     DATE           NOT NULL,
  first_name     VARCHAR(15)    NOT NULL,
  last_name      VARCHAR(15)    NOT NULL,
  gender         ENUM ('M','F') NOT NULL,
  PRIMARY KEY (userId)
);

/*    TABLE OF EMPLOYEE */

INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) values
('1', '1988-08-12', 'Leomery', 'Briceño', 'F', '2000-05-11',)
('2', '1987-06-15', 'Nick', 'Mujica', 'M', '2000-05-11'),
('3', '1990-08-25', 'Stevens', 'Villamizar', 'M', '2000-05-11'),
('4', '1992-04-21', 'Kory', 'Perez', 'F', '2000-05-11'),
('5', '1992-12-22', 'Atteneri', 'Cute', 'F', '2000-05-11'),
('6', '1991-03-22', 'Alejandra', 'Blue', 'F', '2000-05-11'),
('7', '1993-03-24', 'Alexis', 'Silver', 'M', '2000-05-11'),
('8', '1991-02-24', 'Angel', 'Martin', 'M', '2000-05-11'),
('9', '1988-02-24', 'Alberto', 'Garcia', 'M', '2000-05-11'),
('10', '1989-02-24', 'Alberto', 'Garcia', 'M', '2000-05-11'),
('11', '1990-08-14', 'Romel', 'Garcia', 'M', '2000-05-11'),
('12', '1988-06-15', 'Fran', 'Covid', 'M', '2000-05-11'),
('13', '1992-05-16', 'Paola', 'Fer', 'F', '2000-05-11'),
('14', '1989-08-18', 'Isma', 'Rodriguez', 'M', '2000-05-11'),
('15', '1988-12-28', 'Gonzalo', 'Cachon', 'M', '2000-05-11');
