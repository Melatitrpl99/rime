<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\PaymentMethod;
use App\Models\PostCategory;
use App\Models\ProductCategory;
use App\Models\ReportCategory;
use App\Models\Size;
use App\Models\SpendingCategory;
use App\Models\SpendingUnit;
use App\Models\Status;
use App\Models\VerificationStatus;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::insert([
            ['name' => 'belum order', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sedang diproses', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sedang dikemas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'dalam pengiriman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'selesai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ditunda', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'dibatalkan', 'created_at' => now(), 'updated_at' => now()]
        ]);

        VerificationStatus::insert([
            ['name' => 'Sedang memenuhi persyaratan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Melakukan verifikasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selesai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gagal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Batal', 'created_at' => now(), 'updated_at' => now()],
        ]);

        PaymentMethod::insert([
            ['name' => 'transfer', 'ket' => "<p>Terima kasih telah mengorder di Rime Syar'i.</p><p>&nbsp;</p><p>Silahkan melakukan pembayaran sebelum tanggal <strong>::tgl_expire</strong> sebesar ::total_order dengan melampirkan <strong>bukti transfer</strong>. Anda dapat membayar order dengan mentransfer ke salah satu rekening bank dibawah ini:</p><ol><li>73528808090 BANK SYARIAH INDONESIA A.N. Melati</li><li>01004977132540 BANK BRI A.N. Melati</li></ol><p>&nbsp;</p><p>Masukkan keterangan / berita dengan <strong>::no_order</strong></p><p>&nbsp;</p><p>Upload bukti transfer anda dalam halaman detail order pada aplikasi.</p>", 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'COD', 'ket' => "<p>Terima kasih telah mengorder di Rime Syar'i.</p><p>&nbsp;</p><p>Silahkan melakukan kepada kurir pada saat menerima produk anda.</p>", 'created_at' => now(), 'updated_at' => now()],
        ]);

        Size::insert([
            ['name' => 'xxxl', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'xxl', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'xl', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'l', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 's', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'xs', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '140cm x 140cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '135cm x 135cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '125cm x 125cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '120cm x 120cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '110cm x 110cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '100cm x 100cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '95cm x 95cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '90cm x 90cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '80cm x 80cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '75cm x 75cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '70cm x 70cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'dewasa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'anak-anak', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Color::factory(15)->create();
        ProductCategory::factory(5)->create();
        PostCategory::factory(5)->create();

        SpendingCategory::insert([
            ['name' => 'restok bahan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'beli perlengkapan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'beli peralatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'bayar gaji', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'lainnya', 'created_at' => now(), 'updated_at' => now()],
        ]);

        SpendingUnit::insert([
            ['name' => 'm2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'unit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'lusin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'lembar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'g', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'kg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        ReportCategory::insert([
            ['name' => 'Laba rugi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
