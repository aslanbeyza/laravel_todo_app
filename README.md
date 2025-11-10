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

## Laravel Klasör Yapısı

### app Klasörü

App klasörü yönetim kısmı kod yazdığımız kısımdır. App kısmı en hard kod kısmıdır.

#### Http

Http kısmı var web apileri yönetiyoruz burada controller ile yönetiyoruz bunları tüm yeni oluşturacağımız controllerlar bu http içindeki controlleri referans almalıdır.

#### Models

Models var sınıflar.

### MVC (Model View Controller)

MVC model view controller demek.

### resources Klasörü

Resource içinde views var içinde de `welcome.blade.php` var bu da MVC deki view e karşılık gelir.

Biz php ile html yi manipüle edebiliyoruz. Laravel bunu bi adım ileri taşıyor fonksiyonalite ekliyor blade motoru ile yani uzantı artık `.blade.php` oluyor bu html i yönetmemizi sağlıyor.

Js klasörü var gene react falan kullanıyorsan js üzerinden ilerliyor. blade kodu yazmıyoruz js kodu yazıyoruz resource kısmı bu kadar.

### Providers

App içinde providers var provider servis sağlayıcı demek burda bi servise kayıt olabiliyoruz bir servisin instance kısmını oluşturabiliyoruz her şu sayfa açıldığında şu verileri yükle gibi de bi ayar yapılabilir.

### bootstrap Klasörü

Bootstrap kısmı var ayağa kaldırmak anlamında bu içinde cache var paketleri cache e alır. Bide service kısmı var `app.php` var application nin konfigürasyon ayarları var burda nerelerden root alacak nerelerden middleware alacak hatayı nasıl yönetecek şeklinde 3 tane konfigürasyon ayarı veriyor.

Mesela günlük mail gönder gibi bir komutu `console.php` ye yazarız yani bootstrap appservice provider ı yüklüyor biz kendimiz ek provider da oluşturabiliriz.

### config Klasörü

Config dosyası configürasyon ayarlarından bahsediyor. Mesela onda da `app.php` var application konfigürasyon ayarlarını döndürür adı application env dosyası şuan prod damı vs diyor.

#### auth.php

Auth php var yeni kapılar oluşturabiliyoruz bundan kasıt farklı farklı giriş yöntemleri gibi düşünebiliriz. Örneğin doktorun paneli ayrıdır. Hastane yöneticisinin paneli ayrıdır. Kayıt alan sekreterin paneli ayrıdır vs farklı panellere farklı kullanıcılar vs şeklinde yollar izlenebiliyor.

### database Klasörü

Database kısmı var sqlite şeklinde veritabanımız var dosya tipi veritabanı bu.

#### Migrations

Migrations var bunlar bizim sql tablolarımızdır ama bu sql tablolarını sql aracına gidip elimizle create table alter table vs demek yerine id primary key ... yazmak yerine burda bize migrationlar sunuyor laravel çok da fluent bir yazım tarzı var. Migrationlar oluşturarak tek seferde bütün veri tablolarını veritabanına gönderebiliyoruz silebiliyoruz yeni bişey ekleyebiliyoruz yazımı çok kolaylaştırıyor ve yönetimi de kolaylaştırıyor sql kısmına geçip yazı yazmak yerine migration oluştur.

#### Factories

Factories kısmı var birde factories zaten fabrika demek örneğin ben suni veri oluşturmak istediğimde test verileri yani oluşturmak istediğimde geliyorum userfactory kısmına ya da ne oluşturuyorsam todo oluşturuyorsam todofactory yazarım ismine geliyorum diyorum ki benim name sutunum vardı name sutunumda zorunlu bunun için bana fake isim oluştur gibi şeklinde factory kısmında suni verilerimi nasıl oluşturacağımı tanımlıyorum.

```php
'name' => fake()->name(),
```

#### Seeders

Seeder kısmında ise onu oluşturuyorum. Mesela:

```php
User::factory()->create([
    'name' => 'Test User',
    'email' => 'test@example.com',
]);
```

Mesela user demişim userdan factory fabrikasına bak nasıl oluşturmuş öğren ve create et ben bunu demedim bu varsayılan olarak geldi ismini test user oluşturmuş emailide test@example.com şeklinde oluşturmuş kendisi normalde fake bi isim oluşturuyor ama eğer biz yazarsak o ismi baskılamış oluruz ya da tamamen factory kısmına bırakıp factory kısmına da sayı girip örneğin `User::factory(10)->create();` örneğin 10 user oluşturabilirsin tek seferde bu gibi avantajı var.

### public Klasörü

