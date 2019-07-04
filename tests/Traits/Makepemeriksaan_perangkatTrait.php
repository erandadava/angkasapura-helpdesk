<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\pemeriksaan_perangkat;
use App\Repositories\pemeriksaan_perangkatRepository;

trait Makepemeriksaan_perangkatTrait
{
    /**
     * Create fake instance of pemeriksaan_perangkat and save it in database
     *
     * @param array $pemeriksaanPerangkatFields
     * @return pemeriksaan_perangkat
     */
    public function makepemeriksaan_perangkat($pemeriksaanPerangkatFields = [])
    {
        /** @var pemeriksaan_perangkatRepository $pemeriksaanPerangkatRepo */
        $pemeriksaanPerangkatRepo = \App::make(pemeriksaan_perangkatRepository::class);
        $theme = $this->fakepemeriksaan_perangkatData($pemeriksaanPerangkatFields);
        return $pemeriksaanPerangkatRepo->create($theme);
    }

    /**
     * Get fake instance of pemeriksaan_perangkat
     *
     * @param array $pemeriksaanPerangkatFields
     * @return pemeriksaan_perangkat
     */
    public function fakepemeriksaan_perangkat($pemeriksaanPerangkatFields = [])
    {
        return new pemeriksaan_perangkat($this->fakepemeriksaan_perangkatData($pemeriksaanPerangkatFields));
    }

    /**
     * Get fake data of pemeriksaan_perangkat
     *
     * @param array $pemeriksaanPerangkatFields
     * @return array
     */
    public function fakepemeriksaan_perangkatData($pemeriksaanPerangkatFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_pengguna_pc' => $fake->word,
            'lokasi' => $fake->word,
            'serial_number' => $fake->word,
            'tanggal_pengecekan' => $fake->word,
            'mulai_jam_pengecekan' => $fake->word,
            'selesai_jam_pengecekan' => $fake->word,
            'full_computer_name' => $fake->word,
            'join_domain' => $fake->word,
            'update_kaspersky' => $fake->word,
            'tanggal_update' => $fake->word,
            'tipe_koneksi' => $fake->word,
            'tipe_ip' => $fake->word,
            'mac_address' => $fake->word,
            'ip_address' => $fake->word,
            'subnet_mask' => $fake->word,
            'gateway' => $fake->word,
            'dns1' => $fake->word,
            'dns2' => $fake->word,
            'dns3' => $fake->word,
            'ttd_it_senior' => $fake->word,
            'ttd_admin_aps' => $fake->word,
            'teknisi_aps' => $fake->word,
            'user' => $fake->word,
            'it_non_public' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $pemeriksaanPerangkatFields);
    }
}
