<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OSFIX Product Catalog – PT RISA IMPLANTAMA</title>
<meta name="description" content="Katalog lengkap produk OSFIX orthopedic implants oleh PT RISA IMPLANTAMA — plates, screws, pins, dan lebih.">
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('catalog.css') }}">
</head>
<body>

<header class="cat-header">
  <div class="cat-header-inner">
    <div class="cat-header-top">
      <div class="header-brand">
        <img src="{{ asset('assets/images/risa-logo.png') }}" alt="RISA Logo">
        <div>
          <h1>OSFIX Product Catalog</h1>
          <span>PT RISA IMPLANTAMA</span>
        </div>
      </div>
      <div class="search-wrap">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchInput" placeholder="Cari produk...">
      </div>
      <a href="/" class="back-link">← Kembali ke Website</a>
    </div>
    <div class="filter-tabs" id="filterTabs">
      <button class="tab active" data-cat="all">
        Semua <span class="count-badge" id="countAll">0</span>
      </button>
    </div>
  </div>
</header>

<main class="catalog-body">
  <div class="grid-meta">
    <h2 id="gridTitle">Semua Produk</h2>
    <span class="result-count" id="resultCount"></span>
  </div>
  <div class="product-grid" id="productGrid"></div>
  <div class="empty" id="emptyState">
    <h3>Produk tidak ditemukan</h3>
    <p>Coba kata kunci atau kategori lain.</p>
  </div>
</main>

<div class="lightbox" id="lightbox">
  <button class="lb-close" id="lbClose">✕</button>
  <div class="lb-inner">
    <div class="lb-img" id="lbImg"></div>
    <div class="lb-info">
      <div class="lb-cat" id="lbCat"></div>
      <div class="lb-title" id="lbTitle"></div>
      <div class="lb-desc" id="lbDesc"></div>
    </div>
  </div>
</div>

<footer class="cat-footer">
  <a href="{{ route('login') }}" title="Admin Login" style="color: inherit; text-decoration: none; outline: none;">©</a> 2026 PT RISA IMPLANTAMA &nbsp;•&nbsp; Jl. Medokan Sawah Timur No. 41 Surabaya &nbsp;•&nbsp;
  <a href="mailto:risa.implantama@gmail.com">risa.implantama@gmail.com</a>
</footer>

<script src="{{ asset('catalog.js') }}"></script>
</body>
</html>
