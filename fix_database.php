<?php
/**
 * Database Fix Script for Compfest Showcase Manager
 * 
 * Script ini akan:
 * 1. Membuat database SQLite jika belum ada
 * 2. Mengatur permission folder writable
 * 3. Membuat tabel yang diperlukan
 * 4. Menambahkan data sample
 * 
 * Cara penggunaan:
 * Upload file ini ke root folder website, lalu akses via browser:
 * https://compfest.craftthingy.com/fix_database.php
 */

echo "<h1>🔧 Database Fix Script - Compfest Showcase Manager</h1>";
echo "<hr>";

try {
    // 1. Check and create writable directory
    $writablePath = __DIR__ . '/writable';
    if (!is_dir($writablePath)) {
        mkdir($writablePath, 0755, true);
        echo "✅ Created writable directory<br>";
    } else {
        echo "ℹ️ Writable directory already exists<br>";
    }
    
    // 2. Set permissions for writable folder
    chmod($writablePath, 0755);
    echo "✅ Set permissions for writable folder<br>";
    
    // 3. Create subdirectories
    $subdirs = ['cache', 'logs', 'session', 'uploads'];
    foreach ($subdirs as $dir) {
        $subdirPath = $writablePath . '/' . $dir;
        if (!is_dir($subdirPath)) {
            mkdir($subdirPath, 0755, true);
            echo "✅ Created {$dir} directory<br>";
        }
        chmod($subdirPath, 0755);
    }
    
    // 4. Create database file
    $dbPath = $writablePath . '/compfest_manager.db';
    if (!file_exists($dbPath)) {
        // Create empty SQLite database
        $pdo = new PDO("sqlite:$dbPath");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "✅ Created SQLite database file<br>";
    } else {
        echo "ℹ️ Database file already exists<br>";
    }
    
    // 5. Set database file permissions
    chmod($dbPath, 0644);
    echo "✅ Set database file permissions<br>";
    
    // 6. Create tables
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
    echo "✅ Created projects table<br>";
    
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
    echo "✅ Created users table<br>";
    
    // 7. Insert sample data
    // Check if admin user exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = 'admin'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $adminUser = "INSERT INTO users (username, password, email, role, created_at, updated_at) VALUES 
            ('admin', '$adminPassword', 'admin@compfest.com', 'admin', datetime('now'), datetime('now'))";
        $pdo->exec($adminUser);
        echo "✅ Created admin user<br>";
    } else {
        echo "ℹ️ Admin user already exists<br>";
    }
    
    // Check if sample projects exist
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM projects");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $sampleProjects = "INSERT INTO projects (name, description, url, created_at, updated_at) VALUES 
            ('SEA Compfest 17 - Catering Website', 'Website platform catering sehat dengan kustomisasi menu dan pengiriman ke seluruh Indonesia. Dibangun menggunakan CodeIgniter 4 dengan fokus pada pengalaman pengguna yang optimal.', 'https://compfest-17-sea.craftthingy.com', datetime('now'), datetime('now')),
            ('Compfest Showcase Manager', 'Website manajemen showcase untuk proyek-proyek Compfest. Memungkinkan pengguna untuk melihat dan mengelola berbagai proyek showcase dalam satu platform.', 'http://compfest.craftthingy.com', datetime('now'), datetime('now'))";
        $pdo->exec($sampleProjects);
        echo "✅ Created sample projects<br>";
    } else {
        echo "ℹ️ Sample projects already exist<br>";
    }
    
    echo "<hr>";
    echo "<h2>🎉 Database setup completed successfully!</h2>";
    echo "<p><strong>Admin Credentials:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Username:</strong> admin</li>";
    echo "<li><strong>Password:</strong> admin123</li>";
    echo "</ul>";
    echo "<p><strong>Important URLs:</strong></p>";
    echo "<ul>";
    echo "<li><a href='/'>Showcase Homepage</a></li>";
    echo "<li><a href='/auth/login'>Admin Login</a></li>";
    echo "<li><a href='/admin/dashboard'>Admin Dashboard</a></li>";
    echo "<li><a href='/compfest-17-sea'>SEA Compfest Showcase</a></li>";
    echo "</ul>";
    echo "<p><strong>⚠️ Security Note:</strong> Delete this file (fix_database.php) after successful setup!</p>";
    
} catch (Exception $e) {
    echo "<h2>❌ Error occurred:</h2>";
    echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>File:</strong> " . $e->getFile() . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
    
    echo "<h3>🔧 Manual Fix Steps:</h3>";
    echo "<ol>";
    echo "<li>Create folder 'writable' in root directory</li>";
    echo "<li>Set permission 'writable' folder to 755</li>";
    echo "<li>Create subfolders: cache, logs, session, uploads</li>";
    echo "<li>Create empty file 'writable/compfest_manager.db'</li>";
    echo "<li>Set permission database file to 644</li>";
    echo "</ol>";
}
?> 