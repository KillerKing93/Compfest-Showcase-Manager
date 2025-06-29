<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'SEA Compfest 17 - Catering Website',
                'description' => 'Website platform catering sehat dengan kustomisasi menu dan pengiriman ke seluruh Indonesia. Dibangun menggunakan CodeIgniter 4 dengan fokus pada pengalaman pengguna yang optimal.',
                'url' => 'https://compfest-17-sea.craftthingy.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Compfest Showcase Manager',
                'description' => 'Website manajemen showcase untuk proyek-proyek Compfest. Memungkinkan pengguna untuk melihat dan mengelola berbagai proyek showcase dalam satu platform.',
                'url' => 'http://compfest.craftthingy.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Check if projects already exist
        $existingProjects = $this->db->table('projects')->countAllResults();
        
        if ($existingProjects == 0) {
            $this->db->table('projects')->insertBatch($data);
            echo "✅ Sample projects created successfully!\n";
        } else {
            echo "ℹ️ Projects already exist, skipping sample data...\n";
        }
    }
} 