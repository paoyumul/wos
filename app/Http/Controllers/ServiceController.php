<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Service::class);

        $services = Service::paginate(30);

        return inertia('Services/Index', [
            'data' => [
                'services' => $services->items(),
                'paginator' => $services,
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('create', Service::class);

        return inertia('Services/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Service::class);

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        Service::create($request->all());

        session()->flash('message', 'The service has been created.');

        return back();
    }

    public function edit(Service $service)
    {
        $this->authorize('update', $service);

        return inertia('Services/Edit', [
            'data' => [
                'service' => $service,
            ],
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        $service->update($request->all());

        session()->flash('message', 'The service has been updated.');

        return redirect()->route('admin.services.edit', $service->id);
    }

    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

        $service->delete();

        session()->flash('message', 'The service has been deleted.');

        return back();
    }
}
