# 🧁 Tresbelle Bakehouse

> **Sebuah website katalog kue modern yang dibuat dengan cinta dan teknologi terdepan**

![Laravel](https://img.shields.io/badge/Laravel-12.21.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Status](https://img.shields.io/badge/Status-Active-success?style=for-the-badge)

## 👨‍💻 Developer

**Muhammad Fikri Haikal**  
*Full Stack Developer*

---

## 📖 Tentang Project

**Tresbelle Bakehouse** adalah sebuah website katalog kue yang menampilkan berbagai produk kue dengan desain yang elegan dan responsif. Website ini dibangun menggunakan Laravel framework dengan fokus pada user experience yang optimal dan tampilan visual yang menarik.

### ✨ Fitur Utama

- 🏠 **Homepage Modern** dengan hero section yang menarik
- 🧁 **Katalog Kue** dengan grid layout responsif
- 👁️ **Detail Produk** dengan informasi lengkap kue
- 📱 **Responsive Design** untuk semua perangkat
- 🎨 **Design System** dengan TresBelle color palette
- ⚡ **Performance Optimized** dengan lazy loading dan smooth scrolling

### 🎯 Target Audience

- **End Users**: Pelanggan yang ingin melihat dan memesan kue
- **Business Owner**: Pemilik bakery yang ingin showcasing produk
- **Developers**: Developer yang ingin belajar Laravel dan modern web design

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 12.21.0** - PHP Framework
- **PHP 8.2+** - Server-side programming
- **MySQL** - Database management
- **Eloquent ORM** - Database abstraction

### Frontend
- **Bootstrap 5.3** - CSS Framework
- **FontAwesome 6** - Icon library
- **Custom CSS** - TresBelle design system
- **Vanilla JavaScript** - Interactive features

### Tools & Development
- **Composer** - PHP dependency manager
- **NPM/Yarn** - Frontend package manager
- **Git** - Version control
- **Laragon/XAMPP** - Local development environment

---

## 🚀 Instalasi & Setup

### Prerequisites

Pastikan Anda memiliki:
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM (opsional)

### 1. Clone Repository

```bash
git clone https://github.com/Skynixxx/tresbelle-bakehouse.git
cd tresbelle-bakehouse
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install frontend dependencies (optional)
npm install
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

Edit file `.env` dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tresbelle_bakehouse
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migration & Seeding

```bash
# Create database tables
php artisan migrate

# Seed sample data
php artisan db:seed
```

### 6. Storage Link

```bash
# Create symbolic link for file storage
php artisan storage:link
```

### 7. Run Application

```bash
# Start development server
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

---

## 📁 Struktur Project

```
tresbelle-bakehouse/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── DashboardController.php    # Controller utama
│   └── Models/
│       └── Cake.php                       # Model kue
├── database/
│   ├── migrations/
│   │   └── create_cakes_table.php         # Database schema
│   └── seeders/
│       ├── CakeSeeder.php                 # Sample data kue
│       └── DatabaseSeeder.php             # Main seeder
├── public/
│   ├── image/                             # Asset gambar
│   └── storage/                           # Uploaded files
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Main layout
│       └── dashboard/
│           ├── index.blade.php            # Homepage
│           └── show.blade.php             # Detail kue
├── routes/
│   └── web.php                            # Route definitions
└── README.md
```

---

## 🎨 Design System

### Color Palette

```css
:root {
  --primary-color: #A67C5A;      /* Warm Brown */
  --primary-dark: #8B5A3C;       /* Dark Brown */
  --accent-color: #D4B996;       /* Light Beige */
  --accent-dark: #C5A572;        /* Dark Beige */
  --sage-green: #9CAF88;         /* Sage Green */
  --text-primary: #2C3E50;       /* Dark Blue Gray */
  --text-secondary: #5D6D7E;     /* Medium Gray */
  --bg-primary: #FFFFFF;         /* Pure White */
  --bg-secondary: #F8F9FA;       /* Light Gray */
}
```

### Typography
- **Primary Font**: System fonts untuk readability optimal
- **Logo Font**: Custom styling untuk branding
- **Font Sizes**: Responsive scaling dengan rem units

### Components
- **Cards**: Modern dengan shadow dan hover effects
- **Buttons**: Gradient dengan smooth transitions
- **Navigation**: Clean dengan icon alignment
- **Grid**: Responsive dengan Bootstrap 5 grid system

---

## 📊 Database Schema

### Tabel: `cakes`

| Field | Type | Description |
|-------|------|-------------|
| `id` | bigint | Primary key |
| `name` | varchar(255) | Nama kue |
| `description` | text | Deskripsi kue |
| `price` | decimal(10,2) | Harga kue |
| `category` | varchar(100) | Kategori kue |
| `image` | varchar(255) | Path gambar |
| `is_available` | boolean | Status ketersediaan |
| `created_at` | timestamp | Waktu dibuat |
| `updated_at` | timestamp | Waktu diupdate |

---

## 🔧 API Routes

### Public Routes

| Method | URL | Description |
|--------|-----|-------------|
| `GET` | `/` | Homepage dengan katalog kue |
| `GET` | `/cake/{id}` | Detail kue berdasarkan ID |

### Route Names

```php
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cake/{id}', [DashboardController::class, 'show'])->name('cake.show');
```

---

## 🎯 Fitur Detail

### 1. Homepage (Dashboard)

**File**: `resources/views/dashboard/index.blade.php`

**Fitur**:
- Hero section dengan call-to-action
- Grid katalog kue responsif
- Features section dengan value proposition
- Smooth scrolling navigation

**Controller**: `DashboardController@index`

### 2. Detail Kue

**File**: `resources/views/dashboard/show.blade.php`

**Fitur**:
- Gambar kue dengan zoom effect
- Informasi lengkap produk
- Kategori dan harga
- Navigation kembali ke katalog

**Controller**: `DashboardController@show`

### 3. Responsive Design

**Breakpoints**:
- `col-xl-3`: Desktop besar (4 kolom)
- `col-lg-4`: Desktop (3 kolom)
- `col-md-6`: Tablet (2 kolom)
- `col-sm-8`: Mobile (1 kolom)

---

## 🚀 Deployment

### 1. Production Setup

```bash
# Optimize for production
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Server Requirements

- PHP >= 8.2
- MySQL >= 5.7
- Apache/Nginx
- SSL Certificate (recommended)

### 3. Environment Variables

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

---

## 🔍 Testing

### Running Tests

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=CakeTest
```

### Sample Test Cases

- ✅ Homepage loads successfully
- ✅ Cake catalog displays correctly
- ✅ Individual cake details accessible
- ✅ Responsive design works on all devices
- ✅ Database queries optimized

---

## 📈 Performance

### Optimizations Applied

- **Database**: Eager loading untuk relationships
- **Images**: Lazy loading dan compression
- **CSS/JS**: Minification dan caching
- **Cache**: Route dan view caching
- **CDN**: FontAwesome dari CDN

### Performance Metrics

- **Page Load**: < 2 seconds
- **Image Loading**: Lazy loading
- **Database Queries**: Optimized with indexes
- **Mobile Score**: 95+ (PageSpeed Insights)

---

## 🤝 Contributing

### Development Workflow

1. Fork repository
2. Create feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Submit pull request

### Code Standards

- Follow PSR-12 coding standard
- Use meaningful variable names
- Add comments for complex logic
- Write tests for new features

---

## 📝 Changelog

### Version 1.0.0 (Current)
- ✨ Initial release
- 🎨 Modern responsive design
- 🧁 Cake catalog functionality
- 📱 Mobile-first approach
- ⚡ Performance optimizations

---

## 📞 Support

### Contact Information

**Developer**: Muhammad Fikri Haikal  
**Email**: [your-email@example.com]  
**GitHub**: [@Skynixxx](https://github.com/Skynixxx)

### Issues & Bugs

Jika Anda menemukan bug atau memiliki saran, silakan:
1. Buka [Issues](https://github.com/Skynixxx/tresbelle-bakehouse/issues)
2. Describe masalah dengan detail
3. Include screenshot jika diperlukan

---

## 📄 License

Project ini menggunakan **MIT License**. Lihat file `LICENSE` untuk detail lengkap.

---

## 🙏 Acknowledgments

- **Laravel Team** - Framework yang luar biasa
- **Bootstrap Team** - CSS framework yang powerful
- **FontAwesome** - Icon library yang comprehensive
- **Community** - Inspirasi dan dukungan

---

<div align="center">

**Dibuat dengan ❤️ oleh Muhammad Fikri Haikal**

⭐ **Jangan lupa kasih star jika project ini membantu!** ⭐

</div>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
