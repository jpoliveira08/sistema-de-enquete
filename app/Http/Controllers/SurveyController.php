<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Interfaces\SurveyRepositoryInterface;
use Illuminate\Http\JsonResponse;

class SurveyController extends Controller
{
    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function store(SurveyRequest $request): JsonResponse
    {
        $this->surveyRepository->createSurvey($request->all());

        return response()->json(['message' => 'Survey created'], 201);
    }

    public function index()
    {
        return view('surveys.index')
            ->with('surveys', $this->surveyRepository->getAllSurveys());
    }
}
