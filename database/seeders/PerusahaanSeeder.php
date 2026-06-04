<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerusahaanSeeder extends BaseSeeder
{
    public function run(): void
    {
        $hrdId1 = $this->upsertAndGetId('users', ['email' => 'hrd@techmuda.com'], [
            'name' => 'HRD Tech Muda',
            'email' => 'hrd@techmuda.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $hrdId2 = $this->upsertAndGetId('users', ['email' => 'hrd@digitalnusantara.com'], [
            'name' => 'HRD Digital Nusantara',
            'email' => 'hrd@digitalnusantara.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $idTokopedia = $this->upsertAndGetId('users', ['email' => 'hrd@tokopedia.com'], [
            'name' => 'HRD Tokopedia',
            'email' => 'hrd@tokopedia.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $idLazada = $this->upsertAndGetId('users', ['email' => 'hrd@lazada.com'], [
            'name' => 'HRD Lazada',
            'email' => 'hrd@lazada.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $idBlibli = $this->upsertAndGetId('users', ['email' => 'hrd@blibli.com'], [
            'name' => 'HRD Blibli',
            'email' => 'hrd@blibli.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $idShopee = $this->upsertAndGetId('users', ['email' => 'hrd@shopee.com'], [
            'name' => 'HRD Shopee',
            'email' => 'hrd@shopee.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@techmuda.com'], [
            'user_id' => $hrdId1,
            'nama_perusahaan' => 'PT Tech Muda Indonesia',
            'email' => 'hrd@techmuda.com',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'website' => 'https://techmuda.test',
            'deskripsi' => 'Perusahaan teknologi yang bergerak di bidang pengembangan aplikasi web dan mobile.',
            'logo' => 'foto_perusahaan/logo-Maxipro-1024x1024.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@digitalnusantara.com'], [
            'user_id' => $hrdId2,
            'nama_perusahaan' => 'CV Digital Nusantara',
            'email' => 'hrd@digitalnusantara.com',
            'no_hp' => '082112223333',
            'alamat' => 'Jl. Asia Afrika No. 20, Bandung',
            'website' => 'https://digitalnusantara.test',
            'deskripsi' => 'Perusahaan kreatif digital yang fokus pada desain, branding, dan pemasaran online.',
            'logo' => 'foto_perusahaan/perusahaan_2.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@tokopedia.com'], [
            'user_id' => $idTokopedia,
            'nama_perusahaan' => 'PT Tokopedia',
            'email' => 'hrd@tokopedia.com',
            'no_hp' => '081199887766',
            'alamat' => 'Tokopedia Tower, Jakarta Selatan',
            'website' => 'https://tokopedia.com',
            'deskripsi' => 'Salah satu marketplace terbesar di Indonesia yang mendorong pemerataan ekonomi digital.',
            'logo' => 'images/Tokopedia.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@lazada.com'], [
            'user_id' => $idLazada,
            'nama_perusahaan' => 'PT Lazada Indonesia',
            'email' => 'hrd@lazada.com',
            'no_hp' => '081122334455',
            'alamat' => 'Capital Place Tower, Jakarta',
            'website' => 'https://lazada.co.id',
            'deskripsi' => 'Platform perdagangan digital terkemuka di Asia Tenggara dengan sistem logistik yang kuat.',
            'logo' => 'images/Lazada.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@blibli.com'], [
            'user_id' => $idBlibli,
            'nama_perusahaan' => 'PT Global Digital Niaga (Blibli)',
            'email' => 'hrd@blibli.com',
            'no_hp' => '085566778899',
            'alamat' => 'Jl. Aipda KS Tubun, Jakarta Barat',
            'website' => 'https://blibli.com',
            'deskripsi' => 'Ekosistem perdagangan dan gaya hidup omnichannel terpercaya dengan produk orisinal pilihan.',
            'logo' => 'images/blibli.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@shopee.com'], [
            'user_id' => $idShopee,
            'nama_perusahaan' => 'PT Shopee International Indonesia',
            'email' => 'hrd@shopee.com',
            'no_hp' => '087788990011',
            'alamat' => 'Pacific Century Place, SCBD Jakarta',
            'website' => 'https://shopee.co.id',
            'deskripsi' => 'Platform e-commerce populer di Asia Tenggara yang menawarkan pengalaman belanja mudah dan interaktif.',
            'logo' => 'images/shopee.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}