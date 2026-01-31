<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CkEditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate(['upload' => 'required|image|max:2048']);

        $dir = public_path('uploads/ckeditor');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file = $request->file('upload');
        $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);

        $url = asset('uploads/ckeditor/' . $name);

        if ($request->has('CKEditorFuncNum')) {
            $funcNum = $request->CKEditorFuncNum;
            return response("<script>window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', '');</script>")
                ->header('Content-Type', 'text/html');
        }

        return response()->json(['uploaded' => true, 'url' => $url]);
    }
}
