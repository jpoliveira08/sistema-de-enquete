<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreateASurvey()
    {
        // Criacao do cenario (Arrange)
        $survey = Survey::factory()->make();

        // Executando codigo a ser testado (Act)
        $response = $this->postJson('/surveys', $survey->toArray());
        
        // Analise da saida (Assert)
        $response->assertStatus(201);

        $this->assertDatabaseHas('surveys', [
            'title' => $survey->title,
            'begins_in' => $survey->begins_in,
            'expires_in' => $survey->expires_in
          ]);
    }
}
