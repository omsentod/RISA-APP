<?php

namespace Database\Seeders;

use App\Models\CompanyEvent;
use App\Models\Facility;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\TimelineEvent;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate tables to prevent duplicates
        SiteSetting::truncate();
        Product::truncate();
        TimelineEvent::truncate();
        Facility::truncate();
        CompanyEvent::truncate();

        // 1. Site Settings
        SiteSetting::create(['key' => 'hero_title_1', 'type' => 'text', 'value' => 'RISA']);
        SiteSetting::create(['key' => 'hero_title_2', 'type' => 'text', 'value' => 'IMPLANTAMA']);
        SiteSetting::create(['key' => 'hero_desc', 'type' => 'text', 'value' => 'Established in 1993 with the vision and mission of fulfilling and developing domestic orthopedic implants and developing the nation\'s own potential to be able to compete competitively with foreign implant products.']);

        // Copy images to storage
        if (!file_exists(storage_path('app/public/products'))) {
            mkdir(storage_path('app/public/products'), 0777, true);
        }
        $mapping = [
            'Small A.png' => 'Small_A.png',
            'Prox Humeral.png' => 'Prox_Humeral.png',
            'Distal Femoral.png' => 'Distal_Femoral.png',
            'Schanz Screw.png' => 'Schanz_Screw.png',
            'Condylar Buttress.png' => 'Condylar_Buttress.png',
        ];
        foreach ($mapping as $src => $dest) {
            $sourcePath = public_path('assets/images/catalog/' . $src);
            $destPath = storage_path('app/public/products/' . $dest);
            if (file_exists($sourcePath)) {
                copy($sourcePath, $destPath);
            }
        }

        // 2. Products
        $products = [
            ['name' => 'Arthoscopy', 'category' => 'Fixation Systems', 'material' => 'Ti-6Al-4V Titanium', 'image_path' => 'products/Small_A.png', 'sort_order' => 1],
            ['name' => 'Arthoplasty(Elbow & Shoulder)', 'category' => 'Fastening Solutions', 'material' => 'Medical Grade Titanium', 'image_path' => 'products/Prox_Humeral.png', 'sort_order' => 2],
            ['name' => 'Traumatology Implants', 'category' => 'Emergency Solutions', 'material' => 'Titanium Alloy', 'image_path' => 'products/Distal_Femoral.png', 'sort_order' => 3],
            ['name' => 'External Fixator', 'category' => 'Advanced Fixation', 'material' => 'Ti-6Al-4V Titanium', 'image_path' => 'products/Schanz_Screw.png', 'sort_order' => 4],
            ['name' => 'Instruments & Container', 'category' => 'Advanced Fixation', 'material' => 'Ti-6Al-4V Titanium', 'image_path' => 'products/Condylar_Buttress.png', 'sort_order' => 5],
        ];
        foreach ($products as $p) {
            Product::create($p);
        }

        // 3. Timeline Events
        $timeline = [
            ['year' => 1993, 'title' => 'Histopathology Test', 'description' => 'Microscopic tissue analysis confirming zero inflammatory response & safe bone integration.', 'sort_order' => 1],
            ['year' => 2000, 'title' => 'Physical Test', 'description' => 'Tensile strength, fatigue & load-bearing tests engineered to outlast a lifetime of surgical use.', 'sort_order' => 2],
            ['year' => 2008, 'title' => 'Chemical Test', 'description' => 'Spectrometric purity check ensuring Ti-6Al-4V stays corrosion-free for life inside the body.', 'sort_order' => 3],
            ['year' => 2015, 'title' => 'In Vivo Clinical Test', 'description' => 'Real-world surgical trials validating OSFIX osseointegration in certified hospital settings.', 'sort_order' => 4],
            ['year' => 2020, 'title' => 'In Vitro Clinical Test', 'description' => 'Cell-culture studies proving zero cytotoxic reactions prior to any human application.', 'sort_order' => 5],
            ['year' => 2026, 'title' => 'TKDN Certification', 'description' => 'High local-content certification — powering Indonesia\'s medical device independence.', 'sort_order' => 6],
        ];
        foreach ($timeline as $t) {
            TimelineEvent::create($t);
        }

        // 4. Facilities
        $facilities = [
            ['name' => 'CNC Production Floor', 'description' => 'Multi-axis CNC machines crafting Ti-6Al-4V implants with ±0.001mm precision', 'sort_order' => 1],
            ['name' => 'Quality Control Lab', 'description' => 'Every implant undergoes 100% dimensional inspection before leaving the facility', 'sort_order' => 2],
            ['name' => 'Surgical Training Workshop', 'description' => 'Hands-on cadaveric & dry-bone workshops empowering orthopedic surgeons with OSFIX systems', 'sort_order' => 3],
            ['name' => 'Supporting Ortho Specialists', 'description' => 'Dedicated clinical support for orthopedic specialists & subspecialists across Indonesia', 'sort_order' => 4],
            ['name' => 'Sterile Assembly Area', 'description' => 'ISO 13485-certified cleanroom assembly ensuring zero contamination on every implant set', 'sort_order' => 5],
            ['name' => 'R&D Innovation Lab', 'description' => 'Continuous product development bridging surgeon feedback with next-generation implant design', 'sort_order' => 6],
        ];
        foreach ($facilities as $f) {
            Facility::create($f);
        }

        // 5. Company Events
        $companyEvents = [
            ['title' => 'Kunjungan Delegasi Medis', 'description' => 'Penyambutan pimpinan instansi kesehatan di kantor pusat Risa Implantama untuk membahas sinergi suplai tulang implan.', 'sort_order' => 1],
            ['title' => 'Audit & Standarisasi Manufaktur', 'description' => 'Tinjauan rutin instrumen pengerjaan mesin presisi tinggi CNC untuk memastikan kualitas ekstraksi Titanium sesuai kaliber ISO.', 'sort_order' => 2],
            ['title' => 'Pameran Alat Kesehatan Nasional', 'description' => 'Ekshibisi rutin peluncuran lini produk Trauma System dan Cortical Screw yang diselenggarakan di ekspo Alkes berskala besar.', 'sort_order' => 3],
        ];
        foreach ($companyEvents as $ce) {
            CompanyEvent::create($ce);
        }
    }
}
