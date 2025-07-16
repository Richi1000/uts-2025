<?php

namespace App\Providers\Filament;

use App\Filament\Resources\BelajarResource;
use App\Filament\Resources\JamPelajaranResource;
use App\Filament\Resources\MataPelajaranResource;
use App\Filament\Resources\NilaiResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class GuruPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('guru')
            ->path('guru')
            ->brandName('Teacher Dashboard')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Guru/Resources'), for: 'App\\Filament\\Guru\\Resources')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Guru/Pages'), for: 'App\\Filament\\Guru\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->resources([
                MataPelajaranResource::class,
                JamPelajaranResource::class,
                BelajarResource::class,
                NilaiResource::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Guru/Widgets'), for: 'App\\Filament\\Guru\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
