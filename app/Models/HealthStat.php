<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthStat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStats()
    {
        return $this->calculateStats($this);
    }

    public function getStatsByPercentage($stat, $score)
    {
        $maxDepression = 14;
        $maxAnxiety = 10;
        $maxStress = 17;
        $percentage = match ($stat) {
            'depression' => ($score / $maxDepression) * 100,
            'anxiety' => ($score / $maxAnxiety) * 100,
            'stress' => ($score / $maxStress) * 100,
        };
        return floor(min($percentage, 100));
    }

    public function calculateStats($stat)
    {
        $depressionStatus = $depressionIcon = $depressionColor = '';
        $anxietyStatus = $anxietyIcon = $anxietyColor = '';
        $stressStatus = $stressIcon = $stressColor = '';

        if ($stat->depression) {
            if ($stat->depression <= 4) {
                $depressionStatus = "Healthy";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $depressionColor = '#81c984';
            } elseif ($stat->depression <= 6) {
                $depressionStatus = "Mild";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $depressionColor = '#fbbe18';
            } elseif ($stat->depression <= 10) {
                $depressionStatus = "Moderate";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $depressionColor = '#fb822e';
            } elseif ($stat->depression <= 13) {
                $depressionStatus = "Unhealthy";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $depressionColor = '#c34b20';
            } elseif ($stat->depression >= 14) {
                $depressionStatus = "Concerning";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $depressionColor = '#b61f1c';
            }
        } else {
                $depressionStatus = "N/A";
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $depressionColor = '#000';

        }

        if ($stat->anxiety) {
            if ($stat->anxiety <= 3) {
                $anxietyStatus = "Healthy";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $anxietyColor = '#81c984';
            } elseif ($stat->anxiety <= 5) {
                $anxietyStatus = "Mild";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $anxietyColor = '#fbbe18';
            } elseif ($stat->anxiety <= 7) {
                $anxietyStatus = "Moderate";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $anxietyColor = '#fb822e';
            } elseif ($stat->anxiety <= 9) {
                $anxietyStatus = "Unhealthy";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $anxietyColor = '#c34b20';
            } elseif ($stat->anxiety >= 10) {
                $anxietyStatus = "Concerning";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $anxietyColor = '#b61f1c';
            }
        } else {
                $anxietyStatus = "N/A";
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $anxietyColor = '#000';

        }

        if ($stat->stress) {
            if ($stat->stress <= 7) {
                $stressStatus = "Healthy";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $stressColor = '#81c984';
            } elseif ($stat->stress <= 9) {
                $stressStatus = "Mild";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $stressColor = '#fbbe18';
            } elseif ($stat->stress <= 12) {
                $stressStatus = "Moderate";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $stressColor = '#fb822e';
            } elseif ($stat->stress <= 16) {
                $stressStatus = "Unhealthy";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $stressColor = '#c34b20';
            } elseif ($stat->stress >= 17) {
                $stressStatus = "Concerning";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $stressColor = '#b61f1c';
            }
        } else {
                $stressStatus = "N/A";
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $stressColor = '#000';

        }

        return [
            'depression' => [
                'status' => $depressionStatus,
                'percentage' => $this->getStatsByPercentage('depression', $stat->depression),
                'score' => $stat->depression ?? 0,
                'icon' => $depressionIcon,
                'color' => $depressionColor,
            ],
            'anxiety' => [
                'status' => $anxietyStatus,
                'percentage' => $this->getStatsByPercentage('anxiety', $stat->anxiety),
                'score' => $stat->anxiety ?? 0,
                'icon' => $anxietyIcon,
                'color' => $anxietyColor,
            ],

            'stress' => [
                'status' => $stressStatus,
                'percentage' => $this->getStatsByPercentage('stress', $stat->stress),
                'score' => min($stat->stress ?? 0, 20),
                'icon' => $stressIcon,
                'color' => $stressColor,
            ],
        ];
    }
}
