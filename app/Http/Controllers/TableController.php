<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index() {
        $tables = Table::paginate(10); // Fetch tables with pagination
        return view('admin-dashboard.manage-table', compact('tables'));
    }

    public function create() {
        return view('admin-dashboard.add-table');
    }

    public function store(Request $request) {
        $request->validate([
            'table_number' => 'required|unique:tables',
            'capacity' => 'required|integer',
        ]);

        Table::create([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity
        ]);
        return redirect()->route('display-table')->with('success', 'Table added.');
    }

    public function edit(Table $table) {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table) {
        $request->validate([
            'table_number' => 'required|unique:tables,table_number,' . $table->id,
            'seating_capacity' => 'required|integer',
        ]);

        $table->update($request->all());
        return redirect()->route('tables.index')->with('success', 'Table updated.');
    }

    public function destroy($id) {
        $table = Table::find($id);
        if (!$table) {
            return redirect()->route('display-table')->with('error', 'Table not found.');
        }
        $table->delete();
        return redirect()->route('display-table')->with('success', 'Table deleted.');
    }
}
