
# 🍽 FoodLink – Share a Meal, Spread a Smile

*FoodLink* is a community-driven web platform designed to connect food donors, recipients (NGOs), and volunteers for the purpose of reducing food waste and supporting the hungry. Built using HTML, CSS, JavaScript, PHP, and MySQL (XAMPP).

---

## 🧠 Project Overview

**Theme:** Community Building  
**Project Duration:** 7 Hours  
**Team Size:** 4 Members  
**Technology Stack:** HTML, CSS, JavaScript, PHP (XAMPP), MySQL

---

## ✨ Key Features

- 🔐 **User Authentication**: Secure login and registration for all users
- 👤 **Role-Specific Registration**:
  - **Donors**: Provide organization name, address, and donation availability
  - **Recipients**: Provide personal details and food requirements
  - **Volunteers**: Provide basic contact info to assist in food delivery
- 🌍 **Dynamic Interface**: Visually appealing background image slideshow and motivational quotes
- 📱 **Responsive & Scrollable Forms**: Adapts to screen size; smooth transitions between role-based fields
- 🛡️ **Input Validations**: Unique mobile numbers; proper format for phone, email, and password

---


## 🔧 Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/foodlink.git
   ```

2. **Start XAMPP**
   - Run **Apache** & **MySQL**

3. **Import Database**
   - Open **phpMyAdmin**
   - Create a database named `foodlink`
   - Import the file: `db/foodlink.sql`

4. **Configure Database**
   - Open `includes/config.php`
   - Set your DB host, username, and password

5. **Run Project**
   - Visit: `http://localhost/foodlink/index.html`

---

## 📦 Project Dependencies

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL (via XAMPP)  
- **UI Styling**: Custom CSS with glassmorphism  
- **Authentication**: Role-based login and registration system

---

## 🔍 Working of the Hack

FoodLink acts as a bridge between food donors, NGOs, and volunteers. Users register with roles — Donor, Recipient (NGO), or Volunteer. Donors provide food availability, NGOs submit requests, and volunteers assist with delivery. The system is mobile-friendly, responsive, and includes proper validation to ensure data quality and smooth operations.

---

## 📁 Folder Structure

```
foodlink/
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── images/
│       ├── bg1.jpg
│       ├── bg2.jpg
│       └── bg3.jpg
│
├── db/
│   └── foodlink.sql
│
├── includes/
│   ├── config.php
│   ├── register.php
│   └── login.php
│
├── index.html
├── dashboard.php (optional)
└── README.md
```

---

## 👥 User Roles

### 1. Donor
- Can register and donate food  
- Fields: Email, Password, Role, Location, Organisation Name, Address, Mobile

### 2. Recipient (NGO)
- Can register to receive food  
- Fields: Same as Donor

### 3. Volunteer
- Can assist in food delivery  
- Fields: Name, Occupation, Mobile



## 🚀 Upcoming Features

- Admin Dashboard  
- Food donation tracking  
- Volunteer delivery system  
- Email notifications

---

## 👨‍💻 Team

| Name        | Role             |
|-------------|------------------|
| Abhishek    | Full Stack Dev   |
| Anmol       | UI/UX Designer   |
| Aadit       | PHP & DB Dev     |
| Ankit       | Volunteer Module |

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

