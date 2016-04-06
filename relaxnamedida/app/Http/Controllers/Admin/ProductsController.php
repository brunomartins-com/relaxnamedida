<?php
namespace App\Http\Controllers\Admin;

use App\Domains\Product;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class ProductsController extends Controller
{
    public $folder;

    public function __construct()
    {
        $this->folder = "assets/images/_upload/products/";
    }

    public function getIndex()
    {
        $products = Product::all();

        return view('admin.products.index')->with(compact('products'));
    }

    public function getAdd()
    {

        return view('admin.products.add');
    }

    public function postAdd(Request $request)
    {

        $this->validate($request, [
            'title'       => 'required|max:100',
            'description' => 'required',
            'urlBuy'      => 'required',
            'bigImage'    => 'required|image|mimes:png',
            'smallImage'  => 'required|image|mimes:png',
        ],
            [
                'title.required'       => 'Informe o nome do produto',
                'title.max'            => 'O nome do produto não pode passar de :max caracteres',
                'description.required' => 'Informe o endereço da bula',
                'bigImage.required'    => 'Envie a imagem grande do produto',
                'bigImage.image'       => 'Envie um formato de imagem válida',
                'bigImage.mimes'       => 'Formatos suportados: .png',
                'smallImage.required'  => 'Envie a imagem pequena do produto',
                'smallImage.image'     => 'Envie um formato de imagem válida',
                'smallImage.mimes'     => 'Formatos suportados: .png',
            ]);

        $product              = new Product();
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->urlBuy      = $request->urlBuy;

        //IMAGE
        $extension      = $request->smallImage->getClientOriginalExtension();
        $nameSmallImage = Carbon::now()->format('YmdHis') . "-small." . $extension;
        $smallImage     = Image::make($request->file('smallImage'));
        $smallImage->save($this->folder . $nameSmallImage);

        $product->smallImage = $nameSmallImage;

        $extension    = $request->bigImage->getClientOriginalExtension();
        $nameBigImage = Carbon::now()->format('YmdHis') . "-big." . $extension;
        $bigImage     = Image::make($request->file('bigImage'));
        $bigImage->save($this->folder . $nameBigImage);

        $product->bigImage = $nameBigImage;

        $product->save();

        $success = "Produto adicionado com sucesso.";

        return redirect(action('Admin\ProductsController@getIndex'))->with(compact('success'));

    }

    public function getEdit($productsId)
    {
        $imageDetails = [
            'folder' => $this->folder,
        ];

        $product = Product::find($productsId);

        return view('admin.products.edit')->with(compact('product', 'imageDetails'));
    }

    public function putEdit(Request $request)
    {

        $this->validate($request, [
            'title'       => 'required|max:100',
            'description' => 'required',
            'urlBuy'      => 'required',
            'bigImage'    => 'image|mimes:png',
            'smallImage'  => 'image|mimes:png',
        ],
            [
                'title.required'       => 'Informe o nome do produto',
                'title.max'            => 'O nome do produto não pode passar de :max caracteres',
                'description.required' => 'Informe o endereço da bula',
                'bigImage.image'       => 'Envie um formato de imagem válida',
                'bigImage.mimes'       => 'Formatos suportados: .png',
                'smallImage.image'     => 'Envie um formato de imagem válida',
                'smallImage.mimes'     => 'Formatos suportados: .png',
            ]
        );

        $product              = Product::find($request->id);
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->urlBuy      = $request->urlBuy;

        if ($request->smallImage) {
            //DELETE OLD IMAGE
            if ("" != $request->currentSmallImage) {
                if (File::exists($this->folder . $request->currentSmallImage)) {
                    File::delete($this->folder . $request->currentSmallImage);
                }
            }
            //IMAGE
            $extension      = $request->smallImage->getClientOriginalExtension();
            $nameSmallImage = Carbon::now()->format('YmdHis') . "-small." . $extension;
            $smallImage     = Image::make($request->file('smallImage'));
            $smallImage->save($this->folder . $nameSmallImage);

            $product->smallImage = $nameSmallImage;
        }
        if ($request->bigImage) {
            //DELETE OLD IMAGE
            if ("" != $request->currentBigImage) {
                if (File::exists($this->folder . $request->currentBigImage)) {
                    File::delete($this->folder . $request->currentBigImage);
                }
            }
            $extension    = $request->bigImage->getClientOriginalExtension();
            $nameBigImage = Carbon::now()->format('YmdHis') . "-big." . $extension;
            $bigImage     = Image::make($request->file('bigImage'));
            $bigImage->save($this->folder . $nameBigImage);

            $product->bigImage = $nameBigImage;
        }

        $product->save();

        $success = "Produto editado com sucesso";

        return redirect(action('Admin\ProductsController@getIndex'))->with(compact('success'));
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->get('productId'));
        if ("" != $request->smallImage) {
            if (File::exists($this->folder . $product->smallImage)) {
                File::delete($this->folder . $product->smallImage);
            }
        }
        if ("" != $request->bigImage) {
            if (File::exists($this->folder . $product->bigImage)) {
                File::delete($this->folder . $product->bigImage);
            }
        }

        $product->delete();

        $success = "Produto excluído com sucesso.";

        return redirect(action('Admin\ProductsController@getIndex'))->with(compact('success'));
    }

    public function getOrder()
    {
        $products = Product::orderBy('sortorder', 'ASC')->get();

        return view('admin.products.order')->with(compact('products'));
    }
}
