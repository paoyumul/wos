<?php

namespace App\Http\Middleware;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function share(Request $request): array
    {
        $props = array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'csrf_token' => csrf_token(),
            'announcement' => function () {
                return cache()->get('announcement');
            },
            'auth.user' => function () use ($request) {
                return $request->user()
                    ? $request->user()->only('id', 'first_name', 'last_name', 'email', 'role')
                    : null;
            },
            'flash' => [
                'message' => function () use ($request) {
                    return $request->session()->get('message');
                },
            ],
        ]);

        if (in_array(optional($request->route())->getName(), ['admin.sales.create', 'admin.sales.edit'])) {
            $props['clients'] = User::orderBy('first_name', 'asc')->get(['id', 'first_name', 'last_name']);
        }

        if (in_array(optional($request->route())->getName(), ['admin.sales.create', 'admin.sales.edit'])) {
            $props['services'] = Service::orderBy('name', 'asc')->get(['id', 'name', 'price']);
        }

        return $props;
    }
}
