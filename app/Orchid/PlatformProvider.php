<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\OrchidServiceProvider;
use Orchid\Platform\ItemPermission;
use Orchid\Screen\Actions\Menu;
use Orchid\Platform\Dashboard;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }
    public function registerMainMenu(): array
    {
        return [

            Menu::make('Users')
                ->icon('lock')
                ->list([
                    Menu::make(__('Users'))
                        ->icon('user')
                        ->route('platform.systems.users')
                        ->permission('platform.systems.users'),
                        //->title(__('Access rights')),

                    Menu::make(__('Roles'))
                        ->icon('lock')
                        ->route('platform.systems.roles')
                        ->permission('platform.systems.roles'),
                ]),

            //Product
            Menu::make('Quản Lý Sản Phẩm')
                ->icon('modules')
                ->list([
                    //Product
                    Menu::make('Danh Sách Sản Phẩm')
                        ->icon('module')
                        ->route('admin.product.list')
                        ->permission('admin.writer'),

                    //Category
                    Menu::make('Danh Sách Danh Mục')
                        ->icon('menu')
                        ->route('admin.category.list')
                        ->permission('admin.writer'),

                    //Tag
                    Menu::make('Danh Sách Thẻ Tag')
                        ->icon('tag')
                        ->route('admin.tag.list')
                        ->permission('admin.writer'),

                ]),

            /*
            //Examples
            Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(function () {
                    return 6;
                }),

            Menu::make('Dropdown menu')
                ->icon('code')
                ->list([
                    Menu::make('Sub element item 1')->icon('bag'),
                    Menu::make('Sub element item 2')->icon('heart'),
                ]),

            Menu::make('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            Menu::make('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            Menu::make('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            Menu::make('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            Menu::make('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),

            Menu::make('Documentation')
                ->title('Docs')
                ->icon('docs')
                ->url('https://orchid.software/en/docs'),

            Menu::make('Changelog')
                ->icon('shuffle')
                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
                ->target('_blank')
                ->badge(function () {
                    return Dashboard::version();
                }, Color::DARK()),
            */

        ];
    }

    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),

            ItemPermission::group(__('Writer'))
                ->addPermission('admin.writer', 'Writer')
        ];
    }
}




