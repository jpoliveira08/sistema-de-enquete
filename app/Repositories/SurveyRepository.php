<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\SurveyRepositoryInterface;
use App\Models\Option;
use App\Models\Survey;
use Illuminate\Support\Facades\Log;

class SurveyRepository implements SurveyRepositoryInterface
{
    public function createSurvey(array $surveyRequest)
    {
        $survey = Survey::create($surveyRequest['header']);
        $options = [];
        for ($i = 0; $i < count($surveyRequest['options']); $i++) {
            $options[] = array_merge(['survey_id' => $survey->id], $surveyRequest['options'][$i]);
        }

        Option::insert($options);

        return $survey;
    }
}
