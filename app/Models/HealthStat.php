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

    public function calculateStats($stat)
    {
        $depressionStatus = $depressionIcon = $depressionColor = '';
        $anxietyStatus = $anxietyIcon = $anxietyColor = '';
        $stressStatus = $stressIcon = $stressColor = '';

        if ($stat->depression) {
            if ($stat->depressionScore <= 4) {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $depressionColor = '#81c984';
            } elseif ($stat->depressionScore <= 6) {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $depressionColor = '#fbbe18';
            } elseif ($stat->depressionScore <= 10) {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $depressionColor = '#fb822e';
            } elseif ($stat->depressionScore <= 13) {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $depressionColor = '#c34b20';
            } elseif ($stat->depressionScore >= 14) {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $depressionColor = '#b61f1c';
            }
        } else {
                $depressionIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $depressionColor = '#000';
        }

        if ($stat->anxietyScore) {
            if ($stat->anxietyScore <= 3) {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $anxietyColor = '#81c984';
            } elseif ($stat->anxietyScore <= 5) {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $anxietyColor = '#fbbe18';
            } elseif ($stat->anxietyScore <= 7) {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $anxietyColor = '#fb822e';
            } elseif ($stat->anxietyScore <= 9) {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $anxietyColor = '#c34b20';
            } elseif ($stat->anxietyScore >= 10) {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $anxietyColor = '#b61f1c';
            }
        } else {
                $anxietyIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $anxietyColor = '#000';
        }

        if ($stat->stressScore) {
            if ($stat->stressScore <= 7) {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-80.svg');
                $stressColor = '#81c984';
            } elseif ($stat->stressScore <= 9) {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-60.svg');
                $stressColor = '#fbbe18';
            } elseif ($stat->stressScore <= 12) {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-40.svg');
                $stressColor = '#fb822e';
            } elseif ($stat->stressScore <= 16) {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-20.svg');
                $stressColor = '#c34b20';
            } elseif ($stat->stressScore >= 17) {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $stressColor = '#b61f1c';
            }
        } else {
                $stressIcon = asset('assets/emp/images/svgs/chart/outline/happy-0.svg');
                $stressColor = '#000';
        }

        return [
            'depression' => [
                'status' => $stat->depressionStatus ?? '',
                'percentage' => $stat->depressionPercentage ?? 0,
                'score' => $stat->depressionScore ?? 0,
                'icon' => $depressionIcon,
                'color' => $depressionColor,
            ],
            'anxiety' => [
                'status' => $stat->anxietyStatus ?? '',
                'percentage' => $stat->anxietyPercentage ?? 0,
                'score' => $stat->anxietyScore ?? 0,
                'icon' => $anxietyIcon,
                'color' => $anxietyColor,
            ],
            'stress' => [
                'status' => $stat->stressStatus ?? '',
                'percentage' => $stat->stressPercentage ?? 0,
                'score' => min($stat->stressScore ?? 0, 20),
                'icon' => $stressIcon,
                'color' => $stressColor,
            ],
        ];
    }
}
