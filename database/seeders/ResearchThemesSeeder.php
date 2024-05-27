<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name"=>"Teknologi pemuliaan bibit, tanaman, ternak, dan ikan","research_category_id"=>"1"],
            ["name"=>"Teknologi budidaya dan pemanfaatan lahan sub-optional","research_category_id"=>"1"],
            ["name"=>"Pengembangan sumber daya manusia pertanian","research_category_id"=>"1"],
            ["name"=>"Teknologi pascapanen dan rekayasa teknologi pengolahan pangan","research_category_id"=>"1"],
            ["name"=>"Teknologi ketahanan dan kemandirian pangan","research_category_id"=>"1"],
            ["name"=>"Teknologi substitusi bahan bakar","research_category_id"=>"2"],
            ["name"=>"Kemandirian teknologi pembangkit listrik","research_category_id"=>"2"],
            ["name"=>"Teknologi konservasi energi","research_category_id"=>"2"],
            ["name"=>"Teknologi ketahanan, diversifikasi energi dan penguatan komunitas sosial","research_category_id"=>"2"],
            ["name"=>"Teknologi produk biofarmasetika","research_category_id"=>"3"],
            ["name"=>"Teknologi alat kesehatan dan diagnostik","research_category_id"=>"3"],
            ["name"=>"Teknologi kemandirian bahan baku obat","research_category_id"=>"3"],
            ["name"=>"Pengembangan dan penguatan sistem kelembagaan, kebijakan kesehatan, dan pemberdayaan masyarakat dalam mendukung kemandirian obat","research_category_id"=>"3"],
            ["name"=>"Komodifikasi kearifan lokal di bidang kesehatan untuk menangani permasalahan kesehatan","research_category_id"=>"3"],
            ["name"=>"Teknologi dan manajemen keselamatan transportasi nasional","research_category_id"=>"4"],
            ["name"=>"Teknologi penguatan industri transportasi nasional","research_category_id"=>"4"],
            ["name"=>"Teknologi infrastruktur dan pendukung sistem transportasi","research_category_id"=>"4"],
            ["name"=>"Kajian kebijakan, sosial, dan ekonomi transportasi","research_category_id"=>"4"],
            ["name"=>"Intelligent transportation system","research_category_id"=>"4"],
            ["name"=>"Pengembangan infrastruktur TIK","research_category_id"=>"5"],
            ["name"=>"Pengembangan sistem/platform berbasis Open Source","research_category_id"=>"5"],
            ["name"=>"Teknologi untuk peningkatan konten TIK","research_category_id"=>"5"],
            ["name"=>"Teknologi piranti TIK dan pendukung TIK","research_category_id"=>"5"],
            ["name"=>"Pengembangan sistem berbasis kecerdasan buatan","research_category_id"=>"5"],
            ["name"=>"Teknologi pendukung daya gerak","research_category_id"=>"6"],
            ["name"=>"Teknologi pendukung daya gempur","research_category_id"=>"6"],
            ["name"=>"Teknologi pendukung hankam","research_category_id"=>"6"],
            ["name"=>"Penanganan konflik melalui pendekatan sosial budaya","research_category_id"=>"6"],
            ["name"=>"Teknologi pengolahan mineral strategis berbahan baku lokal","research_category_id"=>"7"],
            ["name"=>"Teknologi pengembangan material fungsional","research_category_id"=>"7"],
            ["name"=>"Teknologi eksplorasi potensi material baru","research_category_id"=>"7"],
            ["name"=>"Teknologi karakterisasi material dan dukungan industri","research_category_id"=>"7"],
            ["name"=>"Teknologi kedaulatan daerah 3T (Terdepan, Terluar, Tertinggal)","research_category_id"=>"8"],
            ["name"=>"Teknologi konservasi lingkungan maritim","research_category_id"=>"8"],
            ["name"=>"Teknologi penguatan infrastruktur maritim","research_category_id"=>"8"],
            ["name"=>"Pemberdayaan dan peningkatan partisipasi perempuan dan inklusi sosial dalam lingkungan kemaritiman","research_category_id"=>"8"],
            ["name"=>"Teknologi dan manajemen bencana geologi","research_category_id"=>"9"],
            ["name"=>"Teknologi dan manajemen bencana hidrometeorologi","research_category_id"=>"9"],
            ["name"=>"Teknologi dan manajemen bencana kebakaran lahan dan hutan","research_category_id"=>"9"],
            ["name"=>"Teknologi dan manajemen bencana alam: gempa bumi, tsunami, banjir bandang, tanah longsor, kekeringan (kemarau), gunung meletus","research_category_id"=>"9"],
            ["name"=>"Mitigasi, perubahan iklim dan tata ekosistem","research_category_id"=>"9"],
            ["name"=>"Teknologi dan manajemen lingkungan","research_category_id"=>"9"],
            ["name"=>"Bencana kegagalan teknologi","research_category_id"=>"9"],
            ["name"=>"Bencana sosial","research_category_id"=>"9"],
            ["name"=>"Mitigasi berkelanjutan terhadap bencana alam","research_category_id"=>"9"],
            ["name"=>"Pembangunan dan penguatan sosial budaya","research_category_id"=>"10"],
            ["name"=>"Sustainable mobility","research_category_id"=>"10"],
            ["name"=>"Penguatan modal sosial","research_category_id"=>"10"],
            ["name"=>"Ekonomi dan sumber daya manusia","research_category_id"=>"10"],
            ["name"=>"Pengarusutamaan gender dalam pembangunan","research_category_id"=>"10"],
            ["name"=>"Seni, identitas, kebudayaan, dan karakter bangsa","research_category_id"=>"10"],
            ["name"=>"Seni","research_category_id"=>"10"],
            ["name"=>"Pendidikan","research_category_id"=>"10"],
            ["name"=>"Kearifan lokal","research_category_id"=>"10"],
            ["name"=>"Pariwisata dan ekonomi kreatif","research_category_id"=>"10"],
        ];

        foreach ($data as $item) {
            DB::table('research_themes')->insert([
                'name' => $item['name'],
                'research_category_id' => $item['research_category_id'],
            ]);
    }
}
}
