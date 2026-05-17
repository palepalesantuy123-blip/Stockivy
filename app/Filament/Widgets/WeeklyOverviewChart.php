<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class WeeklyOverviewChart extends ChartWidget
{
    protected ?string $heading = 'Weekly Overview';

    protected ?string $maxHeight = '300';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Data Bawah',
                    'data' => [120, 100, 140, 105, 112, 120, 100],
                    'backgroundColor' => '#D2D7E4',
                    'borderRadius' => [
                        'topLeft' => 0, 'topRight' => 0, 'bottomLeft' => 8, 'bottomRight' => 8,
                    ],
                    'borderSkipped' => false,
                ],
                [
                    'label' => 'Data Atas',
                    'data' => [44, 78, 68, 49, 55, 44, 81],
                    'backgroundColor' => '#EBEDF3',
                    'borderRadius' => 8,
                    'borderSkipped' => false,
                ],
            ],
            'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'x' => [
                    'stacked' => true,
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'stacked' => true,
                    'min' => 0,
                    'max' => 250,
                    'ticks' => [
                        'stepSize' => 50,
                    ],
                ],
            ],
            'barPercentage' => 0.6,
        ];
    }
}
