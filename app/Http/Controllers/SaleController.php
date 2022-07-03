<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Sale::class);

        $sales = Sale::query()
            ->with(['user', 'service'])
            ->when($request->date_from, function (Builder $query, $dateFrom) {
                $query->where('date', '>=', $dateFrom);
            })
            ->when($request->date_to, function (Builder $query, $dateTo) {
                $query->where('date', '>=', $dateTo);
            })
            ->paginate(30)
            ->withQueryString();

        return inertia('Sales/Index', [
            'data' => [
                'sales' => $sales->items(),
                'paginator' => $sales,
                'total_amount' => $sales->sum('amount'),
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
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
