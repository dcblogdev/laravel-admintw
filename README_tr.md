## Laravel AdminTW

> Versiyon 5'ten itibaren, AdminTW tamamen bir proje haline gelmiştir, bir paket yerine bir projedir. Eğer paket versiyonunu arıyorsanız, lütfen 4. sürümü kullanın.

Laravel AdminTW, Laravel Starter Kit | TALL admin temasıdır.

<p><img src="https://laraveladmintw.com/images/docsv5/settings-light.png"></p>

AdminTw, Laravel, Livewire ve Tailwind CSS üzerine inşa edilmiştir.

İçerir:
- 2FA (İki Faktörlü Kimlik Doğrulama)
- Denetim İzleri
- Sistem Ayarları
- Birden Fazla Kullanıcı
- Roller ve İzinler
- Testler

## Kurulum

1. Reposu klonlayın.

`.env.example` dosyasını `.env` olarak kopyalayın:

```
cp .env.example .env
```

`.env` dosyasına veritabanı ve e-posta ayarlarını yapın.

2. Komutu çalıştırın `composer install`
3. Komutu çalıştırın `npm install && npm run build`
4. Komutu çalıştırın `php artisan key:generate`
5. Komutu çalıştırın `php artisan storage:link`
6. Komutu çalıştırın `php artisan migrate --seed`
7. Komutu çalıştırın `php artisan serve`

Laravel AdminTW, kullanıcıların işletim sistemine bağlı olarak hem açık hem de koyu mod desteği sunar.

Blade ve Laravel Livewire bileşenleri, yaygın düzen / UI öğeleri için ve tam bir test seti (Pest PHP) sağlanmıştır.

## Dokümantasyon

Tam dökümantasyon için: [laraveladmintw.com](https://laraveladmintw.com)

## Topluluk

Bir Discord topluluğu mevcuttur. Yardım için uygun kanal üzerinden sorularınızı sorabilirsiniz: https://discord.gg/VYau8hgwrm

## Katkıda Bulunma

Katkılar hoş karşılanır ve tam olarak kredi verilir.

## Pull Requests

- **Davranıştaki herhangi bir değişikliği belgeleyin** - `readme.md`  ve diğer ilgili dokümantasyonların güncel tutulduğundan emin olun.

- **Bir özellik için bir pull request gönderin** - Birden fazla şey yapmak istiyorsanız, her biri için ayrı ayrı pull request gönderin.

## Güvenlik

Güvenlik ile ilgili bir sorun keşfederseniz, lütfen dave@dcblog.dev adresine e-posta gönderin, issue tracker yerine.

## Lisans

Laravel AdminTW, [MIT license](https://opensource.org/licenses/MIT) altında açık kaynaklı bir yazılımdır..
