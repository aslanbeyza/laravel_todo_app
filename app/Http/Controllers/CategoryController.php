<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Tüm kategorileri listelemek için kullanılan fonksiyon
    public function index()
    {
        //önce verileri veritabanından çekelim model üzerinden
        $categories = Category::all();
        //sonra view dosyasını dönelim çünkü index.blade.php dosyasına göndericez bir html döndürmemiz lazım 
        return view('categories.index', compact('categories'));
    }

    //yeni kategori oluşturmak için kullanılan fonksiyon
    public function create() {}


    // herhangi bir html dönmez  direk veritabanına kaydeder.
    public function store(Request $request) {}
    //tek bir veriyi gösteriririz 
    public function show(Category $category) //Category $category demek bu Category modelinin category adında değişkenini istiyor bunu route kısmında {category} ile alıyoruz.
    {
        return view('categories.show', compact('category'));
    }

    //veriyi editleyebileceğimiz sayfayı gösteriririz formu 
    public function edit(Category $category) {}

    //formu doldurdular update dediler veritabanından günceller.
    public function update(Request $request, Category $category) {}

    //son olarakda o veriyi veritabanından siler 
    public function destroy(Category $category) {}
}
