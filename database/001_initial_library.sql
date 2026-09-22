CREATE TABLE IF NOT EXIST students (
    --Primary key
    student_id INT PRIMARY KEY AUTO_INCREMENT,

    --Student name
    student_first_name VARCHAR(50) NOT NULL,
    student_last_name VARCHAR(50) NOT NULL,

    --Student course 
    student_course VARCHAR(50) NOT NULL,

    --Student create at timestamp
    student_created_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_unicode_ci;

--#2 books table 
CREATE TABLE IF NOT EXIST books (
    --Primary key
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    --Primary key for the books table
    book_id INT PRIMARY KEY AUTO_INCREMENT,

    --book details
    book_title VARCHAR(100) NOT NULL,
    book_author VARCHAR(100) NOT NULL,
    book_category VARCHAR(50) NOT NULL,

    --book create at timestamp
    book_created_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_unicode_ci;

--#3 borrow table
CREATE TABLE IF NOT EXIST borrow (
    --Primary key for the borrow table
    borrow_id INT AUTO_INCREMENT PRIMARY KEY,

    --Foreign key references
    student_id INT NOT NULL,
    book_id INT NOT NULL,

    --Borrow timestamp not null by default
    borrow_date TIMESTAMP NOT NULL 
        DEFAULT CURRENT_TIMESTAMP,

    borrow_return_date TIMESTAMP NULL,
        DEFAULT NULL,

    -- Borrow table constraints for foreign keys
    CONSTRAINT fk_student_id 
    FOREIGN KEY (student_id) 
    REFERENCES students(student_id) 
    ON UPDATE CASCADE
    ON DELETE CASCADE,

    CONSTRAINT fk_borrow
    FOREIGN KEY (book_id)
    REFERENCES books(book_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT

)ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

-- Insert statement #1: 
INSERT INTO books (
    book_title, 
    book_author, 
    book_category
) VALUES
('I love you since 1982', 'Binibini Mia', 'History-Romance'),
('Taste of Sky', 'Armstrong', 'Sci-Fi-Romance'),
('He into her', 'Maxinejiji', 'High School-Romance'),
('The Greatest Showman', 'Hugh Jackman', 'Musical-Romance');

-- Insert statement #2:
