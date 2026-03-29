const PRODUCTS = [

    { category: "Plates", title: "Broad Plate DCP", description: "Dynamic Compression Plate berukuran lebar untuk fiksasi tulang besar. Desain DCP memungkinkan kompresi aksial pada fraktur.", img: "assets/images/catalog/Broad Plate DCP.png" },
    { category: "Plates", title: "Broad LC Plate", description: "Low Contact plate lebar dengan area kontak minimal untuk menjaga suplai darah periosteal. Cocok untuk fraktur diafisis.", img: "assets/images/catalog/Broad LC.png" },
    { category: "Plates", title: "Narrow DCP Plate", description: "Dynamic Compression Plate ukuran sempit untuk fiksasi tulang dengan diameter kecil hingga sedang.", img: "assets/images/catalog/Narrow DCP.png" },
    { category: "Plates", title: "Narrow LC Plate", description: "Low Contact Narrow Plate untuk meminimalkan devaskularisasi. Ideal untuk fiksasi fraktur di area sempit.", img: "assets/images/catalog/Narrow LC.png" },
    { category: "Plates", title: "Small Narrow DCP", description: "DCP berukuran kecil dan sempit untuk fiksasi tulang kecil seperti ulna, radius distal, dan fibula.", img: "assets/images/catalog/Small Narrow DCP.png" },
    { category: "Plates", title: "Semi Tubular Plate", description: "Plat semi-silinder tipis dengan profil rendah. Digunakan untuk fiksasi fraktur fibula dan tulang kecil lainnya.", img: "assets/images/catalog/Semi Tubular.png" },
    { category: "Plates", title: "One-Third Tubular Plate", description: "Plat tipis berbentuk 1/3 tabung. Ideal untuk fraktur maleolus lateral dan tulang-tulang kecil.", img: "assets/images/catalog/Onethird Tubular.png" },
    { category: "Plates", title: "Clover Leaf Plate", description: "Plat berbentuk daun semanggi untuk fiksasi fraktur kondilus tibial. Memberikan stabilitas multi-arah.", img: "assets/images/catalog/Clover Leaf.png" },
    { category: "Plates", title: "T Plate", description: "Plat berbentuk T untuk fiksasi fraktur di persendian seperti tibia proksimal dan radius distal.", img: "assets/images/catalog/T Plate.png" },
    { category: "Plates", title: "Small T Plate Head 3", description: "T Plate kecil dengan kepala 3 lubang untuk fiksasi fraktur radius distal dan tulang-tulang kecil.", img: "assets/images/catalog/Small T H3.png" },
    { category: "Plates", title: "T Buttress Plate", description: "Buttress plate berbentuk T untuk menahan tekanan aksial pada fraktur metafisis.", img: "assets/images/catalog/T Buttress.png" },
    { category: "Plates", title: "L Buttress Plate", description: "Buttress plate berbentuk L untuk fiksasi fraktur kondilus dan area metafisis.", img: "assets/images/catalog/L Buttress.png" },
    { category: "Plates", title: "Condylar Buttress Plate", description: "Plat khusus untuk fiksasi fraktur kondilus femur dan tibia. Memberikan dukungan lateral yang optimal.", img: "assets/images/catalog/Condylar Buttress.png" },
    { category: "Plates", title: "Lateral Tibia Buttress", description: "Buttress plate lateral untuk tibia, digunakan pada fraktur plateau tibial lateral.", img: "assets/images/catalog/Lateral Tibia Buttress.png" },
    { category: "Plates", title: "Distal Femoral Plate", description: "Plat khusus untuk fiksasi fraktur femur distal. Desain anatomis mengikuti kontur tulang.", img: "assets/images/catalog/Distal Femoral.png" },
    { category: "Plates", title: "Proximal Humeral Plate", description: "Plat anatomis untuk fiksasi fraktur humerus proksimal dengan desain locking untuk stabilitas sudut.", img: "assets/images/catalog/Prox Humeral.png" },
    { category: "Plates", title: "Proximal Lateral Femoral Plate", description: "Plat lateral femur proksimal untuk fiksasi fraktur subtrokanter dan intertrokanter.", img: "assets/images/catalog/Prox Lateral Femoral Plate.png" },
    { category: "Plates", title: "Proximal Lateral Tibia Golf", description: "Plat tibia lateral proksimal dengan desain golf untuk fiksasi fraktur plateau tibial.", img: "assets/images/catalog/Prox Lateral Tibia Golf.png" },
    { category: "Plates", title: "Clavicula S Plate", description: "Plat berbentuk S anatomis untuk fiksasi fraktur klavikula. Tersedia versi kanan dan kiri.", img: "assets/images/catalog/Clavicula S Plate.png" },
    { category: "Plates", title: "Clavicle Hook Plate", description: "Plat dengan kait untuk fiksasi dislokasi akromioklavikular (AC joint separation).", img: "assets/images/catalog/Clav Hook Plate.png" },
    { category: "Plates", title: "Clavicle Z Plate", description: "Plat Z untuk fiksasi fraktur klavikula dengan profil rendah dan desain anatomis.", img: "assets/images/catalog/Clav Z Plate.png" },
    { category: "Plates", title: "Rib Hook Plate", description: "Plat dengan kait untuk fiksasi fraktur tulang iga. Desain khusus mengikuti kontur rusuk.", img: "assets/images/catalog/Rib Hook Plate.png" },
    { category: "Plates", title: "3.5 Distal Tibial Plate", description: "Plat 3.5mm untuk fiksasi fraktur tibia distal. Profil rendah untuk kenyamanan pasien.", img: "assets/images/catalog/3_5 Distal Tibial.png" },
    { category: "Plates", title: "3.5 Olecranon Hook Plate", description: "Plat dengan kait olekranon ukuran 3.5mm. Ideal untuk fiksasi fraktur olekranon.", img: "assets/images/catalog/3_5 Olecranon Hook.png" },
    { category: "Plates", title: "Small A Plate", description: "Plat kecil tipe A untuk fiksasi fraktur tulang-tulang kecil tangan dan kaki.", img: "assets/images/catalog/Small A.png" },
    { category: "Plates", title: "Small B Plate", description: "Plat kecil tipe B dengan konfigurasi berbeda untuk fiksasi fraktur tulang-tulang kecil.", img: "assets/images/catalog/Small B.png" },
    { category: "Plates", title: "Trochanter Ear Plate", description: "Plat penahan trokanter dengan desain telinga untuk fiksasi fraktur trokanter femur.", img: "assets/images/catalog/Trochanter Ear.png" },
    { category: "Plates", title: "Trochanter Straight Plate", description: "Plat trokanter lurus untuk fiksasi fraktur trokanter mayor femur.", img: "assets/images/catalog/Trochanter Straight.png" },


    { category: "Reconstruction Plates", title: "3.5 Reconstruction Curved", description: "Plat rekonstruksi 3.5mm yang dapat dibentuk ke berbagai sudut, ideal untuk fiksasi fraktur kompleks.", img: "assets/images/catalog/3_5 Recons Curved.png" },
    { category: "Reconstruction Plates", title: "3.5 Reconstruction Straight", description: "Plat rekonstruksi 3.5mm lurus yang fleksibel untuk konturing pada fraktur periartikular.", img: "assets/images/catalog/3_5 Recons Straight.png" },
    { category: "Reconstruction Plates", title: "4.5 Reconstruction Curved", description: "Plat rekonstruksi 4.5mm melengkung untuk fiksasi fraktur tulang besar yang kompleks.", img: "assets/images/catalog/4_5 Recons Curved.png" },
    { category: "Reconstruction Plates", title: "4.5 Reconstruction Straight", description: "Plat rekonstruksi 4.5mm lurus yang kuat untuk fiksasi fraktur pada tulang besar.", img: "assets/images/catalog/4_5 Recons Straight.png" },
    { category: "Reconstruction Plates", title: "Y Reconstruction Plate", description: "Plat rekonstruksi berbentuk Y untuk fiksasi fraktur di area persimpangan kompleks.", img: "assets/images/catalog/Y Reconst.png" },


    { category: "Cortical Screws", title: "3.5mm Cortical Screw", description: "Sekrup kortikal 3.5mm berulir penuh untuk fiksasi tulang. Kepala sferis dengan soket hexagonal kecil.", img: "assets/images/catalog/3_5 Cortical Screw.png" },
    { category: "Cortical Screws", title: "3.5mm Cortical Screw ST", description: "Sekrup kortikal 3.5mm self-tapping dengan alur pemotong. Memudahkan pemasangan tanpa pre-tapping.", img: "assets/images/catalog/3_5 Cortical ST.png" },
    { category: "Cortical Screws", title: "4.5mm Cortical Screw", description: "Sekrup kortikal 4.5mm untuk tulang besar. Desain berulir penuh dengan kepala hexagonal.", img: "assets/images/catalog/4_5 Cortical Screw.png" },
    { category: "Cortical Screws", title: "4.5mm Cortical Screw ST", description: "Sekrup kortikal 4.5mm self-tapping. Ideal untuk fiksasi fraktur pada tulang kortikal tebal.", img: "assets/images/catalog/4_5 Cortical ST.png" },


    { category: "Cancellous Screws", title: "3.5mm Cancellous Screw Full Thread", description: "Sekrup kanselus 3.5mm berulir penuh untuk fiksasi fragmen tulang spons kecil.", img: "assets/images/catalog/35 Cancellous Full.png" },
    { category: "Cancellous Screws", title: "4.0mm Cancellous Screw Full Thread", description: "Sekrup kanselus 4.0mm berulir penuh. Digunakan untuk fiksasi tulang kanselus dengan kompresi optimal.", img: "assets/images/catalog/4_0 Cancellous Full.png" },
    { category: "Cancellous Screws", title: "6.5mm Cancellous Screw Full Thread", description: "Sekrup kanselus besar 6.5mm berulir penuh untuk fiksasi fraktur femoral neck dan tulang besar.", img: "assets/images/catalog/6_5 Cancellous Full.png" },
    { category: "Cancellous Screws", title: "6.5mm Cancellous Screw 16mm Thread", description: "Sekrup kanselus 6.5mm dengan ulir 16mm (1/4 thread). Menghasilkan efek lag screw yang kuat.", img: "assets/images/catalog/6_5 Cancellous 16 Th.png" },
    { category: "Cancellous Screws", title: "6.5mm Cancellous Screw 32mm Thread", description: "Sekrup kanselus 6.5mm dengan ulir 32mm (1/2 thread). Digunakan untuk kompresi fraktur tulang besar.", img: "assets/images/catalog/6_5 Cancellous 32 Th.png" },


    { category: "Pins", title: "K-Wire Trocar", description: "Kirschner wire dengan ujung trocar untuk traksi, fiksasi sementara, dan guide wire pada operasi ortopedi.", img: "assets/images/catalog/K Wire Tocar.png" },
    { category: "Pins", title: "Schanz Screw", description: "Sekrup Schanz untuk fiksasi eksternal. Berulir kortikal dengan alur self-tapping. Tersedia diameter 3–6mm.", img: "assets/images/catalog/Schanz Screw.png" },
];

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
