SELECT * FROM students;

SELECT * FROM students
ORDER BY student_id ASC;

SELECT * FROM students
ORDER BY student_id DESC;

SELECT * FROM students
ORDER BY student_last_name ASC;

SELECT * FROM students
ORDER BY student_last_name DESC;

SELECT * FROM students
ORDER BY student_first_name ASC;

SELECT * FROM students
ORDER BY student_first_name DESC;


SELECT student_first_name,
student_last_name, 
FROM student,
WHERE student_id = 1
LIMIT 1;

UPDATE students
SET student_first_name = 'CHLOE',
student_last_name = 'ONAHON'
WHERE student_id = '1';

SELECT * FROM books;

SELECT * FROM books
ORDER BY book_id ASC;

SELECT * FROM books
ORDER BY book_id DESC;

SELECT * FROM books
ORDER BY book_title ASC;

SELECT * FROM books
ORDER BY book_title DESC;

SELECT * FROM books
ORDER BY book_author ASC;

SELECT * FROM books
ORDER BY book_author DESC;

SELECT * FROM books
ORDER BY book_categ ASC;

SELECT * FROM books
ORDER BY book_catef DESC;

SELECT book_title,
book_author,
book_categ
FROM books
ORDER BY book_title ASC;


SELECT book_title,
book_author,
book_categ
FROM books
ORDER BY book_author ASC;

SELECT book_title,
book_author,
book_categ
FROM books
ORDER BY book_categ ASC;

SELECT book_title,
book_author,
book_categ
FROM books
ORDER BY book_title ASC
LIMIT 1;

SELECT book_title,
book_author,
book_categ
FROM books
WHERE book_id = 1
LIMIT 1;

UPDATE books
SET book_title = 'I LOVE YOU SINCE 1892',
book_author = 'BINIBINI MIA',
book_categ = 'HISTORICAL-ROMANCE'
WHERE book_id = 1;