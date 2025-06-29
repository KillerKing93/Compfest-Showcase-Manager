<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'email' => 'admin@compfest.com',
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Check if admin user already exists
        $existingUser = $this->db->table('users')->where('username', 'admin')->get()->getRow();
        
        if (!$existingUser) {
            $this->db->table('users')->insertBatch($data);
            echo "✅ Admin user created successfully!\n";
        } else {
            echo "ℹ️ Admin user already exists, skipping...\n";
        }
    }
} 