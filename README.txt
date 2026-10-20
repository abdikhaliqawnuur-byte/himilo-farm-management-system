====================================================================
PROJECT OVERVIEW: HIMILO MIXED FARM MANAGEMENT SYSTEM
====================================================================

Developer: Abdikhaliq Awnuur
Degree: Bachelor of Science in Information Technology
Institution: Puntland State University
Technology Stack: PHP, MySQL, HTML5, CSS3, JavaScript, Bootstrap

--------------------------------------------------------------------
1. PROJECT SUMMARY
--------------------------------------------------------------------
The Himilo Mixed Farm Management System is a robust web-based management 
information system designed to streamline and automate day-to-day operations 
for mixed agricultural and livestock farms. The system resolves traditional 
paper-based recordkeeping inefficiencies by providing dynamic digital logging, 
inventory control, and real-time administrative reporting.

--------------------------------------------------------------------
2. CORE FEATURES & MODULES
--------------------------------------------------------------------
- Secure Admin Authentication (Login Only): Controlled system access where administrator credentials are pre-configured and managed directly via the database, ensuring secure backend operations without public sign-up.
- Livestock & Health Tracking: Tracks animal inventory, vaccination schedules, and breeding history.
- Crop & Yield Management: Monitors planting timelines, harvest results, and field inputs.
- Inventory & Stock Management: Manages feed, equipment, medical supplies, and fertilizers.
- Financial Reporting & Analytics: Generates dynamic income, sales, and expense summaries.

--------------------------------------------------------------------
3. TECHNICAL ARCHITECTURE & DATABASE DESIGN
--------------------------------------------------------------------
- Backend: PHP (Object-Oriented Programming & Procedural Logic)
- Database: MySQL (Relational Database Schema with Normalized Tables & Admin Table)
- Frontend: HTML5, CSS3, JavaScript (Responsive Admin Dashboard UI)
- Security: Secure session management, password hashing, and restricted direct URL access.

--------------------------------------------------------------------
4. INSTALLATION & SETUP INSTRUCTIONS
--------------------------------------------------------------------
1. Clone or download the repository to your local web server root directory (e.g., htdocs/ for XAMPP).
2. Import the provided MySQL database file (`database.sql`) into phpMyAdmin (admin accounts are pre-seeded in the database).
3. Update the database configuration file (`config.php`) with your database credentials.
4. Launch your local browser and navigate to `http://localhost/himilo-farm-management-system/login.php`.