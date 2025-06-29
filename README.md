# Compfest Showcase Manager

Website manajemen showcase untuk proyek-proyek Compfest dengan panel admin yang dilindungi password. Dibangun menggunakan CodeIgniter 4 dengan database SQLite.

## 🌟 Fitur Utama

### 🎨 Showcase Public
- Tampilan project showcase yang indah dan responsif
- Card layout dengan animasi CSS
- Link langsung ke website project
- Tombol admin login untuk akses panel admin

### 🔐 Panel Admin (Dilindungi Password)
- **Dashboard** dengan statistik project
- **CRUD Projects** (Create, Read, Update, Delete)
- **User Management** dengan sistem autentikasi
- **Responsive Design** dengan sidebar navigation
- **Flash Messages** untuk feedback user

### 🛠️ Teknologi
- **Framework**: CodeIgniter 4
- **Database**: SQLite3
- **Frontend**: Bootstrap 5 + Animate.css
- **Icons**: Bootstrap Icons
- **Security**: Password hashing, Session management

## 📋 Prasyarat Sistem

- **PHP**: 8.1 atau lebih tinggi
- **Composer**: Versi terbaru
- **SQLite3**: Extension PHP SQLite3
- **Extensions PHP**: intl, mbstring, json, sqlite3

## 🚀 Instalasi & Setup

### ⚡ Quick Start (5 Menit)

#### 1. Clone Repository
```bash
git clone <repository-url>
cd compfest-showcase-manager
```

#### 2. Install Dependencies
```bash
composer install
```

#### 3. Setup Otomatis
```bash
# Jalankan script setup otomatis
php setup.php
```

#### 4. Jalankan Server
```bash
php spark serve --host=localhost --port=8080
```

#### 5. Akses Website
- **Showcase**: http://localhost:8080/
- **Admin Login**: http://localhost:8080/auth/login
  - Username: `admin`
  - Password: `admin123`

### 🔧 Setup Manual (Jika Otomatis Gagal)

#### 1. Setup Environment
```bash
# Copy file environment
cp env .env

# Edit .env sesuai kebutuhan
# Pastikan database.default.DBDriver = SQLite3
# dan database.default.database = writable/compfest_manager.db
```

#### 2. Setup Database Manual
```bash
# Buat database SQLite
mkdir -p writable
touch writable/compfest_manager.db

# Jalankan migrasi
php spark migrate

# Jalankan seeder
php spark db:seed InitialSeeder
```

## 🔐 Kredensial Default

- **Username**: `admin`
- **Password**: `admin123`
- **Email**: `admin@compfest.com`

## 🌐 URL Penting

- **Showcase Public**: `http://localhost:8080/`
- **Admin Login**: `http://localhost:8080/auth/login`
- **Admin Dashboard**: `http://localhost:8080/admin/dashboard`
- **Manage Projects**: `http://localhost:8080/admin/projects`
- **SEA Compfest Showcase**: `http://localhost:8080/compfest-17-sea`

## 📁 Struktur Database

### Tabel `users`
- `id` (Primary Key)
- `username` (Unique)
- `password` (Hashed)
- `email` (Unique)
- `role`
- `created_at`, `updated_at`

### Tabel `projects`
- `id` (Primary Key)
- `name`
- `description`
- `url`
- `created_at`, `updated_at`

## 🎨 Customization

### Menambah Project Baru
1. Login ke admin panel
2. Klik "Add New Project"
3. Isi form dengan data project
4. Klik "Save Project"

### Mengubah Password Admin
1. Login ke admin panel
2. Edit user melalui database atau buat user baru
3. Password akan otomatis di-hash

### Mengubah Desain
- Edit file di `app/Views/`
- CSS custom di `app/Views/layouts/`
- Bootstrap 5 classes tersedia

## 🔧 Troubleshooting

### Database Error
```bash
# Hapus database dan buat ulang
rm writable/compfest_manager.db
php setup.php
```

### Permission Error
```bash
# Set permission folder writable
chmod -R 755 writable/
chmod 644 writable/compfest_manager.db
```

### Migration Error
```bash
# Reset database
php spark migrate:rollback
php spark migrate
php spark db:seed InitialSeeder
```

### Composer Error
```bash
# Clear composer cache
composer clear-cache
composer install --no-cache
```

## 🌐 Production Setup

### 1. Environment Production
```env
CI_ENVIRONMENT = production
app.baseURL = 'https://yourdomain.com/'
app.forceGlobalSecureRequests = true
```

### 2. Web Server Configuration

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### 3. Security Checklist
- [ ] Ubah password admin default
- [ ] Set environment ke production
- [ ] Enable HTTPS
- [ ] Set proper file permissions
- [ ] Backup database regularly

## 📁 Struktur File Penting

```
compfest-showcase-manager/
├── app/
│   ├── Controllers/
│   │   ├── Admin.php          # Panel admin
│   │   ├── Auth.php           # Login/logout
│   │   └── Projects.php       # Showcase public
│   ├── Models/
│   │   ├── ProjectModel.php   # Model projects
│   │   └── UserModel.php      # Model users
│   ├── Views/
│   │   ├── admin/             # Views admin panel
│   │   ├── auth/              # Views login
│   │   └── projects/          # Views showcase
│   └── Database/
│       ├── Migrations/        # Database migrations
│       └── Seeds/             # Database seeders
├── writable/
│   └── compfest_manager.db    # Database SQLite
├── setup.php                  # Script setup otomatis
├── .env                       # Environment config
└── README.md                  # Dokumentasi utama
```

## 🔐 Keamanan

### Default Credentials
- **Username**: `admin`
- **Password**: `admin123`

### Mengubah Password Admin
1. Login ke admin panel
2. Edit user melalui database:
```sql
UPDATE users SET password = 'new_hashed_password' WHERE username = 'admin';
```

### Menambah User Baru
```sql
INSERT INTO users (username, password, email, role) VALUES 
('newadmin', 'hashed_password', 'newadmin@example.com', 'admin');
```

## 📝 License

MIT License - Lihat file LICENSE untuk detail.

## 🤝 Contributing

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## 📞 Support

Untuk pertanyaan atau bantuan:
1. Cek log error di `writable/logs/`
2. Pastikan semua prasyarat terpenuhi
3. Coba setup manual jika otomatis gagal
4. Buat issue di repository dengan detail error

---

**Compfest Showcase Manager** - Dibuat dengan ❤️ menggunakan CodeIgniter 4
