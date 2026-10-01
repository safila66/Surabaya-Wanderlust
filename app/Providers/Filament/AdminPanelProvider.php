<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->brandName('Surabaya Wanderlust')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => '#c8960a',
                'gray' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
                        ->authMiddleware([
                Authenticate::class,
            ])
            ->font('Plus Jakarta Sans')
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => Blade::render('<style>
                                        body {
                        background-image: url("https://images.unsplash.com/photo-1549473889-14f410d83298?w=1800&q=80&fit=crop") !important;
                        background-size: cover !important;
                        background-position: center !important;
                        background-attachment: fixed !important;
                    }
                    /* Ensure text is readable against the background */
                    .fi-main {
                        background: rgba(255, 255, 255, 0.6) !important; 
                        backdrop-filter: blur(10px);
                    }
                    .fi-sidebar {
                        background: rgba(255, 255, 255, 0.85) !important;
                        backdrop-filter: blur(16px);
                        -webkit-backdrop-filter: blur(16px);
                        border-right: 1px solid rgba(255,255,255,0.3) !important;
                    }
                    .fi-topbar {
                        background: rgba(255, 255, 255, 0.85) !important;
                        backdrop-filter: blur(16px);
                        -webkit-backdrop-filter: blur(16px);
                        border-bottom: 1px solid rgba(255,255,255,0.3) !important;
                    }
                    .fi-ta-content, .fi-fo-component-container, .fi-wi-stats-overview-stat {
                        background: rgba(255, 255, 255, 0.95) !important;
                        backdrop-filter: blur(10px);
                        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07) !important;
                        border: 1px solid rgba(255, 255, 255, 0.4) !important;
                        border-radius: 12px;
                    }
                    
                    /* Fix Inputs taking wrong colors */
                    .fi-input, select, textarea {
                        background-color: #ffffff !important;
                        color: #000000 !important;
                    }
                    .fi-input-wrapper {
                        background-color: #ffffff !important;
                    }

                    .dark body {
                        background-image: linear-gradient(rgba(13, 27, 62, 0.85), rgba(7, 17, 42, 0.95)), url("https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1800&q=80&fit=crop") !important;
                    }
                    .dark .fi-main {
                        background: rgba(13, 27, 62, 0.5) !important;
                    }
                    .dark .fi-sidebar, .dark .fi-topbar {
                        background: rgba(13, 27, 62, 0.8) !important;
                        border-color: rgba(255,255,255,0.05) !important;
                    }
                    .dark .fi-ta-content, .dark .fi-fo-component-container, .dark .fi-wi-stats-overview-stat {
                        background: rgba(13, 27, 62, 0.85) !important;
                        border: 1px solid rgba(255, 255, 255, 0.05) !important;
                    }
                    
                    /* Fix Inputs in Dark Mode */
                    .dark .fi-input, .dark select, .dark textarea {
                        background-color: rgba(0, 0, 0, 0.5) !important;
                        color: #ffffff !important;
                    }
                    .dark .fi-input-wrapper {
                        background-color: rgba(0, 0, 0, 0.5) !important;
                    }
                    .dark *, .dark .fi-ta-text-item, .dark span, .dark p, .dark label, .dark h1, .dark h2, .dark h3 {
                        text-shadow: 0 1px 3px rgba(0,0,0,0.5); /* enhance legibility */
                    }
                </style>')
            );
    }
}