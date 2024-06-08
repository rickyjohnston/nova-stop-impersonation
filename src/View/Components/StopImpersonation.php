<?php

namespace RickyJohnston\NovaStopImpersonation\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Laravel\Nova\Contracts\ImpersonatesUsers;

class StopImpersonation extends Component
{
    /**
     * Whether the component should be rendered
     */
    public function shouldRender(): bool
    {
        return app(ImpersonatesUsers::class)->impersonating(request())
            && in_array(app()->environment(), config('nova-stop-impersonation.environments'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('rickyjohnston::stop-impersonation');
    }
}
