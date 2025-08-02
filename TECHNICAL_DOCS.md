# 📚 Tresbelle Bakehouse - Technical Documentation

> **Dokumentasi teknis lengkap untuk developer**

---

## 📋 Table of Contents

1. [Architecture Overview](#architecture-overview)
2. [Database Design](#database-design)
3. [Controllers & Logic](#controllers--logic)
4. [Views & Templates](#views--templates)
5. [Routes & Navigation](#routes--navigation)
6. [Frontend Assets](#frontend-assets)
7. [Security Implementation](#security-implementation)
8. [Performance Optimization](#performance-optimization)
9. [Error Handling](#error-handling)
10. [Development Guidelines](#development-guidelines)

---

## 🏗️ Architecture Overview

### MVC Pattern Implementation

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│     MODEL       │    │   CONTROLLER    │    │      VIEW       │
│                 │    │                 │    │                 │
│ Cake.php        │◄──►│DashboardCtrl.php│◄──►│ Blade Templates │
│ - Database      │    │ - Business Logic│    │ - UI Rendering  │
│ - Relationships │    │ - Data Flow     │    │ - User Interface│
│ - Validation    │    │ - HTTP Requests │    │ - Presentation  │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

### Request Lifecycle

```
1. User Request → 2. Route → 3. Controller → 4. Model → 5. Database
                                    ↓
6. Response ← 7. Blade Template ← 8. Data Processing ← 9. Query Result
```

---

## 🗄️ Database Design

### ERD (Entity Relationship Diagram)

```sql
┌─────────────────────────────────────┐
│                CAKES                │
├─────────────────────────────────────┤
│ id (PK)          │ BIGINT           │
│ name             │ VARCHAR(255)     │
│ description      │ TEXT             │
│ price            │ DECIMAL(10,2)    │
│ category         │ VARCHAR(100)     │
│ image            │ VARCHAR(255)     │
│ is_available     │ BOOLEAN          │
│ created_at       │ TIMESTAMP        │
│ updated_at       │ TIMESTAMP        │
└─────────────────────────────────────┘
```

### Migration File

**File**: `database/migrations/2025_08_02_030400_create_cakes_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category', 100);
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['category', 'is_available']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cakes');
    }
};
```

### Seeder Implementation

**File**: `database/seeders/CakeSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Cake;
use Illuminate\Database\Seeder;

class CakeSeeder extends Seeder
{
    public function run(): void
    {
        $cakes = [
            [
                'name' => 'Chocolate Fudge Cake',
                'description' => 'Kue coklat lembut dengan lapisan fudge yang kaya dan creamy.',
                'price' => 350000.00,
                'category' => 'chocolate',
                'image' => 'chocolate-fudge-cake.jpg',
                'is_available' => true,
            ],
            // ... more cake data
        ];

        foreach ($cakes as $cake) {
            Cake::create($cake);
        }
    }
}
```

---

## 🎮 Controllers & Logic

### DashboardController

**File**: `app/Http/Controllers/DashboardController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display homepage with cake catalog
     * 
     * @return View
     */
    public function index(): View
    {
        // Fetch only available cakes, ordered by creation date
        $cakes = Cake::where('is_available', true)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('dashboard.index', compact('cakes'));
    }

    /**
     * Display specific cake details
     * 
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        // Find cake or fail with 404
        $cake = Cake::findOrFail($id);

        return view('dashboard.show', compact('cake'));
    }
}
```

### Business Logic Explanation

1. **index()**: 
   - Retrieves available cakes only
   - Orders by newest first
   - Passes data to view

2. **show()**: 
   - Finds specific cake by ID
   - Throws 404 if not found
   - Returns detail view

---

## 🎨 Views & Templates

### Layout Structure

**File**: `resources/views/layouts/app.blade.php`

```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tresbelle Bakehouse')</title>
    
    <!-- CSS Frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        /* CSS Variables for consistent theming */
        :root { /* ... color variables ... */ }
        
        /* Component styles */
        .nav-link { /* ... navigation styles ... */ }
        .card { /* ... card styles ... */ }
        .btn-primary { /* ... button styles ... */ }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <!-- ... navbar content ... -->
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <!-- ... footer content ... -->
    </footer>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
```

### Component Breakdown

#### 1. Hero Section
```php
<section class="hero-section">
    <div class="container-fluid px-4">
        <!-- Responsive grid with centered content -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 text-center">
                <!-- Hero content -->
            </div>
        </div>
    </div>
</section>
```

#### 2. Cake Grid
```php
<div class="row g-4 justify-content-center">
    @foreach($cakes as $cake)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
        <div class="card cake-card h-100">
            <!-- Card content with flexbox layout -->
        </div>
    </div>
    @endforeach
</div>
```

---

## 🛣️ Routes & Navigation

### Route Definition

**File**: `routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cake/{id}', [DashboardController::class, 'show'])->name('cake.show');
```

### Route Analysis

| Route | Method | Controller | Action | Purpose |
|-------|--------|------------|---------|---------|
| `/` | GET | DashboardController | index | Homepage dengan katalog |
| `/cake/{id}` | GET | DashboardController | show | Detail kue spesifik |

### Named Routes Usage

```php
// In Blade templates
<a href="{{ route('dashboard') }}">Home</a>
<a href="{{ route('cake.show', $cake->id) }}">Lihat Detail</a>

// In controllers
return redirect()->route('dashboard');
```

---

## 💎 Frontend Assets

### CSS Architecture

```scss
// 1. CSS Variables (Custom Properties)
:root {
    --primary-color: #A67C5A;
    --primary-dark: #8B5A3C;
    // ... more variables
}

// 2. Base Styles
body { font-family: system-ui; }

// 3. Component Styles
.nav-link { /* navigation styles */ }
.card { /* card component styles */ }
.btn-primary { /* button styles */ }

// 4. Utility Classes
.logo-font { /* custom font styling */ }
.section-title { /* heading styles */ }
```

### JavaScript Functionality

```javascript
// Smooth Scrolling Implementation
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Card Hover Animations
const cards = document.querySelectorAll('.cake-card');
cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-6px)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});
```

### Responsive Design Strategy

```css
/* Mobile First Approach */

/* Base styles (mobile) */
.card { margin-bottom: 1rem; }

/* Tablet */
@media (min-width: 768px) {
    .card { margin-bottom: 1.5rem; }
}

/* Desktop */
@media (min-width: 992px) {
    .card { margin-bottom: 2rem; }
}

/* Large Desktop */
@media (min-width: 1200px) {
    .card { margin-bottom: 2.5rem; }
}
```

---

## 🔒 Security Implementation

### Input Validation

```php
// Model validation rules
class Cake extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 
        'category', 'image', 'is_available'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];
}
```

### XSS Protection

```php
// Blade automatically escapes output
{{ $cake->name }} // Safe - auto-escaped
{!! $cake->description !!} // Unsafe - raw output (avoided)

// Use when raw HTML needed with purification
{!! strip_tags($cake->description) !!}
```

### SQL Injection Prevention

```php
// Eloquent ORM automatically protects against SQL injection
Cake::where('category', $userInput)->get(); // Safe
Cake::whereRaw('category = ?', [$userInput])->get(); // Safe with bindings
```

---

## ⚡ Performance Optimization

### Database Optimization

```php
// Efficient queries
class DashboardController extends Controller
{
    public function index()
    {
        // Only select needed columns
        $cakes = Cake::select(['id', 'name', 'description', 'price', 'category', 'image'])
                    ->where('is_available', true)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('dashboard.index', compact('cakes'));
    }
}
```

### Image Optimization

```php
// Lazy loading implementation
<img src="{{ asset('storage/' . $cake->image) }}"
     alt="{{ $cake->name }}"
     loading="lazy"
     class="cake-image">
```

### Caching Strategy

```php
// Route caching (production)
php artisan route:cache

// View caching (production)
php artisan view:cache

// Config caching (production)
php artisan config:cache
```

---

## 🚨 Error Handling

### 404 Error Handling

```php
// Controller method
public function show(int $id)
{
    $cake = Cake::findOrFail($id); // Throws 404 if not found
    return view('dashboard.show', compact('cake'));
}
```

### Custom Error Pages

```php
// Create: resources/views/errors/404.blade.php
@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1">404</h1>
    <h2>Kue tidak ditemukan</h2>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">
        Kembali ke Beranda
    </a>
</div>
@endsection
```

### Logging Implementation

```php
// In controller for debugging
use Illuminate\Support\Facades\Log;

public function show(int $id)
{
    try {
        $cake = Cake::findOrFail($id);
        Log::info("Cake viewed: {$cake->name}", ['cake_id' => $id]);
        return view('dashboard.show', compact('cake'));
    } catch (ModelNotFoundException $e) {
        Log::warning("Cake not found", ['cake_id' => $id]);
        abort(404);
    }
}
```

---

## 📋 Development Guidelines

### Code Standards

1. **PSR-12 Compliance**: Follow PHP coding standards
2. **Naming Conventions**:
   - Classes: `PascalCase`
   - Methods: `camelCase`
   - Variables: `camelCase`
   - Constants: `UPPER_SNAKE_CASE`

3. **Documentation**: Use PHPDoc for all methods

```php
/**
 * Display cake catalog on homepage
 * 
 * @return \Illuminate\View\View
 * @throws \Exception When database is unavailable
 */
public function index(): View
{
    // Method implementation
}
```

### Git Workflow

```bash
# Feature development
git checkout -b feature/cake-search
git add .
git commit -m "feat: add cake search functionality"
git push origin feature/cake-search

# Create pull request
# After review and approval, merge to main
```

### Testing Strategy

```php
// Feature test example
class CakeTest extends TestCase
{
    /** @test */
    public function it_displays_cake_catalog()
    {
        $cakes = Cake::factory()->count(3)->create();
        
        $response = $this->get('/');
        
        $response->assertStatus(200)
                ->assertViewIs('dashboard.index')
                ->assertViewHas('cakes');
    }

    /** @test */
    public function it_shows_individual_cake()
    {
        $cake = Cake::factory()->create();
        
        $response = $this->get("/cake/{$cake->id}");
        
        $response->assertStatus(200)
                ->assertViewIs('dashboard.show')
                ->assertSee($cake->name);
    }
}
```

### Performance Monitoring

```php
// Add to AppServiceProvider for development
public function boot()
{
    if (app()->environment('local')) {
        DB::listen(function ($query) {
            if ($query->time > 1000) { // Log slow queries
                Log::warning('Slow query detected', [
                    'sql' => $query->sql,
                    'time' => $query->time
                ]);
            }
        });
    }
}
```

---

## 🔧 Deployment Checklist

### Pre-deployment Steps

1. **Environment Configuration**:
   ```bash
   cp .env.example .env.production
   # Configure production values
   ```

2. **Optimization Commands**:
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **File Permissions**:
   ```bash
   chmod -R 755 storage/
   chmod -R 755 bootstrap/cache/
   ```

4. **Database Migration**:
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=CakeSeeder
   ```

### Production Monitoring

- **Error Tracking**: Configure logging for production
- **Performance**: Monitor query times and response times
- **Security**: Regular security updates and dependency checks
- **Backup**: Automated database and file backups

---

<div align="center">

**Dokumentasi Teknis Tresbelle Bakehouse**  
*Oleh Muhammad Fikri Haikal*

📧 **Kontak**: [your-email@example.com]  
🐙 **GitHub**: [@Skynixxx](https://github.com/Skynixxx)

</div>
