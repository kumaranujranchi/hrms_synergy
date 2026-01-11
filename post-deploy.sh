# Post-Deployment Setup Script
# Run this on Hostinger after Git deployment

echo "========================================="
echo "  IceHrm Post-Deployment Setup"
echo "========================================="
echo ""

# Check if we're in the right directory
if [ ! -f "index.php" ]; then
    echo "❌ Error: Please run this script from the root directory"
    exit 1
fi

echo "✅ Deployment successful!"
echo ""

# Setup config file
echo "📝 Setting up configuration file..."
if [ -f "app/config-hostinger.php" ]; then
    cp app/config-hostinger.php app/config.php
    echo "✅ Config file created from template"
else
    echo "❌ Error: config-hostinger.php not found"
    exit 1
fi

# Set permissions
echo "🔒 Setting file permissions..."
chmod -R 755 app/data
chmod 644 app/config.php
echo "✅ Permissions set"

echo ""
echo "========================================="
echo "  Setup Complete!"
echo "========================================="
echo ""
echo "📋 Next Steps:"
echo ""
echo "1. Visit: https://hrms.wishluvbuildcon.com/app/install/"
echo "2. Complete the installation wizard"
echo "3. Create your admin account"
echo "4. After installation, run:"
echo "   rm -rf app/install"
echo "   chmod 444 app/config.php"
echo ""
echo "🎉 Your HR Management System is ready!"
echo ""
