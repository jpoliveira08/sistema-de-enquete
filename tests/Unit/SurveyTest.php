<?php

namespace Tests\Unit;

use Tests\TestCase;

class SurveyTest extends TestCase
{
    /** @test */
    public function it_can_show_the_create_survey_page()
    {
        $response = $this->get('surveys/create');

        $response->assertStatus(200);
    }
}
