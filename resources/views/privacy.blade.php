@extends('layouts.app')

@section('title', 'Gizlilik Politikası')

@section('content')
<div class="container py-4">
  <h2>Gizlilik Politikası</h2>
  <p>Bu uygulama, personel ve admin kullanıcılarının içerik ve takvim verilerini güvenli bir şekilde saklar.</p>

  <h3>Toplanan Bilgiler</h3>
  <ul>
    <li><strong>Kullanıcı Bilgileri:</strong> Ad, soyad, e-posta adresi, rol (admin/staff).</li>
    <li><strong>Oturum ve Aktivite:</strong> Kullanıcı giriş/çıkış zamanları, sayfa görüntüleme geçmişi.</li>
    <li><strong>İçerik Verileri:</strong> Staff üyeleri tarafından oluşturulan başlık ve içerik metinleri, planlanan yayın tarihleri.</li>
  </ul>

  <h3>Veri Kullanımı</h3>
  <p>Toplanan veriler:</p>
  <ul>
    <li>Yetkilendirme ve kimlik doğrulama işlemlerinde kullanılır.</li>
    <li>Admin’in personel içeriklerini görüntüleyebilmesi ve onaylayabilmesi için saklanır.</li>
    <li>Takvim verileri, staff üyelerinin toplantı ve notlarının yönetimi amacıyla depolanır.</li>
  </ul>

  <h3>Veri Saklama Süresi</h3>
  <p>Oturum verileri varsayılan olarak 120 dakika boyunca saklanır. Kullanıcı içerik ve takvim kayıtları, silinene kadar veritabanında tutulur.</p>

  <h3>Üçüncü Parti</h3>
  <p>Bu uygulama, kullanıcı verilerini üçüncü taraflarla paylaşmaz. E-posta gönderimleri Laravel’in <code>log</code> sürücüsü üzerinden test amaçlı kaydedilir.</p>

  <h3>İletişim</h3>
  <p>Gizlilik politikamızla ilgili sorularınız için <a href="mailto:hello@example.com">hello@example.com</a> adresine e-posta gönderebilirsiniz.</p>
</div>
@endsection
