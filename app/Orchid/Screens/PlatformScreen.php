<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    public $name = 'Trillfa Dashboard';

    public $description = 'Bảng Quản Trị Trillfa';

    public function query(): array
    {
        return [];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Cửa Hàng')
                ->href('https://trillfa.com')
                ->icon('globe-alt'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::view('platform::partials.welcome'),
        ];
    }
}
