<?php
/**
 * Compfest Showcase Manager - Setup Script
 * 
 * Script ini akan:
 * 1. Membuat database SQLite jika belum ada
 * 2. Menjalankan migrasi untuk membuat tabel
 * 3. Menjalankan seeder untuk data awal
 * 
 * Cara penggunaan:
 * php setup.php
 */

echo "🚀 Compfest Showcase Manager - Setup Script\n";
echo "==========================================\n\n";

try {
    // 1. Check if database file exists
    $dbPath = __DIR__ . '/writable/compfest_manager.db';
    $dbDir = dirname($dbPath);
    
    // Create writable directory if not exists
    if (!is_dir($dbDir)) {
        mkdir($dbDir, 0755, true);
        echo "✅ Created writable directory\n";
    }
    
    // Create database file if not exists
    if (!file_exists($dbPath)) {
        // Create empty SQLite database
        $pdo = new PDO("sqlite:$dbPath");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "✅ Created SQLite database file\n";
    } else {
        echo "ℹ️ Database file already exists\n";
    }
    
    // 2. Run migrations using CodeIgniter CLI
    echo "\n📊 Running database migrations...\n";
    $migrationOutput = shell_exec('php spark migrate 2>&1');
    
    if (strpos($migrationOutput, 'error') !== false || strpos($migrationOutput, 'Error') !== false) {
        echo "❌ Migration failed. Trying alternative approach...\n";
        
        // Alternative: Create tables manually
        $pdo = new PDO("sqlite:$dbPath");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create projects table
        $projectsTable = "CREATE TABLE IF NOT EXISTS projects (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            url VARCHAR(255) NOT NULL,
            created_at DATETIME,
            updated_at DATETIME
        )";
        $pdo->exec($projectsTable);
        
        // Create users table
        $usersTable = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            role VARCHAR(20) DEFAULT 'admin',
            created_at DATETIME,
            updated_at DATETIME
        )";
        $pdo->exec($usersTable);
        
        echo "✅ Tables created manually\n";
    } else {
        echo $migrationOutput;
    }
    
    // 3. Run seeders
    echo "\n🌱 Running database seeders...\n";
    $seederOutput = shell_exec('php spark db:seed InitialSeeder 2>&1');
    
    if (strpos($seederOutput, 'error') !== false || strpos($seederOutput, 'Error') !== false) {
        echo "❌ Seeder failed. Creating data manually...\n";
        
        // Manual seeding
        $pdo = new PDO("sqlite:$dbPath");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Insert admin user
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $adminUser = "INSERT OR IGNORE INTO users (username, password, email, role, created_at, updated_at) VALUES 
            ('admin', '$adminPassword', 'admin@compfest.com', 'admin', datetime('now'), datetime('now'))";
        $pdo->exec($adminUser);
        
        // Insert sample projects
        $sampleProjects = "INSERT OR IGNORE INTO projects (name, description, url, created_at, updated_at) VALUES 
            ('SEA Compfest 17 - Catering Website', 'Website platform catering sehat dengan kustomisasi menu dan pengiriman ke seluruh Indonesia. Dibangun menggunakan CodeIgniter 4 dengan fokus pada pengalaman pengguna yang optimal.', 'https://compfest-17-sea.craftthingy.com', datetime('now'), datetime('now')),
            ('Compfest Showcase Manager', 'Website manajemen showcase untuk proyek-proyek Compfest. Memungkinkan pengguna untuk melihat dan mengelola berbagai proyek showcase dalam satu platform.', 'http://compfest.craftthingy.com', datetime('now'), datetime('now'))";
        $pdo->exec($sampleProjects);
        
        echo "✅ Sample data created manually\n";
    } else {
        echo $seederOutput;
    }
    
    echo "\n🎉 Setup completed successfully!\n";
    echo "==========================================\n";
    echo "📧 Admin Username: admin\n";
    echo "🔑 Admin Password: admin123\n";
    echo "🌐 Login URL: http://localhost:8080/auth/login\n";
    echo "⚡ Admin Panel: http://localhost:8080/admin/dashboard\n";
    echo "🏠 Showcase: http://localhost:8080/\n";
    echo "🔗 SEA Compfest: http://localhost:8080/compfest-17-sea\n";
    echo "\n💡 To start the server, run: php spark serve --host=localhost --port=8080\n";
    
} catch (Exception $e) {
    echo "❌ Error during setup: " . $e->getMessage() . "\n";
    echo "Please check your configuration and try again.\n";
}
?> 