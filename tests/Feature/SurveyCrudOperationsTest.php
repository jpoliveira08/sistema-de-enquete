<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\{Option, Survey};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyCrudOperationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_the_surveys()
    {
        $survey = Survey::factory()->create();

        $options = Option::factory(3)->state([
            'survey_id' => $survey->id
        ])->create();
        
        $response = $this->get('/surveys');

        $response->assertStatus(200);
        $this->assertInstanceOf(Survey::class, $survey);
        foreach ($options as $option) {
            $this->assertInstanceOf(Option::class, $option);
        }

        $response->assertSee($survey->title)
            ->assertSee($survey->begins_in)
            ->assertSee($survey->expires_in);
    }

    /** @test */
    public function it_can_show_edit_survey_page()
    {
        $survey = Survey::factory()->create();

        $options = Option::factory(3)->create([
            'survey_id' => $survey->id
        ]);

        $response = $this->get("surveys/$survey->id/edit");

        $response->assertStatus(200);
        $response->assertSee($survey->title)
            ->assertSee($survey->begins_in)
            ->assertSee($survey->expires_in);

        foreach ($options as $option) {
            $response->assertSee($option->name);
        }
    }

    /** @test */
    public function it_can_update_the_survey()
    {
        $survey = Survey::factory()->create();

        $options = Option::factory(3)->state([
            'survey_id' => $survey->id
        ])->create();

        $newSurvey = Survey::factory()->make();

        $newOptions = Option::factory(3)->state([
            'survey_id' => $newSurvey->id
        ])->make();

        $newdata = [
            'header' => $newSurvey->toArray(),
            'options' => $newOptions->toArray()
        ];

        $response = $this->putJson(
            "/surveys/$survey->id",
            $newdata
        );

        $response->assertRedirect(route('surveys.index'));

        $this->assertDatabaseHas(
            'surveys', [
                'title' => $newSurvey->title,
                'begins_in' => $newSurvey->begins_in,
                'expires_in' => $newSurvey->expires_in
            ]
        );
    }
}
