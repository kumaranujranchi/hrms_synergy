#!/bin/bash

# IceHrm Quick Setup Script for Hostinger
# This script helps you quickly configure IceHrm for production

echo "========================================="
echo "  IceHrm Hostinger Setup Script"
echo "========================================="
echo ""

# Check if config.php already exists
if [ -f "app/config.php" ]; then
    echo "⚠️  Warning: app/config.php already exists!"
    read -p "Do you want to overwrite it? (y/n): " overwrite
    if [ "$overwrite" != "y" ]; then
        echo "Setup cancelled."
        exit 1
    fi
fi

# Copy production config template
echo "📋 Creating config.php from template..."
cp app/config-production.php app/config.php

echo ""
echo "✅ Configuration file created!"
echo ""
echo "📝 Next steps:"
echo "1. Edit app/config.php and update the following:"
echo "   - BASE_URL (your domain URL)"
echo "   - APP_DB (database name)"
echo "   - APP_USERNAME (database username)"
echo "   - APP_PASSWORD (database password)"
echo ""
echo "2. Set proper permissions:"
echo "   chmod -R 755 app/data"
echo ""
echo "3. Visit your domain/app/install/ to complete installation"
echo ""
echo "4. After installation, delete the install folder:"
echo "   rm -rf app/install"
echo ""
echo "========================================="
echo "  Setup Complete!"
echo "========================================="
