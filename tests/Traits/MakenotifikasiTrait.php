<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\notifikasi;
use App\Repositories\notifikasiRepository;

trait MakenotifikasiTrait
{
    /**
     * Create fake instance of notifikasi and save it in database
     *
     * @param array $notifikasiFields
     * @return notifikasi
     */
    public function makenotifikasi($notifikasiFields = [])
    {
        /** @var notifikasiRepository $notifikasiRepo */
        $notifikasiRepo = \App::make(notifikasiRepository::class);
        $theme = $this->fakenotifikasiData($notifikasiFields);
        return $notifikasiRepo->create($theme);
    }

    /**
     * Get fake instance of notifikasi
     *
     * @param array $notifikasiFields
     * @return notifikasi
     */
    public function fakenotifikasi($notifikasiFields = [])
    {
        return new notifikasi($this->fakenotifikasiData($notifikasiFields));
    }

    /**
     * Get fake data of notifikasi
     *
     * @param array $notifikasiFields
     * @return array
     */
    public function fakenotifikasiData($notifikasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'konten_id' => $fake->randomDigitNotNull,
            'link_id' => $fake->word,
            'pesan' => $fake->word,
            'status' => $fake->word,
            'status_baca' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $notifikasiFields);
    }
}
