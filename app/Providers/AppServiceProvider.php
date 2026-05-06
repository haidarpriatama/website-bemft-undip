<?php

namespace App\Providers;

use App\Filament\Pages\Settings as PagesSettings;
use App\Filament\Resources\BidangResource;
use App\Filament\Resources\BsoResource;
use App\Filament\Resources\DivisiResource;
use App\Filament\Resources\EventResource;
use App\Filament\Resources\JabatanResource;
use App\Filament\Resources\JurusanResource;
use App\Filament\Resources\PengurusResource;
use App\Filament\Resources\PostCategoryResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\PressReleaseResource;
use App\Filament\Resources\PrestasiResource;
use App\Filament\Resources\ProductBemResource;
use App\Filament\Resources\ProductCategoryResource;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\ProgramKerjaResource;
use App\Filament\Resources\TagResource;
use App\Filament\Resources\UpkResource;
use App\Models\Bidang;
use App\Models\Jurusan;
use App\Models\PostCategory;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentAddons\Forms\Components;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Reworck\FilamentSettings\Pages\Settings;
use FilipFonal\FilamentLogManager\Pages\Logs;
use Illuminate\Support\Facades\Blade;
use Yepsua\Filament\Themes\Facades\FilamentThemes;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Settings::class, function () {
            return \App\Settings::make(storage_path('app/settings.json'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentThemes::register(function($path) {
            // Using Vite:
            return app(\Illuminate\Foundation\Vite::class)('resources/' . $path);
            // Using asset()
            return asset($path);
        });

        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->items([
                NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-home')
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                    ->url(route('filament.pages.dashboard')),
            ])
            ->groups([
                NavigationGroup::make('Content')
                    ->items([
                        ...PostCategoryResource::getNavigationItems(),
                        ...PostResource::getNavigationItems(),
                        ...TagResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('BEM FT')
                    ->items([
                        ...ProfileResource::getNavigationItems(),
                        ...BidangResource::getNavigationItems(),
                        ...DivisiResource::getNavigationItems(),
                        ...ProgramKerjaResource::getNavigationItems(),
                        ...JabatanResource::getNavigationItems(),
                        ...PengurusResource::getNavigationItems(),
                        ...ProductCategoryResource::getNavigationItems(),
                        ...ProductBemResource::getNavigationItems(),
                        ...EventResource::getNavigationItems(),
                        ...PressReleaseResource::getNavigationItems(),
                        ...PrestasiResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('Himpunan')
                    ->items([
                        ...JurusanResource::getNavigationItems(),
                        ...ProductResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('Additional')
                    ->items([
                        ...BsoResource::getNavigationItems(),
                        ...UpkResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('Settings')
                    ->items([
                        ...PagesSettings::getNavigationItems(),
                        ...Logs::getNavigationItems(),
                    ]),
            ]);
        });

        // Register your custom implementation of the Settings page.
        $this->app->singleton(Settings::class, \App\Filament\Pages\Settings::class);

        $years = [];
        for ($year = 2000; $year <= 2050; $year++) {
            $years[$year] = $year;
        }

        \Reworck\FilamentSettings\FilamentSettings::setFormFields([
            Components\Pills::make('Heading')
            ->activePill(1) // pill two will be the default active one
            ->pills([
                Components\Pills\Pill::make('Site')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('site.title')->label('Site Title'),
                        \Filament\Forms\Components\TextInput::make('meta.description')->label('Meta Description'),
                        \Filament\Forms\Components\TextInput::make('meta.keywords')->label('Meta Keywords'),
                        \Filament\Forms\Components\RichEditor::make('site.tentangkami')->label('Tentang Kami'),
                        \Filament\Forms\Components\Select::make('site.tahunkepengurusan')
                        ->label('Tahun Kepengurusan')
                        ->placeholder('Tahun Kepengurusan')
                        ->options($years)
                        ->default(Carbon::now()->year),
                        \Filament\Forms\Components\TextInput::make('site.kontak')->label('Kontak'),
                        \Filament\Forms\Components\ColorPicker::make('site.primarycolor')->label('Primary Color')->rgba(),
                        \Filament\Forms\Components\ColorPicker::make('site.primarylightcolor')->label('Primary Light Color')->rgba(),
                        \Filament\Forms\Components\ColorPicker::make('site.secondarycolor')->label('Secondary Color')->rgba(),
                        \Filament\Forms\Components\ColorPicker::make('site.textcolor')->label('Text Color')->rgba(),
                    ]),
                Components\Pills\Pill::make('Header/Navbar')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('navbar.title')->label('Navbar Title'),
                        \Filament\Forms\Components\TextInput::make('navbar.tagline')->label('Navbar Tagline'),
                        \Filament\Forms\Components\TextInput::make('navbar.kabinet')->label('Kabinet'),
                        \Filament\Forms\Components\FileUpload::make('navbar.logo')
                            ->label('Navbar Logo')
                            ->directory('navbarlogo')
                            ->preserveFilenames()
                            ->image(),
                    ]),
                Components\Pills\Pill::make('Footer')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('footer.linkinstagram')->label('Link Instagram'),
                        \Filament\Forms\Components\TextInput::make('footer.linkspotify')->label('Link Spotify'),
                        \Filament\Forms\Components\TextInput::make('footer.linklinkedin')->label('Link LinkedIn'),
                        \Filament\Forms\Components\TextInput::make('footer.linktwitter')->label('Link Twitter'),
                        \Filament\Forms\Components\TextInput::make('footer.linkyoutube')->label('Link Youtube'),
                    ]),
                Components\Pills\Pill::make('Content')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('content.linkteknikdalamangka')->label('Link Teknik Dalam Angka'),
                        \Filament\Forms\Components\TextInput::make('content.linkecritics')->label('Link E-Critics'),
                        \Filament\Forms\Components\TextInput::make('content.linkspotifyhomepage')->label('Link Spotify (Beranda)'),
                    ]),
                Components\Pills\Pill::make('Menu')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('menu.linkeristek')->label('Link E-Ristek'),
                        \Filament\Forms\Components\TextInput::make('menu.linkktmhilang')->label('Link KTM Hilang'),
                        \Filament\Forms\Components\TextInput::make('menu.linkpartnership')->label('Link Partnership'),
                    ]),
            ]),
        ]);

        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });

    }
}
