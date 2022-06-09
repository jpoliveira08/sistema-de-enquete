<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\SurveyRepositoryInterface;
use App\Models\Survey;

class SurveyRepository implements SurveyRepositoryInterface
{
    public function createSurvey(array $survey)
    {
        return Survey::create($survey);
    }
}