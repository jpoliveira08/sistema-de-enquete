<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Interfaces\SurveyRepositoryInterface;
use App\Models\{Option, Survey};

class SurveyController extends Controller
{
    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function store(SurveyRequest $request)
    {
        $this->surveyRepository->createSurvey($request->all());

        return redirect('surveys');
    }

    public function index()
    {
        return view('surveys.index')
            ->with('surveys', $this->surveyRepository->getAllSurveys());
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function edit(Survey $survey)
    {
        $options = Option::whereBelongsTo($survey)->get();

        return view('surveys.edit')
            ->with('survey', $survey)
            ->with('options', $options);
    }

    public function update(Survey $survey ,SurveyRequest $request)
    {
        $this->surveyRepository->updateSurvey($survey, $request->all());

        return redirect('surveys');
    }
}
