<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecordController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Record::class);

        if (auth()->user()->role === 'Admin') {
            $records = Record::with(['user'])
                ->paginate(30);
        } else {
            $records = Record::with(['user'])
                ->where('user_id', auth()->user()->id)
                ->paginate(30);
        }

        return inertia('Records/Index', [
            'data' => [
                'records' => $records->items(),
                'paginator' => $records,
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('create', Record::class);

        return inertia('Records/Create', [
            'data' => [
                'users' => User::orderBy('first_name', 'asc')->get(['id', 'first_name', 'last_name']),
            ],
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Record::class);

        $request->validate([
            'user_id' => 'required|numeric',
            'remarks' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $path = $request->file('file')->store('public/records');
        $request = new Request($request->all());
        $request->merge([
            'file' => $path,
        ]);
        Record::create($request->all());

        session()->flash('message', 'The record has been created.');

        return back();
    }

    public function edit(Record $record)
    {
        $this->authorize('update', $record);

        return inertia('Records/Edit', [
            'data' => [
                'record' => $record,
                'users' => User::orderBy('first_name', 'asc')->get(['id', 'first_name', 'last_name']),
            ],
        ]);
    }

    public function update(Request $request, Record $record)
    {
        $this->authorize('update', $record);

        $request->validate([
            'user_id' => 'required|numeric',
            'remarks' => 'required|string',
        ]);

        $record->update($request->all());

        session()->flash('message', 'The record has been updated.');

        return redirect()->route('admin.records.edit', $record->id);
    }

    public function destroy(Record $record)
    {
        $this->authorize('delete', $record);

        $record->delete();

        session()->flash('message', 'The record has been deleted.');

        return back();
    }
}
