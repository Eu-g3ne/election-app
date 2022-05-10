<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Models\Contract;
use App\Models\Registration;
use App\Observers\CandidateObserver;
use App\Observers\ContractObserver;
use App\Observers\RegistrationObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array<class-string, array<int, class-string>>
   */
  protected $listen = [
    Registered::class => [
      SendEmailVerificationNotification::class,
    ],
  ];
  protected $observers = [
    Candidate::class => [CandidateObserver::class],
    Contract::class => [ContractObserver::class],
    Registration::class => [RegistrationObserver::class],
  ];
  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  /**
   * Determine if events and listeners should be automatically discovered.
   *
   * @return bool
   */
  public function shouldDiscoverEvents()
  {
    return false;
  }
}
