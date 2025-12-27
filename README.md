#  Cardly — Digital Business Card Creation Platform

Cardly is a web-based Digital Business Card creation platform that allows users to design, manage, and share interactive digital business cards. The system supports multiple cards per user, role-based access (User & Admin), downloadable cards (PNG/PDF), and an admin dashboard with analytics and user management.

This project is designed as an **MVP (Minimum Viable Product)** with a clean user flow, real-world features, and scalability in mind.


##  Features

###  Public Access (No Login Required)

* Landing page with:

  * Hero section
  * Features
  * Static card previews
  * How it works
  * Call-to-action banner
  * Footer
* Public pages:

  * View Templates
  * About Us

---

###  User Features

* User authentication (Signup & Login)
* Personalized dashboard
* Create **multiple digital business cards**
* Edit existing cards
* View cards with **front & back flip animation**
* Delete cards (with confirmation modal)
* Download cards as **PNG** and **PDF**
* Share-ready cards for social platforms (e.g. LinkedIn via image or public link in production)
* Status handling (Active / Deleted)

---

### Admin Features

* Role-based admin access
* Admin dashboard with analytics:

  * Total users
  * Total cards
  * Top 3 active users (based on card count)
* View all registered users
* Delete users
* View all cards created by users
* View individual cards with flip animation
* Status visibility for users and cards
* Secure admin logout

---

## Roles & Access Control

### Roles Implemented

* **User**: Can create, manage, delete, and download their own cards
* **Admin**: Can manage users, view analytics, and oversee all cards

> The project is intentionally limited to User and Admin roles as part of an MVP design. Additional roles (Moderator, Support, Super Admin) can be added in future versions if required.

---

##  Sharing on LinkedIn (Important Note)

LinkedIn does not allow sharing `localhost` URLs.
In production:

* Each card will have a public shareable link
* Cards can be shared directly on LinkedIn

Currently:

* Users can download cards as PNG and upload them to LinkedIn posts
* LinkedIn share button logic is implemented for production-ready URLs

---

##  Technical Highlights

* Role-based authentication
* Session management
* Full CRUD operations
* Confirmation modals for destructive actions
* Soft delete logic with status badges
* Interactive UI with animations
* Clean separation of public & protected routes

---

##  Tech Stack

* **Frontend**: HTML, CSS, Bootstrap, JavaScript
* **Backend**: PHP
* **Database**: MySQL
* **Server**: XAMPP (Localhost)
* **UI Effects**: CSS animations (card flip)

---

##  Project Structure (High Level)

```
/public
/auth
/user
/admin
/templates
/assets
/database
```

---

##  Project Purpose

This project was built to:

* Demonstrate full-stack development skills
* Implement real-world SaaS features
* Practice role-based systems and dashboards
* Create an interactive and shareable digital product

---

##  Future Enhancements

* Public card URLs
* QR code sharing
* Card analytics (views, clicks)
* Additional user roles
* Cloud hosting & deployment


##  Author

**Arisha Mumtaz**


## 📄 License

This project is for learning and portfolio purposes.

