<?php 

namespace App\Helpers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class  helper  {
    
    
public static function compressImage($path, $imagename, Request $request, $existingImageName = null): string
{
    try {
        // Retrieve the image file from the request
        $image = $request->file($imagename);
        if (!$image || !$image->isValid()) {
            throw new \Exception('Invalid image file');
        }

        // Get image size in MB
        $imageSizeInMB = round($image->getSize() / (1024 * 1024), 2);

        // Determine compression format and quality
        if ($imageSizeInMB < 1) {
            $newExtension = 'jpg'; 
            $quality = 85; 
        } elseif ($imageSizeInMB < 5) {
            $newExtension = 'png';
            $quality = 75; 
        } else {
            $newExtension = 'webp'; 
            $quality = 65; 
        }

        // Generate new image name with timestamp
        $time = date("ymhis");
        $newImageName = $time . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $newExtension;
        $destinationPath = public_path($path . '/' . $newImageName);

        // Resize large images before compression (example: width > 2000px)
        $img = Image::make($image->getRealPath());
        if ($img->width() > 2000) {
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Save compressed image with determined quality
        $img->save($destinationPath, $quality);

        // Free up memory
        $img->destroy();

        // Remove old image if provided
        if ($existingImageName) {
            $oldImagePath = public_path($path . '/' . $existingImageName);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Remove the old image
            }
        }

        // Return the new image name
        return basename($destinationPath);
    } catch (\Exception $e) {
        // Handle exceptions and logging for debugging
        \Log::error('Image compression failed: ' . $e->getMessage());
        return 'Error during image compression';
    }
}

 
public static function compressMultipleImages($path, $imagename, Request $request, $existingImageNamesJson = null): string
{
   
    $existingImageNames = $existingImageNamesJson ? json_decode($existingImageNamesJson, true) : [];

    $uploadedImageNames = [];

    foreach ($request->file($imagename) as $index => $image) {
        $imageSizeInMB = round($image->getSize() / (1024 * 1024), 2);

        if ($imageSizeInMB < 1) {
            $newExtension = 'jpg';
            $quality = 85;
        } elseif ($imageSizeInMB < 5) {
            $newExtension = 'png';
            $quality = 75;
        } else {
            $newExtension = 'webp';
            $quality = 65;
        }

        $time = date("ymhis");
        $newImageName = $time . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $newExtension;
        $destinationPath = public_path($path . '/' . $newImageName);

        $img = Image::make($image->getRealPath());
        $img->save($destinationPath, $quality);

        $uploadedImageNames[] = $newImageName;

        if (isset($existingImageNames[$index]) && $existingImageNames[$index]) {
            $oldImagePath = public_path($path . '/' . $existingImageNames[$index]);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); 
            }
        }
    }

    return json_encode($uploadedImageNames);
}


 
 
}


