-- creating a database:
CREATE DATABASE IF NOT EXISTS Reviews;

USE Reviews;

--creating table with reviews:
CREATE TABLE IF NOT EXISTS Reviews_table(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    assortment_rating INT NOT NULL,
    service_rating INT NOT NULL,
    decor_rating INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL);

--creating table with users:
CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL);