<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentSectionSetting;
use Illuminate\Http\Request;

class DocumentsSectionSettingController extends Controller
{
    public function index()
    {
        $sectionSetting = DocumentSectionSetting::first();
        return view('admin.documents_reports.section-setting', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000']
        ]);

        DocumentSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr()->success('Document Reports Section Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
