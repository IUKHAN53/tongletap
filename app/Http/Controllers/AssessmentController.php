<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = [
            [
                'title' => 'Burnout Scale Assessment',
                'description' => 'Take our Burnout Self-Assessment Quiz to gain insights into your current well-being.',
                'image' => 'https://picsum.photos/150?random=1',
                'url' => 'https://ik5dz7zx2sr.typeform.com/to/S1insKbw'
            ],
            [
                'title' => 'Kessler Psychological Distress Scale (K10)',
                'description' => 'Measure your psychological distress.',
                'image' => 'https://picsum.photos/150?random=2',
                'url' => 'https://ik5dz7zx2sr.typeform.com/to/Kf7tHTpY'
            ],
            [
                'title' => 'Patient Health Questionnaire-9 (PHQ-9)',
                'description' => 'Take our Patient Health Questionnaire to gain insights into your current well-being.',
                'image' => 'https://picsum.photos/150?random=3',
                'url' => 'https://ik5dz7zx2sr.typeform.com/to/M3Re1bCo'
            ],
            [
                'title' => 'Generalised Anxiety Disorder-7 Scale (GAD-7)',
                'description' => 'Take our Anxiety Self-Assessment Quiz to gain insights into your current well-being.',
                'image' => 'https://picsum.photos/150?random=4',
                'url' => 'https://ik5dz7zx2sr.typeform.com/to/uNt4U4Sp'
            ]
        ];
        $layout = strtolower(auth()->user()->type) === 'employee' ? 'layouts.employee' : 'layouts.admin';
        return view('assessment.index', compact('assessments', 'layout'));
    }

}
