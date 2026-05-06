<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;
use Throwable;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class VisitorChart extends LineChartWidget
{
    protected static ?string $heading = 'Visitor';
    protected int | string | array $columnSpan = 'full';

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => true,
            ],
        ],
    ];

    public ?string $filter = 'daily';

    public static function canView(): bool
    {
        $propertyId = config('analytics.property_id');
        $credentialsPath = config('analytics.service_account_credentials_json');

        return filled($propertyId)
            && is_string($credentialsPath)
            && file_exists($credentialsPath);
    }

    protected function getEmptyChartData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => [],
                    'fill' => true,
                    'borderColor' => settings('site.primarylightcolor'),
                ],
            ],
            'labels' => [],
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        if($activeFilter == 'daily') {
            return $this->getDailyVisitorsChartData();
        } else if ($activeFilter == 'weekly'){
            return $this->getWeeklyVisitorsChartData();
        } else if ($activeFilter == 'monthly'){
            return $this->getMonthlyVisitorsChartData();
        }

        return $this->getMonthlyVisitorsChartData();
    }

    public function getDailyVisitorsChartData()
    {
        try {
            // Retrieve the analytics data for the past 30 days
            $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
        } catch (Throwable $exception) {
            return $this->getEmptyChartData();
        }

        // Create arrays to store the daily visitor data and labels
        $dailyVisitorData = [];
        $dates = [];

        // Loop through the analytics data and extract the daily visitor data and labels
        foreach ($analyticsData as $data) {
            $date = $data['date']->format('d F Y');
            $dailyVisitorData[] = $data['screenPageViews'];
            $dates[] = $date;
        }

        // Return the daily visitor data and labels in the required format
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => array_reverse($dailyVisitorData),
                    'fill' => true,
                    'borderColor'=> settings('site.primarylightcolor'),
                ]
            ],
            'labels' => array_reverse($dates)
        ];
    }

    public function getWeeklyVisitorsChartData()
    {
        // Set the start date to 8 weeks ago
        $startDate = Carbon::now()->subWeeks(8);

        // Create an empty array to store the weekly visitor data and labels
        $weeklyVisitorData = [];
        $dates = [];

        // Loop through the weeks in the period and fetch the analytics data
        for ($i = 0; $i < 10; $i++) {
            // Get the start and end date for the week
            $weekStartDate = $startDate->copy()->startOfWeek();
            $weekEndDate = $startDate->copy()->endOfWeek();

            try {
                // Fetch the analytics data for the week
                $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(
                    Period::create($weekStartDate, $weekEndDate)
                );
            } catch (Throwable $exception) {
                return $this->getEmptyChartData();
            }

            // Extract the visitors data and date for the week
            $weeklyVisitorData[] = $analyticsData->sum('screenPageViews');
            $dates[] = $weekStartDate->format('M d');

            // Move to the next week
            $startDate->addWeek();
        }

        // Return the weekly visitor data and labels in the required format
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $weeklyVisitorData,
                    'fill' => true,
                    'borderColor'=> settings('site.primarylightcolor'),
                ]
            ],
            'labels' => $dates
        ];
    }

    public function getMonthlyVisitorsChartData()
    {
        try {
            // Retrieve the analytics data for the past 12 months
            $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::months(12));
        } catch (Throwable $exception) {
            return $this->getEmptyChartData();
        }

        // Create an array to store the monthly visitor data
        $monthlyVisitorData = [];

        // Loop through the analytics data and extract the monthly visitor data
        foreach ($analyticsData as $data) {
            $monthStartDate = $data['date']->startOfMonth()->format('F Y');
            $monthlyVisitorData[$monthStartDate] = isset($monthlyVisitorData[$monthStartDate])
                                                ? $monthlyVisitorData[$monthStartDate] + $data['screenPageViews']
                                                : $data['screenPageViews'];
        }

        // Extract the labels and visitor data from the monthlyVisitorData array
        $labels = array_keys($monthlyVisitorData);
        $data = array_values($monthlyVisitorData);

        // Return the monthly visitor data and labels in the required format
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => array_reverse($data),
                    'fill' => true,
                    'borderColor'=> settings('site.primarylightcolor'),
                ]
            ],
            'labels' => array_reverse($labels)
        ];
    }

}
