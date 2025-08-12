<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinterlandTab;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class HinterlandTabController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tab_name' => 'required',
            'content' => 'nullable',
        ]);

        $region = auth()->user()->region;
        // $content = Purifier::clean($request->input('content'), 'ckeditor_full');

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
        // $content = Purifier::clean($request->input('content'), 'ckeditor_full');
        $tab = HinterlandTab::findOrFail($id);
        $this->authorize('update', $tab);
        $tab->update(['content' => $request->content]);

        if (auth()->user()->region !== $request->region && auth()->user()->region !== 'root') {
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
    // public function uploadImage(Request $request)
    // {
    //     $request->validate(['upload' => ['required', 'image', 'max:5120']]);

    //     $path = $request->file('upload')->store('uploads', 'public');

    //     // Format A (sederhana, sudah didukung CKEditor 5)
    //     return response()->json([
    //         'url' => asset('storage/' . $path),
    //     ]);

    //     // --- Atau --- //

    //     // Format B (dengan 'urls.default')
    //     // return response()->json([
    //     //   'urls' => ['default' => asset('storage/'.$path)]
    //     // ]);
    // }
}
