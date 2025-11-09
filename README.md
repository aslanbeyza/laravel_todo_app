# Laravel Todo App

Sürekli `php artisan serve` demeyi tercih etmiyorum. Ben Docker ile kaldırıyorum ayağa projeyi. Docker ile kolayca projeyi ayağa kaldırmayı seviyorum. Taşıması da kolay oluyor aynı zamanda.

## Laravel Sail Kullanımı

O yüzden ben sail yazıyorum. Sail Laravel'in alt kütüphanesi. Sail ile tüm docker ayarlarını tek seferde yapabiliriz. Zaten dev ortamında indiriyorsunuz, sunucuya taşıyınca sizle birlikte gelmesine gerek yok.

### Kurulum

Projenin içinde iken:

```bash
composer require laravel/sail --dev
```

Bununla composer benim paketimi getiriyor. Ana GitHub reposundan indiriyor.

```bash
php artisan sail:install
```

Bu komut ise kuruyor onu.

### Çalıştırma

```bash
./vendor/bin/sail up
```

Bunu yazdığın zaman projen Docker üzerinden ayağa kalkacaktır.

```bash
./vendor/bin/sail up -d
```

Bu komut ile çalıştır artık. Şuan bu Docker üzerinden container üzerinden çalışıyor. `php artisan serve` dememe gerek kalmıyor. `sail up -d` biz bunu diyince o arka planda artisan serve yapıyor. O yüzden benim için ek bir zorunluluğa gerek kalmıyor burada.

## Erişim

Uygulama [http://localhost:8080](http://localhost:8080) adresinde çalışır.
