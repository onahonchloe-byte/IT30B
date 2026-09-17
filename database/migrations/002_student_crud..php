-- student sql#1 : select 1 student
SELECT * FROM students;

-- student sql#2 : select students in asc order
SELECT * FROM students
ORDER BY student_id ASC;

-- student sql#3 : select students in desc order
SELECT * FROM students
ORDER BY student_id DESC;

-- student sql#4 : select students in asc order by last name
SELECT * FROM students
ORDER BY student_last_name ASC;

-- student sql#5 : select students in desc order by last name
SELECT * FROM students
ORDER BY student_last_name DESC;

-- student sql#6 : select students in asc order by first name
SELECT * FROM students
ORDER BY student_first_name ASC;

-- student sql#7 : select students in desc order by first name
SELECT * FROM students
ORDER BY student_first_name DESC;

-- you can modify displayed columns by selecting specific column after SELECT command
-- student sql#8 display all students first name and last name
SELECT student_first_name,
student_last_name
FROM students
ORDER BY student_first_name ASC;

-- student sql#9 LIMIT 1
SELECT student_first_name,
student_last_name
FROM students
ORDER BY student_first_name ASC
LIMIT 1;

-- student sql#10 - select student based on id
SELECT student_first_name,
student_last_name
FROM students
WHERE student_id = 1
LIMIT 1;


-- student sql#11 - update student name based on id
UPDATE students
SET student_first_name = 'CHLOE',
student_last_name = 'ONAHON'
WHERE student_id = 1;

-- student sql#1 : select 1 student
SELECT * FROM students;

-- student sql#2 : select students in asc order
SELECT * FROM students
ORDER BY student_id ASC;

-- student sql#3 : select students in desc order
SELECT * FROM students
ORDER BY student_id DESC;

-- student sql#4 : select students in asc order by last name
SELECT * FROM students
ORDER BY student_last_name ASC;

-- student sql#5 : select students in desc order by last name
SELECT * FROM students
ORDER BY student_last_name DESC;

-- student sql#6 : select students in asc order by first name
SELECT * FROM students
ORDER BY student_first_name ASC;

-- student sql#7 : select students in desc order by first name
SELECT * FROM students
ORDER BY student_first_name DESC;

-- you can modify displayed columns by selecting specific column after SELECT command
-- student sql#8 display all students first name and last name
SELECT student_first_name,
student_last_name
FROM students
ORDER BY student_first_name ASC;

-- student sql#9 LIMIT 1
SELECT student_first_name,
student_last_name
FROM students
ORDER BY student_first_name ASC
LIMIT 1;

-- student sql#10 - select student based on id
SELECT student_first_name,
student_last_name
FROM students
WHERE student_id = 1
LIMIT 1;


-- student sql#11 - update student name based on id
UPDATE students
SET student_first_name = 'CHLOE',
student_last_name = 'ONAHON'
WHERE student_id = 1;

-- books sql#1 : select 1 books
SELECT * FROM books;

-- books sql#2 : select books in asc order
SELECT * FROM books
ORDER BY book_id ASC;

-- books sql#3 : select books in desc order
SELECT * FROM books
ORDER BY book_id DESC;

-- books sql#4 : select books in asc order by title
SELECT * FROM books
ORDER BY book_title ASC;

-- books sql#5 : select books in desc order by title
SELECT * FROM books
ORDER BY book_title DESC;

-- books sql#6 : select books in asc order by author
SELECT * FROM books
ORDER BY book_author ASC;

-- books sql#7 : select books in desc order by author
SELECT * FROM books
ORDER BY book_author DESC;

-- books sql#8 : select books in asc order by categoryory
SELECT * FROM books
ORDER BY book_category ASC;

-- books sql#9 : select books in desc order by categoryory
SELECT * FROM books
ORDER BY book_category DESC;


SELECT book_title,
book_author,
book_category
FROM books
ORDER BY book_title ASC;


SELECT book_title,
book_author,
book_category
FROM books
ORDER BY book_author ASC;

SELECT book_title,
book_author,
book_category
FROM books
ORDER BY book_category ASC;

SELECT book_title,
book_author,
book_category
FROM books
ORDER BY book_title ASC
LIMIT 1;

SELECT book_title,
book_author,
book_category
FROM books
WHERE book_id = 1
LIMIT 1;

UPDATE books
SET book_title = ' I love since 1892',
book_author = 'Binibini Mia',
book_category = 'History-Romance'
WHERE book_id = 1;