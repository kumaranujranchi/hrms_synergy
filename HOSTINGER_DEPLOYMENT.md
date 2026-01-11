# IceHrm - HR Management System

## 🚀 Hostinger Deployment Guide

### Prerequisites

- Hostinger hosting account with PHP support (PHP 7.4 or higher)
- MySQL database access
- FTP/File Manager access or Git deployment enabled

---

## 📦 Installation Steps

### Step 1: Database Setup

1. **Login to Hostinger Control Panel**
2. **Go to MySQL Databases section**
3. **Create a new database:**
   - Database name: `icehrm_db` (or your preferred name)
   - Create a database user with a strong password
   - Grant all privileges to the user for this database
4. **Note down these credentials:**
   - Database Name
   - Database Username
   - Database Password
   - Database Host (usually `localhost`)

### Step 2: Upload Files

#### Option A: Using Git (Recommended)

1. In Hostinger control panel, go to **Git** section
2. Clone this repository to your `public_html` folder
3. Set branch to `main`

#### Option B: Using File Manager/FTP

1. Download all files from this repository
2. Upload to your `public_html` folder (or subdirectory)
3. Extract if uploaded as ZIP

### Step 3: Configure Database

1. **Navigate to the `app` folder**
2. **Copy `config-production.php` to `config.php`:**
   ```bash
   cp app/config-production.php app/config.php
   ```
3. **Edit `app/config.php` and update:**
   ```php
   define('BASE_URL', 'https://yourdomain.com/');
   define('APP_DB', 'your_database_name');
   define('APP_USERNAME', 'your_database_username');
   define('APP_PASSWORD', 'your_database_password');
   define('APP_HOST', 'localhost');
   ```

### Step 4: Set File Permissions

Set proper permissions for data directory:

```bash
chmod -R 755 app/data
chmod -R 777 app/data
```

### Step 5: Run Installation

1. **Open your browser and visit:**
   ```
   https://yourdomain.com/app/install/
   ```
2. **Follow the installation wizard**
3. **Create admin account**
4. **Complete setup**

### Step 6: Security (Important!)

After installation:

1. **Delete or rename the install folder:**
   ```bash
   rm -rf app/install
   # OR
   mv app/install app/install_backup
   ```
2. **Set config.php to read-only:**
   ```bash
   chmod 444 app/config.php
   ```

---

## 🔐 Default Login

After installation, login with the credentials you created during setup.

---

## 📁 Directory Structure

```
icehrm/
├── app/              # Application core files
│   ├── config.php    # Database configuration (create from config-production.php)
│   ├── data/         # Uploaded files and logs
│   └── install/      # Installation wizard (delete after setup)
├── core/             # Core framework files
├── web/              # Public web assets
├── extensions/       # Custom extensions
└── index.php         # Entry point
```

---

## ⚙️ Configuration Options

### File Upload Settings

Edit in `app/config.php`:

```php
define('FILE_TYPES', 'jpg,png,jpeg,gif,pdf,doc,docx,xls,xlsx,txt');
define('MAX_FILE_SIZE_KB', 10 * 1024); // 10MB
```

### Timezone

```php
date_default_timezone_set('Asia/Kolkata');
```

### Session Timeout

```php
define('SESSION_EXPIRE_TIME', 3600); // 1 hour in seconds
```

---

## 🔧 Troubleshooting

### White Screen / 500 Error

- Check file permissions (755 for folders, 644 for files)
- Verify database credentials in `app/config.php`
- Check PHP version (minimum 7.4 required)
- Enable error reporting temporarily to see errors

### Database Connection Error

- Verify database credentials
- Ensure database user has proper privileges
- Check if database host is correct (usually `localhost`)

### File Upload Issues

- Check `app/data` folder permissions (should be 777)
- Verify `FILE_TYPES` and `MAX_FILE_SIZE_KB` settings
- Check PHP upload limits in `php.ini`

### CSS/JS Not Loading

- Verify `BASE_URL` is set correctly in `app/config.php`
- Check `.htaccess` file exists
- Ensure mod_rewrite is enabled

---

## 📞 Support

For issues and questions:

- GitHub Issues: [Create an issue](https://github.com/gamonoid/icehrm/issues)
- Documentation: [IceHrm Docs](https://icehrm.com/explore/docs/)

---

## 📝 Important Notes

1. **Always backup** your database before updates
2. **Keep `app/config.php` secure** - never commit with real credentials
3. **Delete install folder** after successful installation
4. **Use HTTPS** for production (Hostinger provides free SSL)
5. **Regular backups** - use Hostinger's backup feature

---

## 🔄 Updating IceHrm

1. Backup your database
2. Backup `app/config.php`
3. Pull latest changes from repository
4. Restore `app/config.php`
5. Run any database migrations if required

---

## 📄 License

This project is licensed under the terms specified in the LICENSE file.

---

**Made with ❤️ for efficient HR Management**
