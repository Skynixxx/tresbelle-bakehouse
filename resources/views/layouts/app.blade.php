<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Tresbelle Bakehouse')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=dancing-script:400,600,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      /* Main Color Palette - Soft & Harmonious */
      --primary-color: #a67c5a;
      --primary-light: #c4a484;
      --primary-dark: #8b5e3c;

      --secondary-color: #f5f1ed;
      --secondary-light: #faf8f6;
      --secondary-dark: #e8e1db;

      --accent-color: #d4a574;
      --accent-light: #e6c299;
      --accent-dark: #b8925f;

      /* Complementary Colors */
      --sage-green: #9db3a0;
      --sage-light: #b8c7bb;
      --sage-dark: #7d9680;

      /* Neutral Colors */
      --text-primary: #4a3428;
      --text-secondary: #6b5349;
      --text-muted: #8a7269;
      --text-light: #a39089;

      /* Background Colors */
      --bg-primary: #fefcfa;
      --bg-secondary: #f9f6f2;
      --bg-tertiary: #f2ede8;

      /* Status Colors */
      --success: #7fb069;
      --warning: #f4a261;
      --danger: #e76f51;
      --info: #87ceeb;

      /* Shadow Colors */
      --shadow-light: rgba(166, 124, 90, 0.08);
      --shadow-medium: rgba(166, 124, 90, 0.15);
      --shadow-dark: rgba(166, 124, 90, 0.25);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-tertiary) 100%);
      color: var(--text-primary);
      min-height: 100vh;
      line-height: 1.6;
      overflow-x: hidden;
    }

    html {
      overflow-x: hidden;
    }

    .container,
    .container-fluid {
      max-width: 100%;
      overflow-x: hidden;
    }

    .logo-font {
      font-family: 'Dancing Script', cursive;
      font-weight: 600;
    }

    .navbar-brand {
      font-size: 2rem;
      color: var(--primary-color) !important;
      text-shadow: 0 2px 4px var(--shadow-light);
    }

    .navbar {
      background: rgba(254, 252, 250, 0.95) !important;
      backdrop-filter: blur(15px) saturate(180%);
      box-shadow: 0 2px 20px var(--shadow-light);
      border-bottom: 1px solid var(--secondary-dark);
      padding: 0.6rem 0;
      transition: all 0.3s ease;
    }

    .navbar .container-fluid {
      padding-left: 2rem;
      padding-right: 2rem;
    }

    @media (max-width: 768px) {
      .navbar .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
      }
    }

    .navbar.scrolled {
      padding: 0.4rem 0;
      background: rgba(254, 252, 250, 0.98) !important;
      box-shadow: 0 4px 24px var(--shadow-medium);
    }

    .navbar-brand {
      font-size: 1.6rem;
      color: var(--primary-color) !important;
      text-shadow: 0 1px 2px var(--shadow-light);
      font-weight: 600;
      transition: all 0.2s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .navbar-brand:hover {
      color: var(--primary-dark) !important;
      transform: translateY(-1px);
    }

    .navbar-brand img {
      transition: transform 0.2s ease;
      border-radius: 50%;
      object-fit: cover;
    }

    .navbar-brand:hover img {
      transform: scale(1.05);
    }

    .navbar-nav {
      gap: 0.5rem;
    }

    @media (max-width: 991px) {
      .navbar-nav {
        gap: 0.25rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(166, 124, 90, 0.2);
      }
    }

    .nav-item {
      margin: 0 0.25rem;
    }

    .nav-link {
      color: var(--text-secondary) !important;
      font-weight: 500;
      font-size: 0.9rem;
      padding: 0.75rem 1rem !important;
      border-radius: 20px;
      transition: all 0.3s ease;
      position: relative;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      white-space: nowrap;
      min-width: 90px;
    }

    .nav-link i {
      font-size: 0.9rem;
      width: 16px;
      text-align: center;
      transition: transform 0.3s ease;
      display: inline-block;
    }

    .nav-link span {
      margin-left: 0.5rem;
      display: inline-block;
    }

    .nav-link:hover {
      color: var(--primary-color) !important;
      background: rgba(166, 124, 90, 0.08);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(166, 124, 90, 0.15);
    }

    .nav-link:hover i {
      transform: scale(1.1);
    }

    .nav-link.active {
      background: var(--primary-color);
      color: white !important;
      box-shadow: 0 4px 16px rgba(166, 124, 90, 0.3);
    }

    .nav-link.active:hover {
      color: white !important;
      transform: translateY(-1px);
    }

    .navbar-toggler {
      border: 1px solid var(--primary-color);
      border-radius: 6px;
      padding: 0.4rem;
      transition: all 0.2s ease;
    }

    .navbar-toggler:hover {
      background: var(--primary-color);
      transform: scale(1.02);
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28166, 124, 90, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-toggler:hover .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='white' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Contact Button Special Style */
    .nav-contact-btn {
      background: linear-gradient(135deg, var(--sage-green) 0%, var(--sage-dark) 100%);
      color: white !important;
      margin-left: 0.5rem;
      border-radius: 20px;
      box-shadow: 0 2px 8px rgba(157, 179, 160, 0.25);
    }

    .nav-contact-btn:hover {
      background: linear-gradient(135deg, var(--sage-dark) 0%, var(--sage-green) 100%);
      transform: translateY(-1px);
      box-shadow: 0 3px 12px rgba(157, 179, 160, 0.35);
      color: white !important;
    }

    .card {
      border: none;
      border-radius: 24px;
      box-shadow: 0 4px 16px var(--shadow-light);
      transition: all 0.3s ease;
      background: var(--bg-primary);
      border: 1px solid var(--secondary-dark);
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 32px var(--shadow-medium);
      border-color: var(--accent-color);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
      border: none;
      border-radius: 50px;
      padding: 14px 32px;
      font-weight: 600;
      font-size: 0.95rem;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px var(--shadow-light);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, var(--primary-dark) 0%, var(--accent-dark) 100%);
      transform: translateY(-3px);
      box-shadow: 0 8px 24px var(--shadow-medium);
      color: white;
    }

    .btn-primary:active {
      transform: translateY(-1px);
      box-shadow: 0 4px 16px var(--shadow-light);
    }

    .btn-outline-primary {
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      background: transparent;
      border-radius: 50px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
      background: var(--primary-color);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px var(--shadow-light);
    }

    .cake-card {
      overflow: hidden;
      position: relative;
      transition: all 0.3s ease;
      border-radius: 20px;
      box-shadow: 0 4px 20px var(--shadow-light);
    }

    .cake-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 40px var(--shadow-medium);
    }

    .cake-image {
      height: 200px;
      object-fit: cover;
      border-radius: 15px;
      transition: all 0.3s ease;
      filter: brightness(1) saturate(1);
    }

    .cake-card:hover .cake-image {
      transform: scale(1.03);
      filter: brightness(1.05) saturate(1.1);
    }

    .feature-card {
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 4px 20px var(--shadow-light);
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px var(--shadow-medium);
      background: rgba(255, 255, 255, 1);
    }

    .feature-icon {
      transition: transform 0.3s ease;
    }

    .feature-card:hover .feature-icon {
      transform: scale(1.1);
    }

    .price-tag {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
      color: white;
      padding: 8px 16px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 0.9rem;
      display: inline-block;
      box-shadow: 0 2px 8px var(--shadow-light);
      letter-spacing: 0.5px;
    }

    .category-badge {
      background: var(--secondary-color);
      color: var(--text-secondary);
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      border: 1px solid var(--secondary-dark);
      text-transform: capitalize;
    }

    .hero-section {
      background: linear-gradient(135deg, var(--secondary-light) 0%, var(--bg-secondary) 50%, var(--secondary-color) 100%);
      padding: 120px 0 100px;
      text-align: center;
      border-radius: 0 0 50px 50px;
      margin: 0 0 80px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 32px var(--shadow-light);
    }

    @media (min-width: 768px) {
      .hero-section {
        padding: 140px 0 120px;
        border-radius: 0 0 60px 60px;
        margin-bottom: 100px;
      }
    }

    @media (min-width: 992px) {
      .hero-section {
        padding: 160px 0 140px;
        border-radius: 0 0 80px 80px;
        margin-bottom: 120px;
      }
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 20% 80%, var(--accent-light) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, var(--sage-light) 0%, transparent 50%);
      opacity: 0.3;
      z-index: 1;
    }

    .hero-section>.container,
    .hero-section>.container-fluid {
      position: relative;
      z-index: 2;
    }

    .section-title {
      color: var(--primary-dark);
      font-weight: 700;
      margin-bottom: 40px;
      position: relative;
      font-size: 2.2rem;
    }

    @media (min-width: 768px) {
      .section-title {
        font-size: 2.5rem;
      }
    }

    .section-title::after {
      content: '';
      display: block;
      width: 100px;
      height: 4px;
      background: linear-gradient(90deg, var(--accent-color) 0%, var(--sage-green) 100%);
      margin: 20px auto;
      border-radius: 2px;
    }

    footer {
      background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary-dark) 100%);
      color: var(--secondary-light);
      margin-top: 60px;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    footer .container {
      padding-left: 2rem;
      padding-right: 2rem;
    }

    @media (max-width: 768px) {
      footer .container {
        padding-left: 1rem;
        padding-right: 1rem;
      }
    }

    footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent 0%, var(--accent-color) 50%, transparent 100%);
    }

    /* Footer Enhanced Styles */
    .footer-brand h3 {
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
    }

    .footer-desc {
      color: var(--secondary-light);
      line-height: 1.6;
      opacity: 0.9;
      margin-bottom: 1rem;
    }

    .operating-hours {
      padding-left: 0;
    }

    .operating-hours h6 {
      border-bottom: 2px solid var(--accent-color);
      padding-bottom: 8px;
      display: inline-block;
      margin-bottom: 1rem;
    }

    .hour-item {
      padding: 10px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      color: var(--secondary-light);
    }

    .hour-item:last-child {
      border-bottom: none;
    }

    .hour-item.closed {
      opacity: 0.7;
      color: var(--accent-color);
      font-weight: 600;
    }

    .contact-item {
      display: flex;
      align-items: flex-start;
      gap: 15px;
      margin-bottom: 1.2rem;
      padding: 12px;
      border-radius: 12px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .contact-item:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--accent-color);
      transform: translateX(5px);
    }

    .contact-item i {
      color: var(--accent-color);
      font-size: 1.3rem;
      margin-top: 2px;
      width: 24px;
      flex-shrink: 0;
      transition: all 0.3s ease;
    }

    .contact-item:hover i {
      color: white;
      transform: scale(1.1);
    }

    .contact-item i.text-success:hover {
      color: #25D366 !important;
    }

    .contact-item i.text-warning:hover {
      color: #ffc107 !important;
    }

    .contact-item div {
      flex: 1;
    }

    .contact-item strong {
      color: white;
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .contact-item a {
      transition: all 0.3s ease;
      color: var(--secondary-light);
      text-decoration: none;
      display: inline-block;
    }

    .contact-item a:hover {
      color: var(--accent-color) !important;
      text-decoration: none !important;
      transform: translateX(3px);
    }

    .service-badges {
      margin-top: 1rem;
    }

    .service-badges .badge {
      font-size: 0.85rem;
      padding: 8px 12px;
      border-radius: 20px;
      font-weight: 500;
    }

    .quick-links {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .footer-link {
      color: var(--secondary-light);
      text-decoration: none;
      transition: all 0.3s ease;
      padding: 8px 12px;
      border-radius: 8px;
      display: flex;
      align-items: center;
    }

    .footer-link:hover {
      color: var(--accent-color);
      background: rgba(255, 255, 255, 0.05);
      transform: translateX(8px);
    }

    .footer-link i {
      color: var(--accent-color);
      width: 20px;
    }

    .btn-whatsapp {
      background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
      border: none;
      color: white;
      padding: 15px 25px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 16px rgba(37, 211, 102, 0.3);
      position: relative;
      overflow: hidden;
      font-size: 0.95rem;
    }

    .btn-whatsapp::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .btn-whatsapp:hover::before {
      left: 100%;
    }

    .btn-whatsapp:hover {
      background: linear-gradient(135deg, #128C7E 0%, #25D366 100%);
      transform: translateY(-3px) scale(1.02);
      box-shadow: 0 8px 25px rgba(37, 211, 102, 0.5);
      color: white;
    }

    .btn-whatsapp:active {
      transform: translateY(-1px) scale(1);
      box-shadow: 0 4px 16px rgba(37, 211, 102, 0.4);
    }

    .footer-divider {
      border: none;
      height: 1px;
      background: linear-gradient(90deg, transparent 0%, var(--accent-color) 50%, transparent 100%);
      opacity: 0.5;
    }

    .footer-copyright {
      color: var(--secondary-light);
      opacity: 0.8;
    }

    .text-accent {
      color: var(--accent-color);
    }

    .social-links {
      display: flex;
      gap: 15px;
      justify-content: flex-end;
    }

    .social-link {
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--secondary-light);
      text-decoration: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .social-link:hover {
      background: var(--accent-color);
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 4px 16px rgba(234, 180, 108, 0.4);
    }

    @media (max-width: 768px) {
      .social-links {
        justify-content: center;
        margin-top: 20px;
      }

      .footer-copyright {
        text-align: center;
        margin-bottom: 1rem;
      }

      .footer-brand h3 {
        justify-content: center;
        text-align: center;
      }

      .footer-desc {
        text-align: center;
      }

      .operating-hours {
        text-align: center;
      }

      .contact-info {
        text-align: center;
      }

      .contact-item {
        justify-content: center;
        text-align: left;
      }

      .quick-links {
        text-align: center;
      }

      .footer-link {
        justify-content: center;
      }
    }

    /* Additional Styling for Better Harmony */
    .breadcrumb {
      background: var(--bg-secondary);
      border-radius: 25px;
      padding: 12px 20px;
      border: 1px solid var(--secondary-dark);
    }

    .breadcrumb-item+.breadcrumb-item::before {
      color: var(--text-muted);
    }

    .breadcrumb-item.active {
      color: var(--primary-color);
    }

    .badge {
      font-weight: 600;
      letter-spacing: 0.5px;
      border-radius: 12px;
    }

    .bg-success {
      background: var(--success) !important;
    }

    .bg-danger {
      background: var(--danger) !important;
    }

    .text-muted {
      color: var(--text-muted) !important;
    }

    .lead {
      color: var(--text-secondary);
      font-weight: 400;
      line-height: 1.8;
    }

    .display-4 {
      font-weight: 700;
      color: var(--primary-dark);
      text-shadow: 0 2px 4px var(--shadow-light);
    }

    /* Smooth scrolling and transitions */
    * {
      scroll-behavior: smooth;
    }

    .container {
      transition: all 0.3s ease;
    }

    /* Scroll animations */
    .scroll-fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
    }

    .scroll-fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .scroll-slide-left {
      opacity: 0;
      transform: translateX(-50px);
      transition: all 0.8s ease;
    }

    .scroll-slide-left.visible {
      opacity: 1;
      transform: translateX(0);
    }

    .scroll-slide-right {
      opacity: 0;
      transform: translateX(50px);
      transition: all 0.8s ease;
    }

    .scroll-slide-right.visible {
      opacity: 1;
      transform: translateX(0);
    }

    .scroll-scale-up {
      opacity: 0;
      transform: scale(0.8);
      transition: all 0.8s ease;
    }

    .scroll-scale-up.visible {
      opacity: 1;
      transform: scale(1);
    }

    /* Parallax effect for hero section */
    .parallax-bg {
      transition: transform 0.1s ease-out;
    }

    /* Stagger animation delays */
    .scroll-delay-1 {
      transition-delay: 0.1s;
    }

    .scroll-delay-2 {
      transition-delay: 0.2s;
    }

    .scroll-delay-3 {
      transition-delay: 0.3s;
    }

    .scroll-delay-4 {
      transition-delay: 0.4s;
    }

    .scroll-delay-5 {
      transition-delay: 0.5s;
    }

    /* Feature cards styling */
    .feature-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border: 1px solid var(--secondary-dark);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      background: rgba(255, 255, 255, 0.9);
      transform: translateY(-5px);
    }

    /* Input and form elements */
    .form-control {
      border: 2px solid var(--secondary-dark);
      border-radius: 15px;
      padding: 12px 16px;
      transition: all 0.3s ease;
      background: var(--bg-primary);
    }

    .form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25);
      background: white;
    }
  </style>

  @stack('styles')
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container" style="max-width: 1200px;">
      <a class="navbar-brand logo-font" href="{{ route('dashboard') }}">
        <img src="{{ asset('image/logo.png') }}" alt="TresBelle" height="32" class="me-2">
        TresBelle Bakehouse
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <i class="fas fa-home me-2"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}#menu">
              <i class="fas fa-cookie-bite me-2"></i>
              <span>Menu</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}#about">
              <i class="fas fa-info-circle me-2"></i>
              <span>About</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://maps.google.com/?q=Jl+Ngebel+Gede+no+66b,+Sinduharjo,+Sleman,+Yogyakarta" target="_blank">
              <i class="fas fa-map-marker-alt me-2"></i>
              <span>Location</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-contact-btn" href="https://wa.me/6285759062805?text=Halo%20TresBelle%20Bakehouse!%20Saya%20mau%20tanya,%20apakah%20hari%20ini%20berjualan?%20Saya%20tertarik%20dengan%20menu%20kue-kue%20yang%20tersedia.%20Terima%20kasih!" target="_blank">
              <i class="fab fa-whatsapp me-2"></i>
              <span>Order</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main style="padding-top: 70px;">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer id="footer">
    <div class="container py-4" style="max-width: 1200px;">
      <div class="row g-4 justify-content-center">
        <!-- Brand Section -->
        <div class="col-lg-4 col-md-6">
          <div class="footer-brand mb-4">
            <h3 class="logo-font text-white mb-3">
              <img src="{{ asset('image/logo.png') }}" alt="TresBelle" height="35" class="me-2" style="border-radius: 50%;">
              TresBelle Bakehouse
            </h3>
            <p class="footer-desc">
              Menyajikan kue-kue terbaik dengan cita rasa autentik dan kualitas premium.
              Setiap gigitan adalah perjalanan rasa yang tak terlupakan.
            </p>
          </div>

          <!-- Operating Hours -->
          <div class="operating-hours">
            <h6 class="text-white mb-3">
              <i class="fas fa-clock me-2"></i>
              Jam Operasional
            </h6>
            <div class="hours-list">
              <div class="hour-item d-flex justify-content-between">
                <span>Senin - Rabu</span>
                <span>16:00 - 22:00</span>
              </div>
              <div class="hour-item closed d-flex justify-content-between">
                <span>Kamis</span>
                <span>LIBUR</span>
              </div>
              <div class="hour-item d-flex justify-content-between">
                <span>Jumat - Minggu</span>
                <span>16:00 - 22:00</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-4 col-md-6">
          <h6 class="text-white mb-4">
            <i class="fas fa-map-marker-alt me-2"></i>
            Lokasi & Kontak
          </h6>

          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-store"></i>
              <div>
                <strong>Alamat Toko:</strong>
                <a href="https://maps.google.com/?q=Jl+Ngebel+Gede+no+66b,+Sinduharjo,+Sleman,+Yogyakarta" target="_blank">
                  Jl Ngebel Gede no 66b<br>
                  Sinduharjo, Sleman<br>
                  Yogyakarta
                </a>
                <br>
                <small class="text-muted">
                  <i class="fas fa-external-link-alt me-1"></i>
                  Klik untuk buka di Google Maps
                </small>
              </div>
            </div>

            <div class="contact-item">
              <i class="fas fa-map-marked-alt text-warning"></i>
              <div>
                <strong>Lokasi Booth:</strong>
                <a href="https://maps.google.com/?q=Taman+Denggung+Yogyakarta" target="_blank" class="text-warning">
                  Taman Denggung<br>
                  Yogyakarta
                </a>
                <br>
                <small class="text-muted">
                  <i class="fas fa-external-link-alt me-1"></i>
                  Lokasi booth penjualan kami
                </small>
              </div>
            </div>

            <div class="service-badges mt-4">
              <span class="badge bg-success me-2 mb-2">
                <i class="fas fa-store me-1"></i>
                Open Booth
              </span>
              <span class="badge bg-primary mb-2">
                <i class="fas fa-shopping-cart me-1"></i>
                Online Order
              </span>
            </div>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-4 col-md-12">
          <h6 class="text-white mb-4">
            <i class="fas fa-link me-2"></i>
            Menu Favorit
          </h6>

          <div class="quick-links">
            <a href="{{ route('dashboard') }}#menu" class="footer-link">
              <i class="fas fa-list me-2"></i>
              Semua Menu
            </a>
            <a href="{{ route('dashboard') }}#menu" class="footer-link">
              <i class="fas fa-birthday-cake me-2"></i>
              Kue Ulang Tahun
            </a>
            <a href="{{ route('dashboard') }}#menu" class="footer-link">
              <i class="fas fa-heart me-2"></i>
              Kue Wedding
            </a>
            <a href="{{ route('dashboard') }}#menu" class="footer-link">
              <i class="fas fa-cookie me-2"></i>
              Cookies & Snacks
            </a>
          </div>

          <!-- CTA Button -->
          <div class="footer-cta mt-4">
            <a href="https://wa.me/6285759062805?text=Halo%20TresBelle%20Bakehouse!%20Saya%20mau%20tanya,%20apakah%20hari%20ini%20berjualan?%20Saya%20tertarik%20dengan%20menu%20kue-kue%20yang%20tersedia.%20Terima%20kasih!" target="_blank" class="btn btn-whatsapp w-100">
              <i class="fab fa-whatsapp me-2"></i>
              Pesan Sekarang via WhatsApp
            </a>
          </div>
        </div>
      </div>

      <!-- Divider -->
      <hr class="footer-divider my-4">

      <!-- Bottom Footer -->
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="footer-copyright mb-0">
            &copy; {{ date('Y') }} TresBelle Bakehouse.
            <span class="text-accent">Dibuat dengan ❤️ untuk pecinta kue</span>
          </p>
        </div>
        <div class="col-md-6 text-md-end">
          <div class="social-links">
            <a href="https://wa.me/6285759062805?text=Halo%20TresBelle%20Bakehouse!%20Saya%20mau%20tanya,%20apakah%20hari%20ini%20berjualan?%20Saya%20tertarik%20dengan%20menu%20kue-kue%20yang%20tersedia.%20Terima%20kasih!" target="_blank" class="social-link">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.instagram.com/tresbelle.bakehouse?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="social-link">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="social-link">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.tiktok.com/@tresbelle.bakehouse" target="_blank" class="social-link">
              <i class="fab fa-tiktok"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Navbar Scroll Effect -->
  <script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

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

    // Add active class to current nav item
    const currentLocation = location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
      if (link.getAttribute('href') === currentLocation) {
        link.classList.add('active');
      }
    });

    // Scroll animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, observerOptions);

    // Observe elements with scroll animation classes
    document.addEventListener('DOMContentLoaded', function() {
      const animatedElements = document.querySelectorAll(
        '.scroll-fade-in, .scroll-slide-left, .scroll-slide-right, .scroll-scale-up'
      );

      animatedElements.forEach(element => {
        observer.observe(element);
      });
    });

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const parallaxElements = document.querySelectorAll('.parallax-bg');

      parallaxElements.forEach(element => {
        const speed = 0.5;
        element.style.transform = `translateY(${scrolled * speed}px)`;
      });
    });

    // Card hover effects on scroll (only in main content)
    window.addEventListener('scroll', function() {
      const cards = document.querySelectorAll('main .card');
      const scrollPosition = window.pageYOffset;

      cards.forEach((card, index) => {
        const cardTop = card.offsetTop;
        const cardHeight = card.offsetHeight;
        const windowHeight = window.innerHeight;

        if (scrollPosition > cardTop - windowHeight + cardHeight / 2) {
          card.style.transform = `translateY(-${Math.min(10, (scrollPosition - cardTop + windowHeight) * 0.02)}px)`;
        }
      });
    });

    // Smooth reveal animation for sections (excluding footer)
    const revealSections = function() {
      const sections = document.querySelectorAll('section, .hero-section');

      sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        const sectionVisible = 150;

        if (sectionTop < window.innerHeight - sectionVisible) {
          section.classList.add('visible');
        }
      });
    };

    window.addEventListener('scroll', revealSections);
    window.addEventListener('load', revealSections);

    // Add bounce effect to main content buttons on scroll (excluding footer buttons)
    window.addEventListener('scroll', function() {
      const buttons = document.querySelectorAll('main .btn-primary, main .btn-outline-primary');
      const scrollY = window.pageYOffset;

      buttons.forEach(button => {
        const buttonTop = button.getBoundingClientRect().top + scrollY;
        const windowHeight = window.innerHeight;

        if (scrollY > buttonTop - windowHeight + 100) {
          button.style.animation = 'subtle-bounce 2s ease-in-out infinite';
        }
      });
    });

    // Add CSS for bounce animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes subtle-bounce {
        0%, 20%, 50%, 80%, 100% {
          transform: translateY(0);
        }
        40% {
          transform: translateY(-3px);
        }
        60% {
          transform: translateY(-1px);
        }
      }
      
      .visible {
        animation: fadeInUp 0.8s ease forwards;
      }
      
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    `;
    document.head.appendChild(style);
  </script>

  @stack('scripts')
</body>

</html>