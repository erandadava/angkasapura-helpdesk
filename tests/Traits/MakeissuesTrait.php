<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\issues;
use App\Repositories\issuesRepository;

trait MakeissuesTrait
{
    /**
     * Create fake instance of issues and save it in database
     *
     * @param array $issuesFields
     * @return issues
     */
    public function makeissues($issuesFields = [])
    {
        /** @var issuesRepository $issuesRepo */
        $issuesRepo = \App::make(issuesRepository::class);
        $theme = $this->fakeissuesData($issuesFields);
        return $issuesRepo->create($theme);
    }

    /**
     * Get fake instance of issues
     *
     * @param array $issuesFields
     * @return issues
     */
    public function fakeissues($issuesFields = [])
    {
        return new issues($this->fakeissuesData($issuesFields));
    }

    /**
     * Get fake data of issues
     *
     * @param array $issuesFields
     * @return array
     */
    public function fakeissuesData($issuesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'issue_id' => $fake->word,
            'cat_id' => $fake->randomDigitNotNull,
            'prio_id' => $fake->randomDigitNotNull,
            'request_id' => $fake->randomDigitNotNull,
            'location' => $fake->word,
            'prob_desc' => $fake->text,
            'reason_desc' => $fake->text,
            'complete_by' => $fake->randomDigitNotNull,
            'issue_date' => $fake->date('Y-m-d H:i:s'),
            'complete_date' => $fake->date('Y-m-d H:i:s'),
            'is_archive' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $issuesFields);
    }
}
