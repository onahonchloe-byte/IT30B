
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