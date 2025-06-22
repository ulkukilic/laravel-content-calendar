@extends('layouts.app')

@section('title', 'Kullanım Şartları')

@section('content')
<div class="container py-4">
  <h2>Kullanım Şartları</h2>
  <p>Bu “Takvim & İçerik Yönetimi” uygulamasını kullanarak aşağıdaki şartları kabul etmiş olursunuz.</p>

  <h3>1. Kullanıcı Roller ve Yetkiler</h3>
  <ul>
    <li><strong>Admin:</strong> Tüm staff üyelerinin takvim ve içerik başlıklarını görüntüleyebilir, onay/reddet işlemi yapabilir.</li>
    <li><strong>Staff:</strong> Kendi takvimine toplantı ve not ekleyebilir; başlık/İçerik oluşturup admin onayına gönderebilir.</li>
  </ul>

  <h3>2. İçerik Onayı</h3>
  <p>Staff üyeleri tarafından oluşturulan içerikler, admin onayından geçene kadar yayınlanmaz. Reddedilen içerikler, staff’ın kendi düzenleme sayfasında “Reddedildi” olarak işaretlenir.</p>

  <h3>3. Sorumluluk Reddi</h3>
  <p>Uygulamadaki planlanan tarih ve içerik bilgilerinin doğruluğu tamamen kullanıcıların sorumluluğundadır. Yönetici ya da geliştirici ekip oluşabilecek veri kaybı veya hatalardan sorumlu tutulamaz.</p>

  <h3>4. Fesih ve Kısıtlama</h3>
  <p>Kurallara uymayan, diğer kullanıcıları rahatsız edici veya yasadışı nitelikte içerikler silinebilir ve kullanıcı hesabı kısıtlanabilir.</p>

  <h3>5. Değişiklikler</h3>
  <p>Bu kullanım şartları zaman zaman güncellenebilir. Güncellemeler bu sayfada yayımlandığında hemen geçerli olur.</p>

  <h3>6. İletişim</h3>
  <p>Şartlarla ilgili sorularınızı <a href="mailto:hello@example.com">hello@example.com</a> adresine iletebilirsiniz.</p>
</div>
@endsection
