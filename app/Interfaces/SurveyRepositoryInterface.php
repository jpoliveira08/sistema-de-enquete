<?php

declare(strict_types=1);

namespace App\Interfaces;

interface SurveyRepositoryInterface
{
    public function createSurvey(array $survey);
}