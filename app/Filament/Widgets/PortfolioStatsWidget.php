<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description(Project::where('status', 'published')->count() . ' published')
                ->descriptionIcon('heroicon-m-code-bracket')
                ->color('indigo'),

            Stat::make('Blog Posts', Post::count())
                ->description(Post::published()->count() . ' published')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('emerald'),

            Stat::make('Messages', Contact::count())
                ->description(Contact::where('is_read', false)->count() . ' unread')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('amber'),

            Stat::make('Total Views', number_format(Project::sum('views') + Post::sum('views')))
                ->description('Projects + Blog')
                ->descriptionIcon('heroicon-m-eye')
                ->color('violet'),
        ];
    }
}
