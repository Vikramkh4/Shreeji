<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


   
class PdfController extends Controller
{
  


// public function generatepdf()
// {
// $products = Product::all(); // Fetch your products

// $data = [
//     'title' => 'Products List',
//     'date' => date('m/d/Y'),
//     'products' => $products,
// ];

// $pdf = PDF::loadView('generatepdf', $data)
         
//           ->setOptions([
//               'isRemoteEnabled' => true, // Add this line
//               'enable-javascript' => true,
//               'enable-local-file-access' => true,
//               'no-stop-slow-scripts' => true,
//               'javascript-delay' => 1000,
//           ]);

// return $pdf->download('products-list.pdf');

// }
public function pdfGeneration(Request $request) {
     $counts = $request->input('pageCount',0); 
    
    // Fetch all products from the database
     $start = $request->input('start', 0); // Default to 0
    $end = $request->input('end', 100);  // Default to 100

    // Fetch products based on the selected range
    $products = Product::skip($start)->take($end - $start)->get();


    // Prepare the data array
    $data = [
        'title' => 'Products List',
        'date' => date('m/d/Y'),
        'products' => $products,
        'count'=>$counts,
    ];

    // Generate the PDF using the 'pdf.pdf_view' view
    $pdf = PDF::loadView('pdf_convert', $data)
               ->setOptions([
                'defaultFont' => 'DejaVu Sans',
                    'isRemoteEnabled' => true, // Add this line
                    'enable-javascript' => true,
                    'enable-local-file-access' => true,
                    'no-stop-slow-scripts' => true,
                    'javascript-delay' => 1000,
                ]);
      
    // Return the generated PDF for download
    return $pdf->download('products_list.pdf');
}

    public function showUploadForm()
    {    $totalProducts = Product::count();
    return view('upload-pdf', ['pageCount' => $totalProducts]);
        
    }

    // Handle PDF upload
  public function uploadPdf(Request $request)
{
    $request->validate([
        'pdf' => 'required|mimes:pdf', // Validate file type and size
    ]);

    // Delete the entire PDF folder before uploading a new file
    $folderPath = 'products/pdf';

    if (Storage::disk('public')->exists($folderPath)) {
        Storage::disk('public')->deleteDirectory($folderPath); // Delete folder and its contents
    }

    // Specify the filename for the new file
    $filename = 'Shreeji.pdf';

    // Store the file with the specified name
    $filePath = $request->file('pdf')->storeAs($folderPath, $filename, 'public');

    return back()->with('success', 'PDF uploaded successfully!')->with('path', $filePath);
}

 public function downloadPdf($filename)
    {
        $filePath = 'products/pdf/' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }

        return abort(404, 'File not found');
    }
   
}
