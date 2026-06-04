CREATE DATABASE student_crud;

USE student_crud;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL
);

INSERT INTO students (name, email, course)
VALUES
('Francis Bolie', 'francisbolie@email.com', 'PHP Programming'),
('Annah Johnson', 'Annah@email.com', 'Database Design');