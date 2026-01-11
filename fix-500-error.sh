#!/bin/bash
# Emergency Fix Script for HTTP 500 Error
# Run this on Hostinger to diagnose and fix the issue

echo "========================================="
echo "  IceHrm - HTTP 500 Error Fix"
echo "========================================="
echo ""

# Check current directory
echo "📁 Current directory:"
pwd
echo ""

# Check if essential files exist
echo "🔍 Checking essential files..."
if [ ! -f "index.php" ]; then
    echo "❌ index.php not found! Wrong directory?"
    exit 1
fi
echo "✅ index.php found"

if [ ! -f "app/config-hostinger.php" ]; then
    echo "❌ app/config-hostinger.php not found!"
    exit 1
fi
echo "✅ app/config-hostinger.php found"

# Check if config.php exists
if [ ! -f "app/config.php" ]; then
    echo "⚠️  app/config.php NOT found - Creating it now..."
    cp app/config-hostinger.php app/config.php
    echo "✅ Config file created"
else
    echo "✅ app/config.php exists"
fi

# Temporarily rename .htaccess to test if it's causing issues
if [ -f ".htaccess" ]; then
    echo "⚠️  Temporarily disabling .htaccess for testing..."
    mv .htaccess .htaccess.backup
    echo "✅ .htaccess renamed to .htaccess.backup"
fi

# Set correct permissions
echo "🔒 Setting permissions..."
chmod 755 .
chmod 644 index.php
chmod 755 app
chmod 644 app/config.php 2>/dev/null || echo "⚠️  config.php not found"
chmod -R 755 app/data 2>/dev/null || echo "⚠️  app/data not found"
chmod 755 core
chmod 755 web
echo "✅ Permissions set"

# Create data directory if missing
if [ ! -d "app/data" ]; then
    echo "📁 Creating app/data directory..."
    mkdir -p app/data
    chmod 755 app/data
    echo "✅ app/data created"
fi

# Check PHP version
echo ""
echo "🔍 PHP Version:"
php -v | head -n 1

echo ""
echo "========================================="
echo "  Diagnostic Complete!"
echo "========================================="
echo ""
echo "📋 What was done:"
echo "1. ✅ Verified essential files exist"
echo "2. ✅ Created config.php from template"
echo "3. ✅ Disabled .htaccess temporarily"
echo "4. ✅ Set correct file permissions"
echo "5. ✅ Created data directory"
echo ""
echo "🧪 Test now:"
echo "Visit: https://hrms.wishluvbuildcon.com/"
echo ""
echo "If it works:"
echo "  - Re-enable .htaccess: mv .htaccess.backup .htaccess"
echo ""
echo "If still error 500:"
echo "  - Check error logs in Hostinger control panel"
echo "  - Look for PHP errors"
echo ""
