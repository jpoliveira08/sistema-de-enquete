<?php

namespace Tests\Unit;

use App\Models\{Option, Survey};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_the_create_survey_page()
    {
        $response = $this->get('surveys/create');

        $response->assertStatus(200);
    }
}
