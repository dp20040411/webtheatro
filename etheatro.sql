CREATE DATABASE IF NOT EXISTS online_registration;
USE online_registration;

-- Roles: For admin, reviewer, etc.
CREATE TABLE roles (
    role_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

-- Admin users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id TINYINT,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE SET NULL
);

-- Lookup tables
CREATE TABLE year_levels (
    year_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    year_label VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE departments (
    dept_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    dept_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE talents (
    talent_id INT AUTO_INCREMENT PRIMARY KEY,
    talent_name VARCHAR(100) NOT NULL UNIQUE
);

-- Temporary table for pending applicants
CREATE TABLE pending_applications (
    pending_id INT AUTO_INCREMENT PRIMARY KEY,
    school_id VARCHAR(50) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_initial VARCHAR(1),
    last_name VARCHAR(100) NOT NULL,
    year_id TINYINT NOT NULL,
    dept_id TINYINT NOT NULL,
    talent_id INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (year_id) REFERENCES year_levels(year_id),
    FOREIGN KEY (dept_id) REFERENCES departments(dept_id),
    FOREIGN KEY (talent_id) REFERENCES talents(talent_id)
);

-- Final approved applicants
CREATE TABLE applicants (
    applicant_id INT AUTO_INCREMENT PRIMARY KEY,
    school_id VARCHAR(50) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_initial VARCHAR(1),
    last_name VARCHAR(100) NOT NULL,
    year_id TINYINT NOT NULL,
    dept_id TINYINT NOT NULL,
    talent_id INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (year_id) REFERENCES year_levels(year_id),
    FOREIGN KEY (dept_id) REFERENCES departments(dept_id),
    FOREIGN KEY (talent_id) REFERENCES talents(talent_id)
);

-- Rejected applicants
CREATE TABLE rejected_applications (
    rejected_id INT AUTO_INCREMENT PRIMARY KEY,
    school_id VARCHAR(50) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_initial VARCHAR(1),
    last_name VARCHAR(100) NOT NULL,
    year_id TINYINT NOT NULL,
    dept_id TINYINT NOT NULL,
    talent_id INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    rejected_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (year_id) REFERENCES year_levels(year_id),
    FOREIGN KEY (dept_id) REFERENCES departments(dept_id),
    FOREIGN KEY (talent_id) REFERENCES talents(talent_id)
);
