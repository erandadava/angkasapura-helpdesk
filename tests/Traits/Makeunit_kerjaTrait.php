<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\unit_kerja;
use App\Repositories\unit_kerjaRepository;

trait Makeunit_kerjaTrait
{
    /**
     * Create fake instance of unit_kerja and save it in database
     *
     * @param array $unitKerjaFields
     * @return unit_kerja
     */
    public function makeunit_kerja($unitKerjaFields = [])
    {
        /** @var unit_kerjaRepository $unitKerjaRepo */
        $unitKerjaRepo = \App::make(unit_kerjaRepository::class);
        $theme = $this->fakeunit_kerjaData($unitKerjaFields);
        return $unitKerjaRepo->create($theme);
    }

    /**
     * Get fake instance of unit_kerja
     *
     * @param array $unitKerjaFields
     * @return unit_kerja
     */
    public function fakeunit_kerja($unitKerjaFields = [])
    {
        return new unit_kerja($this->fakeunit_kerjaData($unitKerjaFields));
    }

    /**
     * Get fake data of unit_kerja
     *
     * @param array $unitKerjaFields
     * @return array
     */
    public function fakeunit_kerjaData($unitKerjaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_uk' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $unitKerjaFields);
    }
}
