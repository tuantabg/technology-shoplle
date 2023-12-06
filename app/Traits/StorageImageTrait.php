<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait {
    public function storageTraitUpload($request, $fieldName, $forderName)
    {
        if ($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $filenameHas = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $forderName . '/' . auth()->id(), $filenameHas);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMultiple($file, $forderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $filenameHas = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $forderName . '/' . auth()->id(), $filenameHas);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];
        return $dataUploadTrait;
    }
}
