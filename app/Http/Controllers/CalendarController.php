<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    
    public function index(Request $request)// Takvim ana sayfasını gösterir  Calisan icin
    {
        if (!session('id')||session('role'!=='staff')) // Kullanici id si yoksa veya staff degilse , login sayfasina yonlendir 
        {
            return redirect('auth.login');
        }
        $appointments=DB::table('appointments') // appointments tablosundaki kullniciya ait randevulari goster
        ->where('staff_id',session('id'))
        ->orderBy('date','asc') // randevulari tarihe gore artan sekilde siralama icin kullanilir ( en eski en ustte yani)
        ->get();

        return view('calendar.index',compact('appointments')); // appointments verisinin calendar.index e gonderir 
        // eger return view('calendar.index') appointmetns degiskeni olmaz ve daha sonra randevulari kullaniminda sorun olamamasi icin 
    }
    public function staffDeleteAppointments(Request $request)
    {
       if (!session('id') || session('role') !== 'staff') 
       {
          return redirect('auth.login');
       }
       
     $deleted = DB::table('appointments')
        ->where('id', $id)
        ->where('staff_id', session('id')) // sadece kendi randevusu
        ->delete();

        
    if (!$deleted) 
    {
        return back()->with('error', 'Randevu silinemedi.');
    }
      
       return back()->with('success', 'Randevu başarıyla silindi.');

    }
    public function staffUpdateAppointmets(Request $request)
    {
       
    if (!session('id') || session('role') !== 'staff') 
    {
        return redirect('auth.login');
    }
      $updateData = $request->only(['title', 'notes', 'date']);

    $updated = DB::table('appointments')
        ->where('id', $id)
        ->where('staff_id', session('id')) // sadece kendi randevusu
        ->update($updateData);

    if (!$updated) {
        return back()->with('error', 'Randevu güncellenemedi.');
    }

    return back()->with('success', 'Randevu başarıyla güncellendi.');

    }

    public function all(Request $request) // admin icin tum takvimleri gorsun diye 
    {
        if (!session('id')|| session('role')!== 'admin')
        {
            return redirect('auth.login');
        }
        $appointments=DB::table('appointments') 
        ->join ('users','appointments.staff_id','=','users.id')  // users tablosunda bulunan staff_id ve id sutunlari eslesen kayitlari birlestirir
        ->select('appointments.*','users.name as staff_name') // appointments tablosundaki tum alanlari  ve kullanici adini sec
        ->orderBy('date','asc')
        ->get();

        return view ('calendar.index',compact('appointments'));
    }

    public function adminCalendarShow(Request $request)
    {
       if (!session('user_id') || session('role') !==  'admin') 
       {
         return redirect('auth.login');
       }
      $appointment= DB::table('appointments')->insert([
         'id'=>      Str::uuid(), 
         'staff_id' => session('id'),            // Oturumdaki kullanıcının id'sini (personel) ekle
         'title' => $request->input('title'),   // Formdan gelen başlık bilgisini al ve kaydet
         'notes' => $request->input('notes'),  // Formdan gelen not bilgisini al ve kaydet
         'date' => $request->input('date'),   // Formdan gelen tarih bilgisini al ve kaydet
      ]);
    }
    public function adminCalendarDelete(Request $request, $id)
    {
        if (!session('user_id') || session('role') !==  'admin') 
       {
         return redirect('auth.login');
       }
        DB::beginTransaction();  // Veritabanı işlemlerini topluca başlat
        try 
        {
          $delete= DB::table('appointments') 
           ->where('id',$id)   // silinecek randevunun id si
           ->delete();

          if (!$deleted) 
          {
            return back()->with('error', 'Randevu silinemedi.');
          }

        return back()->with('success', 'Randevu başarıyla silindi.');
        }
        catch(\Exception $e) // \ konmasinin sebebi konmazsa  Bulunduğun namespace’de bir Exception sınıfı varsa onu arar
        {
           return back()->with('error', 'Silme sırasında bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function adminCalendarUpdate(Request $request)
    {
        if (!session('id') || session('role') !== 'admin') 
        {
          return redirect('auth.login');
        }
        $updateData = $request->only(['title', 'notes', 'date']);

    try 
    {
        $updated = DB::table('appointments')
            ->where('id', $id)
            ->update($updateData);

        if (!$updated) {
            return back()->with('error', 'Randevu güncellenemedi.');
        }

        return back()->with('success', 'Randevu başarıyla güncellendi.');
    }
    catch (\Exception $e)
     {
        return back()->with('error', 'Güncelleme sırasında bir hata oluştu: ' . $e->getMessage());
     }
   }


}