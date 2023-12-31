<?php
"CREATE DATABASE pfund_db";
"CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL
)";
"CREATE TABLE Income (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    source VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    date DATE NOT NULL,
    details VARCHAR(255)
)";
"CREATE TABLE Expenditure (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    particulars VARCHAR(255) NOT NULL,
    amount_spent DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255)
)";
"CREATE TABLE Ex_Category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255),
    amount DECIMAL(10, 2)
)";

?>