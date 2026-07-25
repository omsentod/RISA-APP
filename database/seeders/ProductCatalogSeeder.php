<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [ 'category' => 'Plates', 'name' => 'Broad Plate DCP', 'material' => 'Dynamic Compression Plate berukuran lebar untuk fiksasi tulang besar. Desain DCP memungkinkan kompresi aksial pada fraktur.', 'image_path' => 'catalog/Broad Plate DCP.png' ],
            [ 'category' => 'Plates', 'name' => 'Broad LC Plate', 'material' => 'Low Contact plate lebar dengan area kontak minimal untuk menjaga suplai darah periosteal. Cocok untuk fraktur diafisis.', 'image_path' => 'catalog/Broad LC.png' ],
            [ 'category' => 'Plates', 'name' => 'Narrow DCP Plate', 'material' => 'Dynamic Compression Plate ukuran sempit untuk fiksasi tulang dengan diameter kecil hingga sedang.', 'image_path' => 'catalog/Narrow DCP.png' ],
            [ 'category' => 'Plates', 'name' => 'Narrow LC Plate', 'material' => 'Low Contact Narrow Plate untuk meminimalkan devaskularisasi. Ideal untuk fiksasi fraktur di area sempit.', 'image_path' => 'catalog/Narrow LC.png' ],
            [ 'category' => 'Plates', 'name' => 'Small Narrow DCP', 'material' => 'DCP berukuran kecil dan sempit untuk fiksasi tulang kecil seperti ulna, radius distal, dan fibula.', 'image_path' => 'catalog/Small Narrow DCP.png' ],
            [ 'category' => 'Plates', 'name' => 'Semi Tubular Plate', 'material' => 'Plat semi-silinder tipis dengan profil rendah. Digunakan untuk fiksasi fraktur fibula dan tulang kecil lainnya.', 'image_path' => 'catalog/Semi Tubular.png' ],
            [ 'category' => 'Plates', 'name' => 'One-Third Tubular Plate', 'material' => 'Plat tipis berbentuk 1/3 tabung. Ideal untuk fraktur maleolus lateral dan tulang-tulang kecil.', 'image_path' => 'catalog/Onethird Tubular.png' ],
            [ 'category' => 'Plates', 'name' => 'Clover Leaf Plate', 'material' => 'Plat berbentuk daun semanggi untuk fiksasi fraktur kondilus tibial. Memberikan stabilitas multi-arah.', 'image_path' => 'catalog/Clover Leaf.png' ],
            [ 'category' => 'Plates', 'name' => 'T Plate', 'material' => 'Plat berbentuk T untuk fiksasi fraktur di persendian seperti tibia proksimal dan radius distal.', 'image_path' => 'catalog/T Plate.png' ],
            [ 'category' => 'Plates', 'name' => 'Small T Plate Head 3', 'material' => 'T Plate kecil dengan kepala 3 lubang untuk fiksasi fraktur radius distal dan tulang-tulang kecil.', 'image_path' => 'catalog/Small T H3.png' ],
            [ 'category' => 'Plates', 'name' => 'T Buttress Plate', 'material' => 'Buttress plate berbentuk T untuk menahan tekanan aksial pada fraktur metafisis.', 'image_path' => 'catalog/T Buttress.png' ],
            [ 'category' => 'Plates', 'name' => 'L Buttress Plate', 'material' => 'Buttress plate berbentuk L untuk fiksasi fraktur kondilus dan area metafisis.', 'image_path' => 'catalog/L Buttress.png' ],
            [ 'category' => 'Plates', 'name' => 'Condylar Buttress Plate', 'material' => 'Plat khusus untuk fiksasi fraktur kondilus femur dan tibia. Memberikan dukungan lateral yang optimal.', 'image_path' => 'catalog/Condylar Buttress.png' ],
            [ 'category' => 'Plates', 'name' => 'Lateral Tibia Buttress', 'material' => 'Buttress plate lateral untuk tibia, digunakan pada fraktur plateau tibial lateral.', 'image_path' => 'catalog/Lateral Tibia Buttress.png' ],
            [ 'category' => 'Plates', 'name' => 'Distal Femoral Plate', 'material' => 'Plat khusus untuk fiksasi fraktur femur distal. Desain anatomis mengikuti kontur tulang.', 'image_path' => 'catalog/Distal Femoral.png' ],
            [ 'category' => 'Plates', 'name' => 'Proximal Humeral Plate', 'material' => 'Plat anatomis untuk fiksasi fraktur humerus proksimal dengan desain locking untuk stabilitas sudut.', 'image_path' => 'catalog/Prox Humeral.png' ],
            [ 'category' => 'Plates', 'name' => 'Proximal Lateral Femoral Plate', 'material' => 'Plat lateral femur proksimal untuk fiksasi fraktur subtrokanter dan intertrokanter.', 'image_path' => 'catalog/Prox Lateral Femoral Plate.png' ],
            [ 'category' => 'Plates', 'name' => 'Proximal Lateral Tibia Golf', 'material' => 'Plat tibia lateral proksimal dengan desain golf untuk fiksasi fraktur plateau tibial.', 'image_path' => 'catalog/Prox Lateral Tibia Golf.png' ],
            [ 'category' => 'Plates', 'name' => 'Clavicula S Plate', 'material' => 'Plat berbentuk S anatomis untuk fiksasi fraktur klavikula. Tersedia versi kanan dan kiri.', 'image_path' => 'catalog/Clavicula S Plate.png' ],
            [ 'category' => 'Plates', 'name' => 'Clavicle Hook Plate', 'material' => 'Plat dengan kait untuk fiksasi dislokasi akromioklavikular (AC joint separation).', 'image_path' => 'catalog/Clav Hook Plate.png' ],
            [ 'category' => 'Plates', 'name' => 'Clavicle Z Plate', 'material' => 'Plat Z untuk fiksasi fraktur klavikula dengan profil rendah dan desain anatomis.', 'image_path' => 'catalog/Clav Z Plate.png' ],
            [ 'category' => 'Plates', 'name' => 'Rib Hook Plate', 'material' => 'Plat dengan kait untuk fiksasi fraktur tulang iga. Desain khusus mengikuti kontur rusuk.', 'image_path' => 'catalog/Rib Hook Plate.png' ],
            [ 'category' => 'Plates', 'name' => '3.5 Distal Tibial Plate', 'material' => 'Plat 3.5mm untuk fiksasi fraktur tibia distal. Profil rendah untuk kenyamanan pasien.', 'image_path' => 'catalog/3_5 Distal Tibial.png' ],
            [ 'category' => 'Plates', 'name' => '3.5 Olecranon Hook Plate', 'material' => 'Plat dengan kait olekranon ukuran 3.5mm. Ideal untuk fiksasi fraktur olekranon.', 'image_path' => 'catalog/3_5 Olecranon Hook.png' ],
            [ 'category' => 'Plates', 'name' => 'Small A Plate', 'material' => 'Plat kecil tipe A untuk fiksasi fraktur tulang-tulang kecil tangan dan kaki.', 'image_path' => 'catalog/Small A.png' ],
            [ 'category' => 'Plates', 'name' => 'Small B Plate', 'material' => 'Plat kecil tipe B dengan konfigurasi berbeda untuk fiksasi fraktur tulang-tulang kecil.', 'image_path' => 'catalog/Small B.png' ],
            [ 'category' => 'Plates', 'name' => 'Trochanter Ear Plate', 'material' => 'Plat penahan trokanter dengan desain telinga untuk fiksasi fraktur trokanter femur.', 'image_path' => 'catalog/Trochanter Ear.png' ],
            [ 'category' => 'Plates', 'name' => 'Trochanter Straight Plate', 'material' => 'Plat trokanter lurus untuk fiksasi fraktur trokanter mayor femur.', 'image_path' => 'catalog/Trochanter Straight.png' ],

            [ 'category' => 'Reconstruction Plates', 'name' => '3.5 Reconstruction Curved', 'material' => 'Plat rekonstruksi 3.5mm yang dapat dibentuk ke berbagai sudut, ideal untuk fiksasi fraktur kompleks.', 'image_path' => 'catalog/3_5 Recons Curved.png' ],
            [ 'category' => 'Reconstruction Plates', 'name' => '3.5 Reconstruction Straight', 'material' => 'Plat rekonstruksi 3.5mm lurus yang fleksibel untuk konturing pada fraktur periartikular.', 'image_path' => 'catalog/3_5 Recons Straight.png' ],
            [ 'category' => 'Reconstruction Plates', 'name' => '4.5 Reconstruction Curved', 'material' => 'Plat rekonstruksi 4.5mm melengkung untuk fiksasi fraktur tulang besar yang kompleks.', 'image_path' => 'catalog/4_5 Recons Curved.png' ],
            [ 'category' => 'Reconstruction Plates', 'name' => '4.5 Reconstruction Straight', 'material' => 'Plat rekonstruksi 4.5mm lurus yang kuat untuk fiksasi fraktur pada tulang besar.', 'image_path' => 'catalog/4_5 Recons Straight.png' ],
            [ 'category' => 'Reconstruction Plates', 'name' => 'Y Reconstruction Plate', 'material' => 'Plat rekonstruksi berbentuk Y untuk fiksasi fraktur di area persimpangan kompleks.', 'image_path' => 'catalog/Y Reconst.png' ],

            [ 'category' => 'Cortical Screws', 'name' => '3.5mm Cortical Screw', 'material' => 'Sekrup kortikal 3.5mm berulir penuh untuk fiksasi tulang. Kepala sferis dengan soket hexagonal kecil.', 'image_path' => 'catalog/3_5 Cortical Screw.png' ],
            [ 'category' => 'Cortical Screws', 'name' => '3.5mm Cortical Screw ST', 'material' => 'Sekrup kortikal 3.5mm self-tapping dengan alur pemotong. Memudahkan pemasangan tanpa pre-tapping.', 'image_path' => 'catalog/3_5 Cortical ST.png' ],
            [ 'category' => 'Cortical Screws', 'name' => '4.5mm Cortical Screw', 'material' => 'Sekrup kortikal 4.5mm untuk tulang besar. Desain berulir penuh dengan kepala hexagonal.', 'image_path' => 'catalog/4_5 Cortical Screw.png' ],
            [ 'category' => 'Cortical Screws', 'name' => '4.5mm Cortical Screw ST', 'material' => 'Sekrup kortikal 4.5mm self-tapping. Ideal untuk fiksasi fraktur pada tulang kortikal tebal.', 'image_path' => 'catalog/4_5 Cortical ST.png' ],

            [ 'category' => 'Cancellous Screws', 'name' => '3.5mm Cancellous Screw Full Thread', 'material' => 'Sekrup kanselus 3.5mm berulir penuh untuk fiksasi fragmen tulang spons kecil.', 'image_path' => 'catalog/35 Cancellous Full.png' ],
            [ 'category' => 'Cancellous Screws', 'name' => '4.0mm Cancellous Screw Full Thread', 'material' => 'Sekrup kanselus 4.0mm berulir penuh. Digunakan untuk fiksasi tulang kanselus dengan kompresi optimal.', 'image_path' => 'catalog/4_0 Cancellous Full.png' ],
            [ 'category' => 'Cancellous Screws', 'name' => '6.5mm Cancellous Screw Full Thread', 'material' => 'Sekrup kanselus besar 6.5mm berulir penuh untuk fiksasi fraktur femoral neck dan tulang besar.', 'image_path' => 'catalog/6_5 Cancellous Full.png' ],
            [ 'category' => 'Cancellous Screws', 'name' => '6.5mm Cancellous Screw 16mm Thread', 'material' => 'Sekrup kanselus 6.5mm dengan ulir 16mm (1/4 thread). Menghasilkan efek lag screw yang kuat.', 'image_path' => 'catalog/6_5 Cancellous 16 Th.png' ],
            [ 'category' => 'Cancellous Screws', 'name' => '6.5mm Cancellous Screw 32mm Thread', 'material' => 'Sekrup kanselus 6.5mm dengan ulir 32mm (1/2 thread). Digunakan untuk kompresi fraktur tulang besar.', 'image_path' => 'catalog/6_5 Cancellous 32 Th.png' ],

            [ 'category' => 'Pins', 'name' => 'K-Wire Trocar', 'material' => 'Kirschner wire dengan ujung trocar untuk traksi, fiksasi sementara, dan guide wire pada operasi ortopedi.', 'image_path' => 'catalog/K Wire Tocar.png' ],
            [ 'category' => 'Pins', 'name' => 'Schanz Screw', 'material' => 'Sekrup Schanz untuk fiksasi eksternal. Berulir kortikal dengan alur self-tapping. Tersedia diameter 3–6mm.', 'image_path' => 'catalog/Schanz Screw.png' ]
        ];

        // Kosongkan tabel produk agar tidak ganda saat dijalankan ulang
        Product::truncate();

        DB::beginTransaction();
        try {
            $index = 1;
            foreach ($products as $p) {
                Product::create([
                    'name' => $p['name'],
                    'category' => $p['category'],
                    'material' => $p['material'], // Menyimpan deskripsi sementara ke field material
                    'image_path' => $p['image_path'],
                    'sort_order' => $index++
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
