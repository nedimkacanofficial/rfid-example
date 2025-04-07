# RFID Card Registration and Management System

## Description

Developed an RFID Card Registration and Management System using **PHP** for the backend to register and manage RFID cards. This system allows users to scan their RFID cards, capture details such as card ID, name, role, and balance, and store this data securely in a **MySQL** database. The system validates the card ID to ensure that no duplicate entries are created and provides a user-friendly interface for adding new cards and updating information.

The project also prevents errors by ensuring the card ID is unique before saving it to the database. This system is ideal for scenarios such as personnel check-ins, student management, or any application requiring unique RFID card identification.

## Key Features

- **RFID Card Scanning**: Scanning and registering RFID cards by their unique card ID.
- **Backend**: PHP for managing data storage and validation.
- **Database**: MySQL for storing card details, such as card ID, name, role, and balance.
- **Form Handling**: PHP-based dynamic form validation to ensure no duplicate card IDs.
- **UI/UX**: Bootstrap for building a responsive, easy-to-use interface.
- **Error Handling**: Prevents duplicate entries by validating the card ID before inserting data into the database.

## Technologies Used

- **Backend**: PHP, PDO for MySQL interaction
- **Database**: MySQL
- **UI/UX**: Bootstrap for a responsive, user-friendly design
- **Version Control**: Git, GitHub

## Installation

### 1. Clone the repository

To get started, clone the repository to your local machine:

```bash
git clone https://github.com/yourusername/rfid-card-registration-system.git
```

![RFID Card Registration Screenshot](screenshot/Screenshot%202025-04-07%20210431.png)
