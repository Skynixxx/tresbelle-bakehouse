@extends('layouts.app')

@section('title', $cake->name . ' - Tresbelle Bakehouse')

@section('content')
<div class="container py-5">
  <div class="row">
    <!-- Cake Image -->
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body p-0">
          @if($cake->image)
          <img src="{{ asset('storage/' . $cake->image) }}"
            alt="{{ $cake->name }}"
            class="w-100 rounded"
            style="height: 400px; object-fit: cover;">
          @else
          <div class="w-100 bg-light d-flex align-items-center justify-content-center rounded"
            style="height: 400px; background: var(--bg-secondary) !important;">
            <i class="fas fa-birthday-cake fa-5x" style="color: var(--text-muted);"></i>
          </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Cake Details -->
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="card-body p-4">
          <!-- Category Badge -->
          <div class="mb-3">
            <span class="category-badge">{{ ucfirst($cake->category) }}</span>
            @if($cake->is_available)
            <span class="badge bg-success ms-2">
              <i class="fas fa-check me-1"></i> Tersedia
            </span>
            @else
            <span class="badge bg-danger ms-2">
              <i class="fas fa-times me-1"></i> Tidak Tersedia
            </span>
            @endif
          </div>

          <!-- Cake Name -->
          <h1 class="card-title mb-3" style="color: var(--text-primary);">
            {{ $cake->name }}
          </h1>

          <!-- Price -->
          <div class="mb-4">
            <h3 class="price-tag fs-4 mb-0">
              Rp {{ number_format($cake->price, 0, ',', '.') }}
            </h3>
          </div>

          <!-- Description -->
          <div class="mb-4">
            <h5 style="color: var(--primary-dark);">Deskripsi</h5>
            <p class="text-muted lh-lg">{{ $cake->description }}</p>
          </div>

          <!-- Action Buttons -->
          <div class="d-grid gap-2">
            @if($cake->is_available)
            <button class="btn btn-primary btn-lg" onclick="orderCake()">
              <i class="fas fa-shopping-cart me-2"></i>
              Pesan Sekarang
            </button>
            @else
            <button class="btn btn-secondary btn-lg" disabled>
              <i class="fas fa-times me-2"></i>
              Tidak Tersedia
            </button>
            @endif

            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
              <i class="fas fa-arrow-left me-2"></i>
              Kembali ke Menu
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Additional Information -->
  <div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-body p-4">
          <h5 class="mb-4" style="color: var(--primary-dark);">Informasi Tambahan</h5>
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-clock me-3" style="color: var(--accent-color);"></i>
                <div>
                  <strong style="color: var(--text-primary);">Waktu Pembuatan</strong><br>
                  <small class="text-muted">2-3 hari kerja</small>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-temperature-low me-3" style="color: var(--sage-green);"></i>
                <div>
                  <strong style="color: var(--text-primary);">Penyimpanan</strong><br>
                  <small class="text-muted">Simpan di lemari es</small>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-utensils me-3" style="color: var(--primary-color);"></i>
                <div>
                  <strong style="color: var(--text-primary);">Porsi</strong><br>
                  <small class="text-muted">6-8 orang</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Related Cakes Section -->
<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h4 class="section-title text-center mb-4">Kue Lainnya</h4>
      <div class="row justify-content-center">
        @php
        $relatedCakes = App\Models\Cake::where('id', '!=', $cake->id)
        ->where('available', true)
        ->take(3)
        ->get();
        @endphp

        @foreach($relatedCakes as $relatedCake)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
          <div class="card cake-card h-100 shadow-sm" style="max-width: 350px; width: 100%;">
            @if($relatedCake->image)
            <div class="position-relative overflow-hidden" style="height: 200px;">
              <img src="{{ asset('storage/' . $relatedCake->image) }}"
                alt="{{ $relatedCake->name }}"
                class="cake-image w-100 h-100"
                style="object-fit: cover;">

              <!-- Price Badge -->
              <div class="position-absolute top-0 end-0 m-2">
                <span class="price-tag shadow-sm">
                  Rp {{ number_format($relatedCake->price, 0, ',', '.') }}
                </span>
              </div>
            </div>
            @else
            <div class="cake-image-placeholder d-flex align-items-center justify-content-center bg-light"
              style="height: 200px;">
              <div class="text-center">
                <i class="fas fa-birthday-cake fa-3x text-muted mb-2"></i>
                <p class="text-muted mb-0 small">No Image</p>
              </div>

              <!-- Price for no image -->
              <div class="position-absolute top-0 end-0 m-2">
                <span class="price-tag shadow-sm">
                  Rp {{ number_format($relatedCake->price, 0, ',', '.') }}
                </span>
              </div>
            </div>
            @endif

            <div class="card-body p-3 d-flex flex-column">
              <h6 class="card-title mb-2 fw-bold" style="color: var(--text-primary);">
                {{ $relatedCake->name }}
              </h6>
              <p class="card-text text-muted mb-3 flex-grow-1 small">
                {{ Str::limit($relatedCake->description, 80) }}
              </p>
              <div class="mt-auto">
                <a href="{{ route('cake.show', $relatedCake->id) }}"
                  class="btn btn-outline-primary btn-sm w-100">
                  <i class="fas fa-eye me-1"></i>
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@push('scripts')
<script>
  function orderCake() {
    // Placeholder for ordering functionality
    alert('Fitur pemesanan akan segera tersedia!\n\nUntuk sementara, silakan hubungi kami di:\nTelp: (021) 123-4567\nWA: 0812-3456-7890');
  }
</script>
@endpush