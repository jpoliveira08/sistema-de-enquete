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
}
