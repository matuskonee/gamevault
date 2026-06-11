# GameVault - Gaming Platform

## 🎮 Overview
GameVault is a modern, cyberpunk-themed gaming platform where users can discover games, leave reviews, and rate their favorite titles. Administrators can manage the game library, user accounts, and platform content.

## ✨ Features

### User Features
- 🔐 User Registration & Authentication (Login/Logout)
- 🎮 Browse All Games with Search Functionality
- ⭐ Leave Reviews and Rate Games (1-5 Stars)
- 📱 Responsive Design (Desktop & Mobile)
- 🌓 Dark/Light Mode Toggle
- 💻 Cyberpunk-Themed UI

### Admin Features
- 📊 Dashboard with Statistics
- ➕ Add New Games
- ✏️ Edit Game Information
- 🗑️ Delete Games
- 👥 Manage Users
- 📈 View Platform Analytics

## 🛠️ Technology Stack

**Backend:**
- PHP 7.4+
- MySQL/MariaDB
- PDO (PHP Data Objects)

**Frontend:**
- HTML5
- CSS3 (with CSS Variables for theming)
- Vanilla JavaScript (ES6+)
- Responsive Grid Layout

**Architecture:**
- MVC Pattern
- OOP (Object-Oriented Programming)
- Prepared Statements (SQL Injection Protection)
- Session Management

## 📁 Project Structure

```
gamevault/
├── config/
│   ├── config.php           # Database & site configuration
│   └── .htaccess           # URL rewriting rules
├── classes/
│   ├── Database.php        # Database connection class
│   ├── User.php            # User model
│   ├── Game.php            # Game model
│   └── Review.php          # Review model
├── controllers/
│   ├── AuthController.php  # Authentication logic
│   ├── GameController.php  # Game logic
│   └── AdminController.php # Admin logic
├── views/
│   ├── header.php          # Navigation bar
│   ├── footer.php          # Footer
│   ├── home.php            # Homepage
│   ├── games.php           # Games listing
│   ├── game-detail.php     # Game detail & reviews
│   ├── login.php           # Login page
│   ├── register.php        # Registration page
│   ├── 404.php             # Error page
│   └── admin/
│       ├── dashboard.php   # Admin dashboard
│       ├── games.php       # Manage games
│       ├── users.php       # Manage users
│       ├── create-game.php # Add game form
│       └── edit-game.php   # Edit game form
├── public/
│   ├── index.php           # Main router
│   ├── helpers.php         # Helper functions
│   ├── routes.php          # Route handlers
│   └── assets/
│       ├── css/
│       │   ├── style.css   # Main styles
│       │   └── admin.css   # Admin styles
│       └── js/
│           └── main.js     # JavaScript logic
├── sql/
│   └── schema.sql          # Database schema
└── README.md               # This file
```

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache with mod_rewrite enabled
- Composer (optional, for additional packages)

### Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/matuskonee/gamevault.git
   cd gamevault
   ```

2. **Setup Database:**
   ```bash
   # Import the schema
   mysql -u root -p < sql/schema.sql
   ```

3. **Configure Database Connection:**
   - Edit `config/config.php`
   - Update database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'your_user');
     define('DB_PASS', 'your_password');
     define('DB_NAME', 'gamevault');
     ```

4. **Start Development Server:**
   ```bash
   cd public
   php -S localhost:8000
   ```

5. **Access the Application:**
   - Open browser: `http://localhost:8000`

## 🎯 Usage Guide

### For Regular Users
1. **Register:** Create a new account
2. **Browse:** Explore games in the catalog
3. **Search:** Find games by name or genre
4. **Review:** Leave ratings and comments
5. **Toggle Theme:** Switch between dark/light mode

### For Administrators
1. **Login** with admin account
2. **Dashboard:** View platform statistics
3. **Add Games:** Create new game entries
4. **Manage:** Edit or delete games
5. **Users:** View and manage user accounts

## 🔐 Security Features

- ✅ Password hashing with `password_hash()`
- ✅ Prepared statements (PDO) prevent SQL injection
- ✅ Session-based authentication
- ✅ CSRF token validation (can be added)
- ✅ Input sanitization with `htmlspecialchars()`
- ✅ HTTP-only cookies
- ✅ Strict mode sessions

## 🎨 Design Features

- 🌈 Cyberpunk-inspired color scheme (Green #00ff88, Pink #ff006e, Blue #0080ff)
- 🎯 Neon glow effects
- 📱 Mobile-first responsive design
- 🌓 Dark/Light mode toggle
- ⚡ Smooth animations and transitions
- ♿ Semantic HTML for accessibility

## 📊 Database Schema

### Users Table
```sql
id, username, email, password, is_admin, created_at, updated_at
```

### Games Table
```sql
id, title, description, genre, release_date, developer, rating, image_url, created_at, updated_at
```

### Reviews Table
```sql
id, game_id, user_id, rating, comment, created_at, updated_at
```

## 🚀 Future Enhancements

- [ ] User profile pages
- [ ] Game wishlists
- [ ] Social features (follow users, share reviews)
- [ ] Advanced filtering & sorting
- [ ] Payment integration
- [ ] Email notifications
- [ ] API endpoints (REST/GraphQL)
- [ ] Progressive Web App (PWA)
- [ ] Real-time notifications
- [ ] User badges & achievements

## 📝 License

MIT License - feel free to use this project for personal or commercial purposes.

## 👨‍💻 Author

Created by **matuskonee** - A passionate developer building amazing web experiences.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📧 Contact

For questions or suggestions, please reach out via GitHub issues or email.

---

**Happy Gaming! 🎮✨**
