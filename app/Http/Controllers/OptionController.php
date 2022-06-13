<?php

namespace App\Http\Controllers;

use App\Interfaces\SurveyRepositoryInterface;
use App\Models\Survey;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function show(int $survey)
    {
        $surveyModel = Survey::find($survey);
        $options = $this->surveyRepository->getAllOptionsFromASurvey($surveyModel);

        return view('surveys.show')
            ->with('survey', $surveyModel)
            ->with('options', $options);
    }
}
