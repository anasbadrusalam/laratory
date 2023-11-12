<?php

namespace App\Providers;

use App\Models\In;
use App\Models\InItem;
use App\Models\Out;
use App\Models\OutItem;
use App\Observers\InItemObserver;
use App\Observers\InObserver;
use App\Observers\OutItemObserver;
use App\Observers\OutObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        In::observe(InObserver::class);
        Out::observe(OutObserver::class);
        InItem::observe(InItemObserver::class);
        OutItem::observe(OutItemObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
