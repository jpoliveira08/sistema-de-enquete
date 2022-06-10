<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_survey_with_3_or_more_options(): void
    {
        // Criacao do cenario (Arrange)
        $survey = Survey::factory()->make();

        $options = Option::factory(3)->make();

        $data = [
            'header' => $survey->toArray(),
            'options' => $options->toArray()
        ];
        
        // Executando codigo a ser testado (Act)
        $response = $this->postJson(
            '/surveys', $data
        );

        // Analise da saida (Assert)
        $response->assertStatus(201);

        $this->assertDatabaseHas('surveys', [
            'title' => $survey->title,
            'begins_in' => $survey->begins_in,
            'expires_in' => $survey->expires_in
        ]);
    }

    public function it_should_not_accept_an_survey_with_less_than_3_options(): void
    {
        $survey = Survey::factory()->make();

        $options = Option::factory(1)->make();
    }
}
