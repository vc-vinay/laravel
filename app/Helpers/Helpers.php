<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('loggedUser')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function loggedUser()
    {
        return Auth::user();
    }
}

if (!function_exists('loggedUserDetails')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function loggedUserDetails($user)
    {
        $userData = [
            'id' => $user->id,
            'name' => $user->fullname,
            'email' => $user->email,
            'role' => $user->roles[0] ? $user->roles[0]['name'] : null
        ];

        return $userData;
    }
}

if (!function_exists('uploadFile')) {
    /**
     * @param $request
     * @param string $inputName
     * @param string $uploadPath
     * @param string $fileName
     * @param string $oldFileName
     *
     * @return array
     */
    function uploadFile($request, string $inputName, string $uploadPath, $fileName = '', $oldFileName = ''): array
    {
        $response = [];
        try {
            $file = $request->file($inputName);
            if (!empty($fileName)) {
                $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();
            } else {
                $fileName = time() . '.' . $file->getClientOriginalExtension();
            }
            $destinationPath = $uploadPath;
            if (!empty($oldFileName)) {
                deleteFile($destinationPath, $oldFileName);
            }

            Storage::disk('public')->put($destinationPath . '/' . $fileName, file_get_contents($file));

            $response = [
                'file_name' => $fileName,
                'uploaded_path' => $destinationPath,
            ];
        } catch (\Exception $ex) {
            Log::error($ex);
        }

        return $response;
    }
}

if (!function_exists('uploadImage')) {
    /**
     * @param $request
     * @param string $inputName
     * @param string $uploadPath
     * @param string $oldFileName
     *
     * @return array
     */
    function uploadImage($request, string $inputName, string $uploadPath, $oldFileName = ''): array
    {
        $image = $request->file($inputName);
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = $uploadPath;

        if (!empty($oldFileName)) {
            deleteFile($destinationPath, $oldFileName);
        }

        $resizeImage = \Image::make($image->getPathname());
        $resizeImage->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();
        Storage::disk('public')->put($destinationPath . '/small/' . $fileName, $resizeImage);


        $resizeImage = \Image::make($image->getPathname());
        $resizeImage->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();

        Storage::disk('public')->put($destinationPath . '/medium/' . $fileName, $resizeImage);

        $resizeImage = \Image::make($image->getPathname())->stream();
        Storage::disk('public')->put($destinationPath . '/' . $fileName, $resizeImage);

        return [
            'image_name' => $fileName,
            'uploaded_path' => $destinationPath,
        ];
    }
}

if (!function_exists('deleteFile')) {
    /**
     * @param string $destinationPath
     * @param string $oldFileName
     *
     * @return bool
     */
    function deleteFile(string $destinationPath, $oldFileName = ''): bool
    {
        Storage::disk('public')->delete($destinationPath . '/' . $oldFileName);
        Storage::disk('public')->delete($destinationPath . '/small/' . $oldFileName);
        Storage::disk('public')->delete($destinationPath . '/medium/' . $oldFileName);

        return true;
    }
}

if (!function_exists('deleteFolder')) {
    /**
     * @param string $destinationPath
     * @param $folderName
     *
     * @return bool
     */
    function deleteFolder(string $destinationPath, $folderName): bool
    {
        Storage::disk('public')->deleteDirectory($destinationPath . '/' . $folderName);

        return true;
    }
}

if (!function_exists('getImage')) {
    /**
     * @param string $imageName
     * @param string $basePath
     * @param string $size
     *
     * @return string
     */
    function getImage(string $imageName, $basePath = '', $size = ''): string
    {
        $destinationPath = $basePath;

        if (!empty($size)) {
            $destinationPath = $destinationPath . '/' . $size;
        }

        $filePath = asset('storage/' . $destinationPath . '/' . $imageName);

        if (Storage::disk('public')->exists($destinationPath . '/' . $imageName)) {
            return $filePath;
        }

        return '';
    }
}

if (!function_exists('getCompanies')) {
    /**
     *
     * @return array
     */
    function getCompanies(): array
    {
        $companies = Company::pluck('name', 'id')->toArray();
        
        return $companies;
    }
}
