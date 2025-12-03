-- SQL schema for Event Organiser
CREATE DATABASE IF NOT EXISTS event_organiser;
USE event_organiser;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    date DATE,
    location VARCHAR(150)
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    phone VARCHAR(20)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    client_id INT,
    booked_at DATE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    role VARCHAR(100),
    event_id INT,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE SET NULL
);
