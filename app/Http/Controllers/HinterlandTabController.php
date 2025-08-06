<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinterlandTab;
use Illuminate\Support\Facades\Auth;

class HinterlandTabController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tab_name' => 'required',
            'content' => 'nullable',
        ]);

        $region = auth()->user()->region;

        HinterlandTab::updateOrCreate(
            [
                'region' => $region,
                'tab_name' => $request->tab_name,
                'user_id' => Auth::id()
            ],
            [
                'content' => $request->content
            ]
        );

        return back()->with('success', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $tab = HinterlandTab::findOrFail($id);
        $this->authorize('update', $tab);
        return view('data-hinterland.edit-tab', compact('tab'));
    }
    public function update(Request $request, $id)
    {
        $tab = HinterlandTab::findOrFail($id);
        $this->authorize('update', $tab);
        $tab->update(['content' => $request->content]);

        if (auth()->user()->region !== $request->region) {
            abort(403, 'Anda tidak berhak menginput data untuk daerah ini.');
        }

        return back()->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $tab = HinterlandTab::findOrFail($id);
        $this->authorize('delete', $tab);
        $tab->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
