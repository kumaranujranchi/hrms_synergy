# 🚀 WishLuv HR - Hostinger Deployment Instructions

## ✅ Configuration Ready!

### 📋 Your Credentials:

- **Domain:** https://hrms.wishluvbuildcon.com/
- **Database Name:** u743570205_wishluvhrpatna
- **Database User:** u743570205_wishluvhrpatna
- **Database Password:** Anuj@2025@2026
- **Database Host:** localhost

---

## 🎯 Deployment Steps

### Step 1: Login to Hostinger

1. Go to Hostinger control panel
2. Navigate to File Manager or use SSH

### Step 2: Upload Code to Hostinger

#### Option A: Using Git (Recommended)

```bash
cd public_html
git clone https://github.com/kumaranujranchi/hrms_synergy.git .
```

#### Option B: Using File Manager

1. Download ZIP from GitHub
2. Upload to `public_html` folder
3. Extract the ZIP file

### Step 3: Setup Configuration File

```bash
# Navigate to app directory
cd app

# Copy the ready config file
cp config-hostinger.php config.php

# Set proper permissions
chmod 644 config.php
```

**✅ Database credentials are already configured in config-hostinger.php!**

### Step 4: Set File Permissions

```bash
# From the root directory
chmod -R 755 app/data
chmod 755 app
```

### Step 5: Run Installation

1. Open your browser
2. Visit: **https://hrms.wishluvbuildcon.com/app/install/**
3. Follow the installation wizard
4. Create your admin account

### Step 6: Post-Installation Security

```bash
# Delete the install folder (IMPORTANT!)
rm -rf app/install

# Make config read-only
chmod 444 app/config.php
```

---

## 🔐 SSL Certificate

Hostinger provides free SSL. To enable:

1. Go to Hostinger Control Panel
2. Navigate to SSL section
3. Enable SSL for `hrms.wishluvbuildcon.com`
4. After SSL is active, update in `app/config.php`:
   ```php
   ini_set('session.cookie_secure', 1); // Change 0 to 1
   ```

---

## 📁 File Structure on Hostinger

```
public_html/
├── app/
│   ├── config-hostinger.php  (template with credentials)
│   ├── config.php            (copy from config-hostinger.php)
│   ├── data/                 (uploads folder)
│   └── install/              (delete after installation)
├── core/
├── web/
└── index.php
```

---

## 🧪 Testing

After deployment, test these URLs:

- **Homepage:** https://hrms.wishluvbuildcon.com/
- **Installation:** https://hrms.wishluvbuildcon.com/app/install/
- **Admin Login:** https://hrms.wishluvbuildcon.com/app/ (after installation)

---

## 🔧 Troubleshooting

### Issue: White screen or 500 error

**Solution:**

```bash
# Check permissions
chmod -R 755 app/data
chmod 644 app/config.php

# Check error logs in Hostinger control panel
```

### Issue: Database connection error

**Solution:**

- Verify database exists in Hostinger MySQL section
- Check credentials in `app/config.php`
- Ensure database user has all privileges

### Issue: CSS/JS not loading

**Solution:**

- Verify BASE_URL is correct: `https://hrms.wishluvbuildcon.com/`
- Check .htaccess file exists
- Clear browser cache

---

## 📝 Quick Command Reference

```bash
# Clone repository
cd public_html
git clone https://github.com/kumaranujranchi/hrms_synergy.git .

# Setup config
cd app
cp config-hostinger.php config.php

# Set permissions
cd ..
chmod -R 755 app/data
chmod 644 app/config.php

# After installation
rm -rf app/install
chmod 444 app/config.php
```

---

## 🎉 You're All Set!

Your HR Management System is ready to deploy on Hostinger!

**GitHub Repository:** https://github.com/kumaranujranchi/hrms_synergy

**Support:** Check HOSTINGER_DEPLOYMENT.md for detailed troubleshooting

---

**Last Updated:** 2026-01-11
**Domain:** hrms.wishluvbuildcon.com
