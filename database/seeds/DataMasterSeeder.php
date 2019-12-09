<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Poly;
use App\Models\Medicine;
use App\Models\Room;
use App\Models\ListMedicine;
use App\Models\Schedule;

class DataMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::insert([
          ['name' => 'Kepala Puskestren','created_at' => Carbon::now()],
          ['name' => 'Kasubag Kepegawaian','created_at' => Carbon::now()],
          ['name' => 'Kasubag Keuangan','created_at' => Carbon::now()],
          ['name' => 'Kasubag Perencanaan','created_at' => Carbon::now()],
          ['name' => 'Dokter','created_at' => Carbon::now()],
          ['name' => 'Perawat','created_at' => Carbon::now()],
          ['name' => 'Bidan','created_at' => Carbon::now()],
          ['name' => 'Analis','created_at' => Carbon::now()],
          ['name' => 'Apoteker','created_at' => Carbon::now()],
          ['name' => 'Rekam Medis','created_at' => Carbon::now()],
        ]);

        Poly::insert([
          ['name' => 'Umum','created_at' => Carbon::now()],
          ['name' => 'KIA','created_at' => Carbon::now()],
          ['name' => 'Gigi','created_at' => Carbon::now()],
        ]);

        Medicine::insert([
          ['name' => 'Albendazol', 'kegunaan' => 'Membasmi cacing di usus yang hidup sebagi parasit tunggal', 'aturan_pakai' => '1 x1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kalium Permanganat (PK)', 'kegunaan' => 'Membantu penyembuhan luka yang tidak dalam, ulkus tropikum, jamurkaki (kutu air)', 'aturan_pakai' => '2-3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Fradiomycin-gramicidin (FG Troches)', 'kegunaan' => 'Radang tenggorokan', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Flukonazol', 'kegunaan' => 'Mencegah dan menangani infeksi jamur', 'aturan_pakai' => '2 -3 x hari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Erdostein', 'kegunaan' => 'Membantu mengeluarkan dahak kental pada pasien bronchitis', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Efedrin', 'kegunaan' => 'Masalah pernapasan, asma, dan pembengkakan hidung yang disebabkan oleh pilek atau alergi', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Dextrofen Sirup', 'kegunaan' => 'Menghilangkan batuk akibat pilek, alergi, & hidung tersumbat', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Clopidogrel', 'kegunaan' => 'Seranagn jantung, stroke, oprasi pada jantung, penderita penyakit arteri', 'aturan_pakai' => '1 - 2 x Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Citicolin Inj', 'kegunaan' => 'Mencegah degenarasi saraf dan melindungi kerusakan mata, meningkatkan metabolisme diotak', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Cefiksim', 'kegunaan' => 'Mengobati beberapa infeksi bakteri pada : THT, Sistem saluran kemih, Saluran penapasan', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Betahistin Mesilat', 'kegunaan' => 'Menagtasi gejala akibat menrire', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Benzatin Penisillin Inj', 'kegunaan' => 'Mengobati infeksi bakteri', 'aturan_pakai' => '2-3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Basitrasin Salep', 'kegunaan' => 'Mencegah infeksi bakteri pada luka ringan dikulit, mengobati peneumonia pada bayi', 'aturan_pakai' => '1 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Azitromisin', 'kegunaan' => 'Mengobati infeksi bakteri', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Attapulgit Tab', 'kegunaan' => 'Mengatasi diare', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Atenolol', 'kegunaan' => 'Mengobati angina atau angin duduk, gangguan detak jantung dan hipertensi', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Asam Traneksamat', 'kegunaan' => 'Menghentikan Pendarahan, Mimisan, Paska Oprasi, Menstruasi yang berlebihan', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Ambroksol', 'kegunaan' => 'Mengencerkan dahak', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Alprazolam', 'kegunaan' => 'Mengatasi kecemasan panik', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Zinc', 'kegunaan' => 'Mengobati defisiensi zinc', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Vitamin B Kompleks', 'kegunaan' => 'Mengobati kekurangan vitamin B', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ventolin Nebulizer', 'kegunaan' => 'Mengobati penyakit pada saluran pernafasan seperti asma dan penyakit paru obstruktif kronik (PPOK)', 'aturan_pakai' => '3-4 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'vastarel', 'kegunaan' => 'Mengobati angina pectoris', 'aturan_pakai' => '3 x 1Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Triheksifenidil', 'kegunaan' => 'Mengatasi penyakit parkison, Mengobati efek samping extrapyramidal yang tidak di inginkan akibat obat tertentu', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Tramadol', 'kegunaan' => 'Meredakan rasa sakit tingakt sedang hingga berat', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Thiamphenicol', 'kegunaan' => 'Menangani infeksi akibat bakteri', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Thiamin (vitamin B1)', 'kegunaan' => 'Mengatasi kekurangan vitamin B1, perawatan gangguan metabolisme', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Tetrakain', 'kegunaan' => 'Mengatasi infeksi karena bakteri, mengobati jerawat, mengobati rosasea', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Sukralfat', 'kegunaan' => 'Menangani tukak duodenum, menangani gastritis', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Spironolakton', 'kegunaan' => 'Mengatasi edema,mengatasi hipertensi , mengatasi penyakit hati', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Siprofloksasin', 'kegunaan' => 'Mengatasi infeksi akibat bakteri', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Simvastatin', 'kegunaan' => 'Menurunkan kolesterol dalam darah, mengurangi resiko serangan jantung dan strok', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Sianokobalamin (vitamin B12)', 'kegunaan' => 'Mengatasi defisiensi vitamin b12 dan anemia pernisiosa', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Setirizin', 'kegunaan' => 'Meredakan gejala alergi', 'aturan_pakai' => '1 - 2 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Seftriakson', 'kegunaan' => 'Mengoabati dan mencegah akibat bakteri', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Sefadroksil', 'kegunaan' => 'Menagatasi infeksi bakteri akibat bateri : Sistem pernapasan , Tht, Ginjal , Tulang dan sendi dan Saluran Kemih', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Salep 2-4', 'kegunaan' => 'Obat Kulit untuk Kudis, eksim, jerawat dan Jamur', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Salbutamol', 'kegunaan' => 'Meringankan gejala asma', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ranitidin', 'kegunaan' => 'Menurunkan Kadar asam lambung', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Pseduoefedrin Drop', 'kegunaan' => 'Meredakan hidung tersumbat', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Propiltiourasi', 'kegunaan' => 'Hipertiroid', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Propanolol', 'kegunaan' => 'Mencegah aritmia, serangan jantung, migran,meredakan angina Menurunkan tekanan darah serta menangani gejalah menggigil', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Polikresulen', 'kegunaan' => 'Mengentikan pendarahan lokal, mengobati infeksi vagina akibat bakteri dan jamur ', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Piroksikam', 'kegunaan' => 'Meredakan rasa sakit , inflamasi dan demam', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Piridoksin (vitamin B6)', 'kegunaan' => 'Menangani anemia', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Pirantel Pamoat', 'kegunaan' => 'Pengobatan infeksi yang disebabkan oleh parasit-parasit saluran pencernaan', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Piracetam', 'kegunaan' => 'Mengendalikan kelainan kontraksi otot yang terjadi tanpa disadari, disebut nioklonus.', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Permetrin krim 5%', 'kegunaan' => 'Menangani kudus dan kutu kelamin', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Parasetamol', 'kegunaan' => 'Meredakan rasa sakit dan demam', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Paraformaldehid', 'kegunaan' => 'antiperspiran untuk mengobati kaki yang berkeringat atau bau yang berlebihan', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Papaverin', 'kegunaan' => 'Meningkatkan aliran darah', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Oxitetraxiclin Inj', 'kegunaan' => 'Menangani infeksi akibat bakteri , mengatasi jerawat', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ondansetron', 'kegunaan' => 'Mencegah dan mengobati mual dan muntah akibat, keoterapi , radioterapi dan pasaca oprasi', 'aturan_pakai' => '2 - 3 xSehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Omeprazol', 'kegunaan' => 'Mengurangi produksi asam lambung, Mengobati gangguan pencernaan', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Oksitosin', 'kegunaan' => 'Mengatasi pendarahan setelah proses kehamilan', 'aturan_pakai' => 'Sesuai keperluan', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Oksitetrasiklin salep kulit 3 %', 'kegunaan' => 'Menagani infeksi akibat bakteri, mengatasi jerawat', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Obat Batuk Hitam (OBH)', 'kegunaan' => 'Melancarkan dahak', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Norages (Metamizol Na)', 'kegunaan' => 'Meredakan nyeri akut & kronik berat, sakit kepala, penyakit reumatik, sakit gigi, nyeri karena kanker', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa','created_at' => Carbon::now()],
          ['name' => 'Nistatin', 'kegunaan' => 'Mengatasi infeksi jamur', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Nifedipin', 'kegunaan' => 'Hipertensi, Mencegah angina', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Natrium Diklofenak', 'kegunaan' => 'Mengobati peradangan dan rasa sakit', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Natrium Bikarbonat', 'kegunaan' => 'Menetralisasi kadar asam lambung', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Naphazolin tetes mata', 'kegunaan' => 'Meredakan kemerahan, bengkak, dan gatal/mata berair karena pilek, alergi, atau iritasi mata', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'N- asetil sistein', 'kegunaan' => 'Mengencerkan dahak, terapi paru-paru tertentu (cytic fibrosis, emfisema, bronkitis)  akibat over dosis paracetamol', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Mikonazol krim/salep 2 %', 'kegunaan' => 'Mengatasi infeksi jamur pada kulit, mulut, vagina, dan kuku', 'aturan_pakai' => '3 x 2 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metronidazol', 'kegunaan' => 'Pencegahan infeksi setelah operasi, perdangan gigi dan gusi, infeksi ulkus kaki', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metoklopramide', 'kegunaan' => 'Mencegah serta meredakan mual dan muntah', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metokloperamid Injeksi', 'kegunaan' => 'Mencegah serta meredakan mual dan muntah', 'aturan_pakai' => '1 - 2 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metilprednisolon', 'kegunaan' => 'Meredakan inflamasi dan gejala alergi', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metilergometrin Maleat', 'kegunaan' => 'Mengatasi perdarahan setelah melahirkan', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Metildova', 'kegunaan' => 'Mengurangi tekanan darah yang tinggi', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Methamizole / Antrain inj', 'kegunaan' => 'Meredakan rasa sakit , menurunkan demam', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metformin HCl', 'kegunaan' => 'Menurunkan kadar gula darah', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Metampiron (Antalgin)', 'kegunaan' => 'Menghilangkan ras sakit (Analgetik)', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Meloksikam', 'kegunaan' => 'Meredaan gejala-gejala artritis', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Mebendazole', 'kegunaan' => 'Mengobati infeksi yang disebabkan oleh cacing', 'aturan_pakai' => '1 x 1Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Lugol lar', 'kegunaan' => 'Anti Bakteri', 'aturan_pakai' => 'Sesuai Kebutuhan', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Lidokain', 'kegunaan' => 'Pencegahan rasa nyeri', 'aturan_pakai' => 'Sesuai Kebutuhan', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Levofloksasin', 'kegunaan' => 'Mengobati infeksi akibat bakteri : Saluran kemih, Sistem pernapasan, Sinosetis, kulit, prostat', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Levertran', 'kegunaan' => 'luka bakar', 'aturan_pakai' => '2-3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kotrimoksazol', 'kegunaan' => 'Mencegah jenis-jenis infeksi tertentu akibat bakteri', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kodein', 'kegunaan' => 'Mengobati nyeri ringan atau parah', 'aturan_pakai' => '2 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Klorpromazin', 'kegunaan' => 'Mengatasi mual dan muntah pada penyakit yang serius / Mengatasi cegukan', 'aturan_pakai' => '1 x 1Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Klorfeniramina Maleat (CTM)', 'kegunaan' => 'Mengobati Reaksi Alergi', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Klindamisin', 'kegunaan' => 'Mengobatai infeksi yang di sebabkan bakteri', 'aturan_pakai' => '2 - 3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ketorolac', 'kegunaan' => 'Meredakan pembengkakan dan nyeri pasca oprasi mata', 'aturan_pakai' => '1 tetes 4 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ketoprofen', 'kegunaan' => 'Meredahkan rasa nyeri dan peradanngan akibat penyakit rematik', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Ketokonazol krim 2%', 'kegunaan' => 'Mengatasi Infeksi Jamur', 'aturan_pakai' => '2 x 1Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Karbamazepin', 'kegunaan' => 'Mencegah Kejang Epilepsi', 'aturan_pakai' => '2 x 1Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kaptopril', 'kegunaan' => 'Hipertensi', 'aturan_pakai' => '1 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Kanamisin', 'kegunaan' => 'Mengobati infeksi yang disebabkan oleh bakteri gram negatif', 'aturan_pakai' => '3-4 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kalsium Laktat (Kalk)', 'kegunaan' => 'Mencegah Dan Mengobati Defesiensi Kalsium', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Kalamin Lotion', 'kegunaan' => 'Mengobati Rasa Gatal', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Isosorbid Dinitrat', 'kegunaan' => 'Mencega Nyeri Dada', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa ','created_at' => Carbon::now()],
          ['name' => 'Ipratropium bromida', 'kegunaan' => 'Antikolinergik dan Asma', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ichtyol Salep', 'kegunaan' => 'Obat bisul', 'aturan_pakai' => '2-3 x Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Ibuprofen', 'kegunaan' => 'Meredakan Dema Dan Inflamasi', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Hiosina butibromida', 'kegunaan' => 'Meredakan Keram Dan Sakit Perut', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
          ['name' => 'Hiosin butilbromid', 'kegunaan' => 'Meredakan kram dan sakit perut akibat kejang otot pada organ pencernaan', 'aturan_pakai' => '3 x 1 Sehari', 'sasaran' => 'Dewasa dan Anak-anak','created_at' => Carbon::now()],
        ]);

        Room::insert([
          ['name' => 'Ruang Kepala Puskestren','created_at' => Carbon::now()],
          ['name' => 'Ruang Staff','created_at' => Carbon::now()],
          ['name' => 'Ruang Registrasi','created_at' => Carbon::now()],
          ['name' => 'Ruang Tunggu','created_at' => Carbon::now()],
          ['name' => 'Ruang Obat','created_at' => Carbon::now()],
          ['name' => 'Ruang Periksa Umum','created_at' => Carbon::now()],
          ['name' => 'Ruang Periksa Gigi','created_at' => Carbon::now()],
          ['name' => 'Ruang Periksa KIA','created_at' => Carbon::now()],
          ['name' => 'Toilet','created_at' => Carbon::now()],
          ['name' => 'Musholla','created_at' => Carbon::now()],
          ['name' => 'Kantin','created_at' => Carbon::now()],
        ]);

        ListMedicine::insert([
          [ 'medicine_id' => 1, 'price' => 10000, 'date_buy' => '2019-10-10 00:00:00', 'date_expired' => '2021-10-10 00:00:00', 'information' => 'tes', 'stock' => 100, 'status' => 'available', 'created_at' => Carbon::now() ],
        ]);

        Schedule::insert([
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 5, 'poly_id' => 3, 'day' => 'Senin', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 5, 'poly_id' => 3, 'day' => 'Selasa', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 5, 'poly_id' => 3, 'day' => 'Rabu', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 5, 'poly_id' => 3, 'day' => 'Kamis', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 3, 'poly_id' => 1, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 4, 'poly_id' => 2, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
          [ 'user_id' => 5, 'poly_id' => 3, 'day' => 'Jumat', 'time_start' => '07:00:00', 'time_end' => '12:00:00', 'created_at' => Carbon::now() ],
        ]);
    }
}
