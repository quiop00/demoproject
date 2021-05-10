<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // public function getSearch(Request $request)
    // {
    //     return view('searchajax');
    // }


    // function getSearchAjax(Request $request)
    // {
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data = DB::table('products')
    //         ->where('name_product', 'LIKE', "%{$query}%")
    //         ->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach($data as $row)
    //         {
    //            $output .= '
    //            <li><a href="data/'. $row->id .'">'.$row->name_product.'</a></li>
    //            ';
    //        }
    //        $output .= '</ul>';
    //        echo $output;
    //    }
    // }
    public function index()
    {
        $products = DB::table('products')->get();

        return view('searchad', compact('products'));
    }





    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = DB::table('products')
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->where('description', 'LIKE', '%' . $request->search2 . '%')
            ->where('price', 'LIKE', '%' . $request->search3 . '%')
            ->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>
                    <td>' . $product->id . '</td>
                    <td>' . $product->title . '</td>
                    <td>' . $product->description . '</td>
                    <td>' . $product->price . '</td>
                    </tr>';
                }
            }
            
            return Response($output);
        }
    }
}
