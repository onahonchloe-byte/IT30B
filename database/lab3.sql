CREATE TABLE books(
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    book_title VARCHAR(100) NOT NULL,
    book_author VARCHAR(100) NOT NULL,
    book_category VARCHAR(50) NOT NULL
    book_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE borrow (
    borrow_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    book_id INT NOT NULL,
    book_category VARCHAR(100) NOT NULL;
    borrow_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    borrow_return_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_student FOREIGN KEY (student_id) REFERENCES students(student_id),
    CONSTRAINT fk_book FOREIGN KEY (book_id) REFERENCES books(book_id)
);

SELECT br.borrow_id, s.student_id,
    CONCAT(s.student_first_name, ' ', s.student_last_name) AS student_name, 
    b.book_title, b.book_author, b.book_category,
    br.borrow_date, br.borrow_return_date
FROM borrow br
    JOIN students s ON br.student_id = s.student_id
    JOIN books b ON br.book_id = b.book_id
    WHERE br.borrow_return_date IS NULL
ORDER BY br.borrow_date DESC;

-- alter borrow_return_date to allow NULL values and set default to NULL
ALTER TABLE borrow
MODIFY borrow_return_date TIMESTAMP NULL DEFAULT NULL;

UPDATE borrow
SET borrow_return_date = NULL
WHERE borrow_return_date = '2026-08-27 08:33:13';

-- Return a book by updating the borrow_return_date to the current timestamp   

UPDATE borrow
SET borrow_return_date = CURRENT_TIMESTAMP
-- Change value of borrow_return_date to NULL for a specific borrow_id
WHERE borrow_id = 1 AND borrow_return_date IS NULL;