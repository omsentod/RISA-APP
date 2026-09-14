const CATS = ["all", ...new Set(PRODUCTS.map(p => p.category))];
let currentCat = "all";
let searchQ = "";

const grid = document.getElementById("productGrid");
const tabs = document.getElementById("filterTabs");
const empty = document.getElementById("emptyState");
const titleEl = document.getElementById("gridTitle");
const countEl = document.getElementById("resultCount");
const countAll = document.getElementById("countAll");
const lb = document.getElementById("lightbox");

countAll.textContent = PRODUCTS.length;

CATS.filter(c => c !== "all").forEach(cat => {
    const btn = document.createElement("button");
    btn.className = "tab";
    btn.dataset.cat = cat;
    const n = PRODUCTS.filter(p => p.category === cat).length;
    btn.innerHTML = `${cat} <span class="count-badge">${n}</span>`;
    tabs.appendChild(btn);
});

function render() {
    const q = searchQ.toLowerCase();
    const filtered = PRODUCTS.filter(p => {
        const matchCat = currentCat === "all" || p.category === currentCat;
        const matchQ = !q || p.title.toLowerCase().includes(q)
            || p.category.toLowerCase().includes(q)
            || p.description.toLowerCase().includes(q);
        return matchCat && matchQ;
    });

    grid.innerHTML = "";
    empty.classList.toggle("show", filtered.length === 0);
    countEl.textContent = `${filtered.length} produk`;
    titleEl.textContent = currentCat === "all" ? "Semua Produk" : currentCat;

    filtered.forEach((p, i) => {
        const card = document.createElement("div");
        card.className = "product-card";
        card.style.animationDelay = `${i * 35}ms`;
        card.innerHTML = `
      <div class="card-img-wrap">
        <img src="${p.img}" alt="${p.title}" loading="lazy">
        <span class="cat-tag">${p.category}</span>
      </div>
      <div class="card-body">
        <div class="card-title">${p.title}</div>
        <div class="card-desc">${p.description}</div>
        <div class="card-footer">
          <span class="product-meta">OSFIX Orthopedics</span>
          <button class="view-btn">Detail →</button>
        </div>
      </div>`;
        card.addEventListener("click", () => openLightbox(p));
        grid.appendChild(card);
    });
}

function openLightbox(p) {
    // #lbImg is a div — inject the img element into it
    const lbImgDiv = document.getElementById("lbImg");
    lbImgDiv.innerHTML = `<img src="${p.img}" alt="${p.title}" draggable="false" style="width:100%;height:100%;object-fit:cover;">`;
    document.getElementById("lbCat").textContent = p.category;
    document.getElementById("lbTitle").textContent = p.title;
    document.getElementById("lbDesc").textContent = p.description;
    lb.classList.add("open");
    document.body.style.overflow = "hidden";
}

document.getElementById("lbClose").addEventListener("click", () => {
    lb.classList.remove("open");
    document.body.style.overflow = "";
});

lb.addEventListener("click", e => {
    if (e.target === lb) {
        lb.classList.remove("open");
        document.body.style.overflow = "";
    }
});

tabs.addEventListener("click", e => {
    const btn = e.target.closest(".tab");
    if (!btn) return;
    document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
    btn.classList.add("active");
    currentCat = btn.dataset.cat;
    render();
});

document.getElementById("searchInput").addEventListener("input", e => {
    searchQ = e.target.value;
    render();
});

render();
