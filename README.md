Sürekli `php artisan serve` demeyi tercih etmiyorum. Ben Docker ile kaldırıyorum ayağa projeyi. Docker ile kolayca projeyi ayağa kaldırmayı seviyorum. Taşıması da kolay oluyor aynı zamanda.

O yüzden ben sail yazıyorum. Sail Laravel'in alt kütüphanesi. Sail ile tüm docker ayarlarını tek seferde yapabiliriz. Zaten dev ortamında indiriyorsunuz, sunucuya taşıyınca sizle birlikte gelmesine gerek yok. Projenin içinde iken `composer require laravel/sail --dev` yüklüyorum. Bununla composer benim paketimi getiriyor. Ana GitHub reposundan indiriyor. `php artisan sail:install` ise kuruyor onu. `./vendor/bin/sail up` bunu yazdığın zaman projen Docker üzerinden ayağa kalkacaktır. `sail up -d` ile çalıştır artık. Şuan bu Docker üzerinden container üzerinden çalışıyor. `php artisan serve` dememe gerek kalmıyor. `sail up -d` biz bunu diyince o arka planda artisan serve yapıyor. O yüzden benim için ek bir zorunluluğa gerek kalmıyor burada.

Uygulama http://localhost:8080 adresinde çalışır.
