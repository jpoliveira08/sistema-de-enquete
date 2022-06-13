<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Survey;

interface SurveyRepositoryInterface
{
    public function createSurvey(array $survey);
    public function getAllSurveys();
    public function updateSurvey(Survey $surveyModel, array $newSurveyData);
    public function deleteSurvey(Survey $surveyModel);
    public function getAllOptionsFromASurvey(Survey $surveyModel);
}
