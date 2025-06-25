<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
   public function index(Request $request) // Blog yazilarini listele staff
    {
       if (!session('id')) 
        {
            return redirect()->route('login.form');
        }
        if(session('role')== 'admin')
        {
            $blogs=DB::table('contents')
            ->join('categories', 'contents.category_id', '=', 'categories.id') // Kategori bilgisini ekle
            ->join('users', 'contents.staff_id', '=', 'users.id') // İçeriği ekleyen kullanıcı bilgisini ekle
            ->select(
            'contents.*', // İçeriğin tüm alanları
            'categories.name as category_name', // Kategori adı
            'users.name as staff_name' // Ekleyen personelin adı
            )
            ->orderBy('contents.created_at', 'desc') // Son eklenenler üstte
            ->get();
        }
        else
        {
            $blogs = DB::table('contents')
            ->join('categories', 'contents.category_id', '=', 'categories.id') // Kategori bilgisini ekle
            ->where('staff_id', session('id')) // Sadece kendi eklediği içerikler
            ->select(
                'contents.*',
                'categories.name as category_name'
            )
            ->orderBy('contents.created_at', 'desc')
            ->get();
        }
            return view('content.index', compact('blogs'));
    }
    // Yeni blog oluşturma formu
    public function create(Request $request)
    {
        if (!session('id') || session('role') !== 'staff') 
        {
           return redirect()->route('login.form');
        }
        
        // Eğer istek POST ise: Kaydetme işlemi yapar 
        if ($request->isMethod('post')) 
        {
            $request->validate([
                'title'        => 'required|string|max:200',
                'body'         => 'required|string',
                'category_id'  => 'required|exists:categories,id',
                'scheduled_at' => 'required|date'
            ]);
             DB::table('contents')->insert([
            'id'           => Str::uuid(), // Her içerik için benzersiz id
            'staff_id'     => session('id'), // Şu anda giriş yapan personelin id'si
            'category_id'  => $request->category_id, // Formdan gelen kategori id
            'title'        => $request->title, // Formdan gelen başlık
            'body'         => $request->body, // Formdan gelen içerik metni
            'scheduled_at' => $request->scheduled_at, // Yayınlanacağı tarih
            'status'       => 'pending', // Başlangıçta 'pending' (onay bekliyor)
        ]);
          return redirect()->route('content.index')->with('success', 'Blog yazınız onaya gönderildi!');
       }
         $categories = DB::table('categories')->get(); // Tüm kategorileri al
         return view('content.create', compact('categories'));
  }
    public function show ($id)
    {
         if (!session('id')) 
         {
            return redirect()->route('login.form');
         }
           $blog = DB::table('contents')  // contents tablosundaki verileri cekmeye basla 
             ->join('categories', 'contents.category_id', '=', 'categories.id') // icerigin kategorisini  ekle
             ->leftJoin('users', 'contents.staff_id', '=', 'users.id')  // icerigi ekleyen personelin biglgilerini ekle 
             ->where('contents.id', $id)
             ->select(
                'contents.*',
                'categories.name as category_name',
                'users.name as staff_name'
             )
             ->first();
         
             if (!$blog)
             {
                abot(404);
             }
             return view ('content.show' , compact('blog'));
    }
}