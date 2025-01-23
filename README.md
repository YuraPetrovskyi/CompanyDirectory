# Company Directory

## Project Description
**Company Directory** is a web application designed for managing employee records. The project provides functionality to:
- Create, edit, view, and delete employee records.
- Filter data based on various parameters.
- View detailed information about employees, their locations, and other related data.

This project fully demonstrates the implementation of CRUD (Create, Read, Update, Delete) operations with secure database interactions. All SQL queries are executed using prepared statements to protect against SQL injection attacks, ensuring data integrity and application security.

The integration of frontend and backend technologies is achieved using JavaScript (including jQuery and AJAX), PHP, MySQL, and Bootstrap, delivering a responsive and user-friendly interface.

---

## Screenshots
<p align="center">
  <img src="/img/company1.jpg" alt="Application Screenshot" width="300"/>
  <img src="/img/company2.jpg" alt="Application Screenshot" width="300"/>
  <img src="/img/company3.jpg" alt="Application Screenshot" width="300"/>
</p>

## Live Demo
You can view the project live at [Company Directory](https://yuriipetrovskyi.co.uk/CompanyDirectory/). 
Explore the full functionality of the application in real-time.

---

## How to Run the Project

1. **Install Dependencies:**
   - Before running the project, ensure that all required dependencies are installed. Navigate to the project folder in your terminal and run:
     ```bash
     npm install
     ```
   - This will install all necessary packages listed in the `package.json` file.

2. **Setting up the Database:**
   - The `sql` folder of your project contains a file named `companydirectory.sql`, which includes the database structure and test data.
   - To set up the database:
     - Download and install [XAMPP](https://www.apachefriends.org/index.html).
     - Start the XAMPP Control Panel and activate Apache and MySQL.
     - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
     - Go to the `SQL` tab, copy the content of the `companydirectory.sql` file from the `sql` folder, paste it into the SQL input field, and execute it. This will create and populate the required tables.

3. **Configuring the Database Connection:**
   - All database connection settings for PHP are located in the `config.php` file inside the `php` folder.

4. **Running the Project:**
   - Move your project files to the `c:/xampp/htdocs/` folder.
   - Open your browser and go to [http://localhost/your_project_name](http://localhost/your_project_name).

---

## Technologies Used
- **HTML/CSS** – For building the structure and styling the pages.
- **JavaScript** (with jQuery) – To handle server interactions through AJAX for dynamic page updates.
- **PHP** – For handling requests and executing SQL queries for CRUD operations.
- **MySQL** – For storing data.
- **Bootstrap** – For creating a responsive design and integrating modals.

---

## Features
- **CRUD Operations** – Comprehensive support for Create, Read, Update, and Delete operations.
- **Secure Database Queries** – SQL queries are executed using prepared statements, protecting the application against SQL injection attacks.
- **AJAX** – Used for asynchronous data loading and dynamic updates.
- **Modals** – Integrated using Bootstrap for convenient record detail viewing.
- **Responsive Design** – Optimized interface for various devices.

---

## Notes
- Ensure all dependencies are installed by running `npm install` before starting the project.
- If you encounter any issues running the project, double-check the configuration in `config.php`.