Public kısmı var çalışma dosyalarımızı içeriyor. Tüm asset dosyalarımız burada bulunuyor yazılımda yeni ise sunucuyla alakalı bişey bu `.htaccess` kısmı yani public içinde `index.php` var ilk ona bakar public içinden php nin ilk çalıştırdığı dosyasıdır. `index.php` çalışınca da burdan git diyo bootstrap içinden `app.php` kısmını çalıştır. `app.php` de applicationı oluşturan dosyaydı sonrada providers kısmı çalışıyor. Böyle sıralı bir şekilde bi yapı var.

#### robots.txt

Robots.txt kısmında da sunucuya aldığınız zaman agentların yapay zekanın taramasını istediğiniz yerin ya da istemediğiniz kısmın sayfalarınızı yazıyosunuz robots kısmına bu da sunucuyla alakalı.

### routes Klasörü

Root kısmında da yazdığımız rootlar yönlendirmeler örneğin:

```php
Route::get('/', function () {
    return view('welcome');
});
```

Get isteği atınca `/` yazarak anasayfada bir view döndürmüş o da welcome'mış o da welcome.blade views içinde olan.

### storage Klasörü

Storage kısmı var public gibi erişilebilir değilde daha böyle erişmesini istemediğimiz ya da saklamak istediğimiz örneğin public kısmına attığımız herşey githuba giderken storage de kaydedilmez örneğin sitemizi yapmak için css ve js dosyalarına ihtiyacımız var diğer bu sistemi kullanan herkes için geçerli dimi evet o yüzden ben bunları public içinde assets klasörü oluşturup onun içine koyarım ve buan herkes erişir ve bunu githuba da atabilirim ama mesela ben bi uygulama geliştirdim uygulamama kullanıcılar kayıt olabiliyor ve kayıt olduğu zamanda profil fotosu yükleyebiliyorlar. Kendi profillerini oluşturuyorlar diyelim ben profil fotosunu kesinlikle public kısmına koymam çünkü o zaman kişinin verisi github reposuna gider. Hem yük hemde kullanıcı verisi neden açık bir kaynağa gitsin bunun storage kısmında olması lazım.

#### frameworks

Frameworks kısmı var bide cache alma session test kısımları saklanıyor.

#### logs

Logs kısmında da log dosyaları.

### tests Klasörü

Sonra testler var.

### vendor Klasörü

Vendor klasörü de storage klasörü gibi githuba atılmazlar daha doğrusu storage kısmında app içindeki public atılmaz hepsi değil yani log da atılmaz diye biliyorum.

Vendör bütün paketlerimizi içeriyor zaten bunları composer ile 2 sn de çekebiliyorum neden bunu githuba verip yük bindireyim bunun yerine composer indiriyoruz composer ile tüm dosyaları çekiyoruz nerden çekiyoruz `composer.json` dosyasından çekiyoruz. Composer `composer.json` bunu okur hangi paketlere ihtiyacımız var onu çeker.

### package.json

Package.json bu da var eğer vue ile react ile çalışsaydım burasınında dolu olduğunu görürdük.

### .env Dosyası

Env dosyanı kimse ile paylaşmamalısın app key kısmını da kimseyle paylaşmamalısın `php artisan key:generate` dediğin zaman yeni app key oluşturur env dosyasını atmayız ama `env.example` dosyasını atarız burda en temel konfigürasyonlar vardır kesinlikle app key boştur mesela şifreler boştur username kısımları boştur bu sayede karşı tarafa sen sadece bu formata uyacaksın diyoruz. Karşı tarafta example kısmını siler ve elinde bi tane env dosyası olur.

### artisan

Artisan var tüm artisan komutları ordan çalışır `php artisan` php artisan yapıyoruz ya onlar hepsi ordan çalışıyor.

### compose.yaml

Docker compose dosyası var o da sailin compose dosyası.

### vite.config.js

Vite.config.js burda da tailwind ayarı vite config ayarı vs yapıyor.

Dosya yapısı bu kadar.

## Veritabanı Migration İşlemleri

Şimdi de veritabanına tablolarımı oluşturarak kodlamaya başlayacağım. Önce databaseden migration kısımlarını yapalım ardından çıkalım ve app den model yapalım ordan sonra suni veri oluşturalım gibi ayrı ayrı commit alıcam ki kontrolü kolay olsun.

### Artisan Make Komutları

Terminale `php artisan make` yazınca hazır dosyaları oluşturabiliyoruz. Mesela migration oluşturacağım zaman ben `make:migration` yazarsam eğer bana hazır bir şablon veriyor. Gidip migrations klasörü altında dosya oluşturmak yerine bana migration kısmına uygun bir format veriyor ve ben o sayede de direk kodlamaya başlayabiliyorum.

**Örnek:**

```bash
php artisan make:migration create_categories_table
```

Şekilinde yaz genel olarak çoğul yaz isimlendirme önemli burada standartlara uymaya çalışın. Binding var Laravel'de arka tarafta kolayca buluyor Laravel varsayılanına.

### Migration Yapısı

`php artisan make:migration create_categories_table` bunu çalıştırınca hazır bir format verir bana. İçinde biri `up` dir biri de `down` dır.

