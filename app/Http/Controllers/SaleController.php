<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Sale::class);

        $sales = Sale::with(['user', 'service'])->paginate(30);

        return inertia('Sales/Index', [
            'data' => [
                'sales' => $sales->items(),
                'paginator' => $sales,
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('create', Sale::class);

        return inertia('Sales/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Sale::class);

        $request->validate([
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        Sale::create($request->all());

        session()->flash('message', 'The sale has been created.');

        return back();
    }

    public function edit(Sale $sale)
    {
        $this->authorize('update', $sale);

        return inertia('Sales/Edit', [
            'data' => [
                'sale' => $sale,
            ],
        ]);
    }

    public function update(Request $request, Sale $sale)
    {
        $this->authorize('update', $sale);

        $request->validate([
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $sale->update($request->all());

        session()->flash('message', 'The sale has been updated.');

        return redirect()->route('admin.sales.edit', $sale->id);
    }

    public function destroy(Sale $sale)
    {
        $this->authorize('delete', $sale);

        $sale->delete();

        session()->flash('message', 'The sale has been deleted.');

        return back();
    }
}
