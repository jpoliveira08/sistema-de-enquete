<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_survey_with_3_or_more_options(): void
    {
        $survey = Survey::factory()->make();
        $options = Option::factory(3)->make();

        $data = [
            'header' => $survey->toArray(),
            'options' => $options->toArray()
        ];

        $response = $this->postJson(
            '/surveys', $data
        );

        $response->assertStatus(201);

        $this->assertDatabaseHas('surveys', [
            'title' => $survey->title,
            'begins_in' => $survey->begins_in,
            'expires_in' => $survey->expires_in
        ]);

        $this->assertDatabaseCount('options', count($options));
    }

    /** @test */
    public function it_should_not_accept_a_survey_with_less_than_three_options()
    {
        $survey = Survey::factory()->make();
        $options = Option::factory(2)->make();

        $data = [
            'header' => $survey->toArray(),
            'options' => $options->toArray()
        ];
        
        $response = $this->postJson(
            '/surveys', $data
        );

        $response->assertStatus(422);

        $this->assertDatabaseCount('options', 0);
    }

    /**
     * @test
     */
    public function it_should_not_accept_a_start_date_greater_than_end_date()
    {
        $survey = Survey::factory()->make([
            'begins_in' => Carbon::now()->addHour()->toDateTimeString(),
            'expires_in' => Carbon::now()->toDateTimeString()
        ]);

        $options = Option::factory(3)->make();

        $data = [
            'header' => $survey->toArray(),
            'options' => $options->toArray()
        ];
        
        $response = $this->postJson(
            '/surveys', $data
        );

        $response->assertStatus(422);
    }

    /** @test */
    public function it_should_not_accept_a_survey_with_empty_fields()
    {
        $data = [
            'header' => [],
            'options' => []
        ];
        
        $response = $this->postJson(
            '/surveys', $data
        );

        $response->assertStatus(422);
    }

    /** @test */
    public function it_should_not_accept_a_survey_without_options()
    {
        $data = [
            'header' => []
        ];
        
        $response = $this->postJson(
            '/surveys', $data
        );

        $response->assertStatus(422);
    }
}
