@extends('layouts.app')

@section('title', 'Dashboard - Tresbelle Bakehouse')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 text-center">
        <h1 class="display-4 logo-font mb-4" style="color: var(--primary-dark);">
          Selamat Datang di Tresbelle Bakehouse
        </h1>
        <p class="lead mb-4 mx-auto" style="max-width: 600px;">
          Nikmati koleksi kue-kue terbaik kami yang dibuat dengan cinta dan bahan berkualitas tinggi
        </p>
        <a href="#menu" class="btn btn-primary btn-lg px-5">
          <i class="fas fa-birthday-cake me-2"></i>
          Lihat Menu Kami
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Menu Section -->
<section id="menu" class="py-5">
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title text-center mb-5">Menu Kue Kami</h2>
      </div>
    </div>

    @if($cakes->count() > 0)
    <div class="row g-4 justify-content-center">
      @foreach($cakes as $cake)
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
        <div class="card cake-card h-100 mx-auto" style="max-width: 320px;">
          <div class="card-body p-4 d-flex flex-column">
            @if($cake->image)
            <img src="{{ asset('storage/' . $cake->image) }}"
              alt="{{ $cake->name }}"
              class="cake-image w-100 mb-3"
              style="height: 200px; object-fit: cover; border-radius: 12px;">
            @else
            <div class="cake-image w-100 mb-3 bg-light d-flex align-items-center justify-content-center"
              style="height: 200px; border-radius: 12px;">
              <i class="fas fa-birthday-cake fa-3x text-muted"></i>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="category-badge">{{ ucfirst($cake->category) }}</span>
              <span class="price-tag">Rp {{ number_format($cake->price, 0, ',', '.') }}</span>
            </div>

            <h5 class="card-title mb-3" style="color: var(--text-primary); line-height: 1.3;">
              {{ $cake->name }}
            </h5>

            <p class="card-text text-muted mb-4 flex-grow-1" style="font-size: 0.9rem; line-height: 1.5;">
              {{ Str::limit($cake->description, 100) }}
            </p>

            <div class="d-grid mt-auto">
              <a href="{{ route('cake.show', $cake->id) }}" class="btn btn-primary">
                <i class="fas fa-eye me-2"></i>
                Lihat Detail
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="row justify-content-center">
      <div class="col-md-6 text-center py-5">
        <i class="fas fa-birthday-cake fa-5x text-muted mb-4"></i>
        <h4 class="text-muted">Belum ada menu yang tersedia</h4>
        <p class="text-muted">Menu kue-kue lezat kami akan segera hadir!</p>
      </div>
    </div>
    @endif
  </div>
</section>

<!-- Features Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--secondary-light) 100%);">
  <div class="container-fluid px-4">
    <div class="row justify-content-center">
      <div class="col-12 text-center mb-4">
        <h3 class="section-title" style="font-size: 2rem; margin-bottom: 1rem;">Mengapa Memilih Kami?</h3>
        <p class="text-muted" style="max-width: 600px; margin: 0 auto;">
          Komitmen kami untuk memberikan yang terbaik dalam setiap produk
        </p>
      </div>
    </div>
    
    <div class="row g-4 justify-content-center">
      <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card feature-card border-0 h-100 text-center mx-auto" style="max-width: 280px;">
          <div class="card-body p-4">
            <div class="feature-icon mb-3">
              <i class="fas fa-heart fa-3x" style="color: var(--accent-color);"></i>
            </div>
            <h5 class="mb-3" style="color: var(--text-primary);">Dibuat dengan Cinta</h5>
            <p class="text-muted" style="font-size: 0.9rem; line-height: 1.6;">
              Setiap kue dibuat dengan penuh kasih sayang dan perhatian detail untuk memberikan rasa terbaik
            </p>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card feature-card border-0 h-100 text-center mx-auto" style="max-width: 280px;">
          <div class="card-body p-4">
            <div class="feature-icon mb-3">
              <i class="fas fa-leaf fa-3x" style="color: var(--sage-green);"></i>
            </div>
            <h5 class="mb-3" style="color: var(--text-primary);">Bahan Berkualitas</h5>
            <p class="text-muted" style="font-size: 0.9rem; line-height: 1.6;">
              Menggunakan bahan-bahan segar dan berkualitas tinggi pilihan untuk hasil yang sempurna
            </p>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-lg-6 col-md-8">
        <div class="card feature-card border-0 h-100 text-center mx-auto" style="max-width: 280px;">
          <div class="card-body p-4">
            <div class="feature-icon mb-3">
              <i class="fas fa-clock fa-3x" style="color: var(--primary-color);"></i>
            </div>
            <h5 class="mb-3" style="color: var(--text-primary);">Selalu Fresh</h5>
            <p class="text-muted" style="font-size: 0.9rem; line-height: 1.6;">
              Kue-kue kami dibuat fresh setiap hari untuk menjamin kesegaran dan kualitas optimal
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  // Smooth scrolling for anchor links
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
</script>
@endpush