- **up kısmı:** `php artisan migrate` diyerek tabloları veritabanına göndermemi sağlar
- **down kısmı:** `php artisan rollback` diyerek veritabanındaki tabloları silmemi sağlar

Tek başına silmesi için categories ile aynı isimde olması gerekiyor.

### Column Types

Laravel dokümantasyonunda database altında migration kısmına git biraz aşağı kaydırınca "Available Column Types" dicek. Kullanabileceğimiz sütunların veri tipleri gibi düşünebilirsin. Orda onlarca var onları okuyarak hangisi işine daha çok yarıyorsa onu kullanacaksın.

### Categories Tablosu

Ben şimdi gidip categories için migration kısmını oluşturucam up kısmını:

```php
public function up(): void
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('color')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
```

Oluşturdum şimdi. Bu up oluşturdun ya bunu veritabanına göndermek için de `php artisan migrate` yazarsın.

### Todos Tablosu

Şimdi de 2. tablomu oluşturucam `php artisan make:migration create_todos_table` yaptım. Up kısmını doldurucam şimdi:

```php
public function up(): void
{
    Schema::create('todos', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
        $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
        $table->enum('priority', ['low', 'medium', 'high'])->default('low');
        $table->date('due_date')->nullable(); // Tamamlama tarihi olarak gösterilecek kişi girecek
        $table->dateTime('completed_at')->nullable(); // Tamamlama tarihi olarak gösterilecek sistem tarafından otomatik olarak güncellenecek
        $table->softDeletes(); // Silinme tarihi olarak gösterilecek
        $table->timestamps();
    });
}
```

### Foreign Key ve Constrained

```php
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
```

Bu kısım `constrained` bu gidiyor foreignId verdiğin tabloya bağlıyor. Laravel geliyor `user_id` bunu alıyor diyor ki herkes standart isimlendirmeye uyarsa `user_id` nin ilk kısmı yani `user` sonra diyor ki eğer bu bir tablo ise `users` dir çünkü tablo isimleri çoğuldur. Sonra başına sonuna `create_users_table` ekliyor sonra bu şekilde bir arama yapıyor migrations kısmında. Sonra migration kısmını buluyor bulduktan sonra da ordaki `id` kısmına bakıyor ve `id` yi alıyor ve bunu SQL de bizim yaptığımız foreign key kısmında yaptığı bağlamayı yapmış oluyor. `constrained` kısmına kadar bunu yapıyor. İsimlendirme önemli bu yüzden.

### cascadeOnDelete

`cascadeOnDelete` kısmı da şu anlama gelir: Eğer siz bu todoyu oluşturan kullanıcıyı silerseniz kaydını silerse mesela bu online bi platform olsun herkes kendi todosunu oluştursun onun oluşturduğu todoların hepsini de otomatik olarak sil dersin bu sayede hata almaktan uzaklaşırsın.

Mesela kullanıcı paylaşımlar yapmış hesabını siliyor ama paylaşımı duruyor. Paylaşımı duruyorsa orda kaç yönetme şekli var:

1. **Birincisi cascadeOnDelete dir:** Yani kullanıcı hesabını silerse onun gönderilerini de sil ki insanlar gönderiyi görüp kullanıcıya ulaşmaya gittiklerinde hata olmasın bu birinci yöntemdir.

2. **İkinci yöntem de Reddit gibi:** Kullanıcı kaydını sildi tarzı bişey yapıyor ek fonksiyon oluşturuyor `cascadeOnDelete` yerine kullanıcı ile ilgili bilgileri getirme "silinmiş kullanıcı" yaz gibi bir yöntem de izliyor.

Ama biz kullanıcı verilerini siliyorsa todolarını da sil diyoruz.

### Soft Deletes

```php
$table->softDeletes(); // Silinme tarihi olarak gösterilecek
```

Bu `deleted_at` adında bir sütun oluşturuyor. Siz bir todoyu silince todoyu veritabanından direkt silmiyor. Direk silmek yerine `deleted_at` kısmına sil dediğiniz andaki tarihi yazıyor. Kullanıcıya göstermiyor arka planda bu şekilde bir kodu var kullanıcı onu görmüyor.

Büyük şirketlerin veritabanları bu şekilde çalışır çünkü o veriler birer ispat niteliğindedir veri niteliğindedir. O verileri işlemek için bizden izin alırlar. O verilerle ilgili sıkıntı çıkınca mahkemeye sunarlar. O yüzden hiçkimse verilerimizi silmez soft delete ile saklarlar.

Todoyu veritabanından direkt silmiyor. Neyse bu up kısmını oluşturduktan sonra `php artisan migrate` demen lazım. 

Database Client JDBC bunu kurdum birden fazla veritabanını açmama yarıyor.Bir sonraki kısımda bunu ele alıcam
