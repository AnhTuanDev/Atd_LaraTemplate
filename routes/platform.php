<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

use App\Orchid\Screens\Shop\Product\ProductEditScreen;
use App\Orchid\Screens\Shop\Product\ProductListScreen;

use App\Orchid\Screens\Shop\Category\CategoryEditScreen;
use App\Orchid\Screens\Shop\Category\CategoryListScreen;

use App\Orchid\Screens\Shop\Tag\TagEditScreen;
use App\Orchid\Screens\Shop\Tag\TagListScreen;

use App\Orchid\Screens\Shop\Size\SizeEditScreen;
use App\Orchid\Screens\Shop\Size\SizeListScreen;

use App\Orchid\Screens\Shop\Color\ColorEditScreen;
use App\Orchid\Screens\Shop\Color\ColorListScreen;

use App\Orchid\Screens\Shop\AttributeValue\AttributeValueEditScreen;
use App\Orchid\Screens\Shop\AttributeValue\AttributeValueListScreen;


//Color...
Route::screen('color/{color?}', ColorEditScreen::class)
    ->name('admin.color.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('admin.color.list')
            ->push('Color');
    });

Route::screen('color-list', ColorListScreen::class)
    ->name('admin.color.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Colors');
    });

//Size...
Route::screen('size/{size?}', SizeEditScreen::class)
    ->name('admin.size.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('admin.size.list')
            ->push('Size');
    });

Route::screen('size-list', SizeListScreen::class)
    ->name('admin.size.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Sizes');
    });

//Tag...
Route::screen('tag/{tag?}', TagEditScreen::class)
    ->name('admin.tag.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('admin.tag.list')
            ->push('Tag');
    });

Route::screen('tag-list', TagListScreen::class)
    ->name('admin.tag.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Tags');
    });

//Category...
Route::screen('category/{category?}', CategoryEditScreen::class)
    ->name('admin.category.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('admin.category.list')
            ->push('Category');
    });

Route::screen('category-list', CategoryListScreen::class)
    ->name('admin.category.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Categories');
    });


// Produc...
Route::screen('product/{product?}', ProductEditScreen::class)
    ->name('admin.product.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('admin.product.list')
            ->push('Product');
    });

Route::screen('product-list', ProductListScreen::class)
    ->name('admin.product.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Products');
    });

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });


// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen');
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', 'Idea::class','platform.screens.idea');
