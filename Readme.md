# Activity Bike 10.28 Bike Road

Vajiralongkorndam ICT , Thong PhaPhum, Kanchanaburi
Using PHP 7.3.2, Developby using PHP Composer and Bootstrapped by Laravel Framework

### Developling

-   เนื่องจากระบบนี้ถูก Export ออกเป็น production mode แล้ว ผู้ใช้สามารถใช้ หรือ พัฒนาระบบต่อได้เลย เพียงเปิดเซิฟเวอร์ที่มี Apache Web Server, PHP 7.3.2 และ mysql หรือใช้ XAMPP ก็สามารถทำได้
-   กรณี clone หรือ save จาก GitHub นี้ไป มันจะไม่มีไฟล์ .env ให้ ให้สร้างไฟล์ ชื่อไฟล์ `.env` แล้วนำข้อมูลจากไฟล์ `.env.example` ไปใช้ ก่อนที่จะใส่ชื่อ Database Username Password ให้ถูกต้อง
-   ในกรณีที่จะพัฒนาแอพพลิเคชั่นบน Framework Laravel บนคอมพิวเตอร์เครื่องอื่น ๆ โปรเจกต์อื่น ๆ ให้ติดตั้ง [Composer](https://getcomposer.org) แพคเกจแมนเนจเมนต์สำหรับ php และทำการติดตั้ง path ของ php ไปยังที่ที่ถูกต้อง `C://xampp/php`
    และทำการติดตั้ง PHP Framework Laravel ที่ [Laravel Docs](https://laravel.com/docs/)
-   ถ้าต้องการเปลี่ยน config เช่น เลือก Database ที่ใช้ ชื่อผู้ใช้ รหัสผ่านของ Database ให้แก้ไฟล์ .env
-   สำคัญมาก ทุกครั้งที่มีการแก้ไฟล์ `.env` ให้รันคำสั่ง `php artisan config:cache` และ `php artisan route:cache` บน Commandline ณ โฟลเดอร์ที่เก็บไฟล์ activity_bike นี้ทุกครั้ง เพื่อ Reset Cache มิเช่นนั้นเซิฟเวอร์จะเอาข้อมูลจาก .env ไฟล์เดิม

## Model-View-Controller

### View

การพัฒนาแอพพลิเคชั่น php โดยใช้ Laravel นี้ใช้หลักการของ Model-View-Controller โดยเราจะมี view สำหรับแสดงผล โดยใช้ blade template ซึ่งสามารถใช้ pure php แทนในการพัฒนาได้ แต่ blade template จะมีความสามารถที่สูงกว่า และคำสั่งที่ง่ายกว่า ดูรายละเอียดได้ที่ [Blade Template Docs](https://laravel.com/docs/5.8/blade) โดยไฟล์ view จะเก็บอยู่ใน `resources/views`

การนำข้อมูลจากตัวแปลต่าง ๆ มาใส่ หรือ echo php code จะใช้ `{{ $variable }}` จะมีผลเท่ากัน `echo $variable;` เป็นต้น ซึ่งจะใช้แบบใดก็ได้ แล้วแต่สะดวก

### Model

เราจะใช้วิธีการลิงค์ โดยการเขียนลิงค์แบบปกติคือ `<a href=""></a>` แต่เราจะใส่ลิงค์เป็นในรูปแบบ `<a href="{{url('/destinationlink')}} ">` โดยที่เราจะมาควบคุมว่าลิงค์แบบนี้ จะไปอยู่ที่ไหนที่ไฟล์ `routes/web.php` มีหลักการเขียนง่าย ๆ ทั้ง แบบ Method Get และ Post โดยเราจะใช้วิธีส่งลิงค์ไปที่ คอนโทรเลอร์ที่เราต้องการจะทำ@ชื่อฟังก์ชันใน Controller นั้น
ตัวอย่าง

    Route::get('/home/register', 'RegisterController@register');
    Route::post('/home/confirmreg','RegisterController@confirmRegister');

### Controller

ลักษณะการเขียนจะคล้าย ๆ Object Oriented-Programing เช่น Java, C# โดยมักจะเอาคำจาก C# มามากกว่า โดยไฟล์คอนโทรเลอร์จะอยู่ที่ `app/http/Controlles` โดยจะมี Controller หลักที่ระบบได้สร้างไว้ให้อยู่แล้วหนึ่งตัว ชื่อ controller.php และเราสามารถสร้างคอนโทรเลอร์เพิ่มได้ โดย extends จาก controller หลักไป โดย Syntax จะเริ่มต้นด้วย `<?php`
ต่อด้วยการประกาศ namespace ว่าตอนนี้เราอยู่ที่ไหน

    namespace App\Http\Controllers;

จากนั้น เราจะต้อง import ฟีเจอร์ หรือ สิ่งที่เราต้องการต่าง ๆ ผ่านทาง การใช้ use โดยหลัก ๆ เลยคือเราต้อง extends Controller หลัก จะต้องมีการ `use App\Http\Controllers\Controller;` ส่วนฟีเจอร์อื่น ๆ แล้วแต่เราจะเลือกใช้งาน เช่น

-   ถ้าเราต้องการใช้ Database

    use App\Http\Controllers\Controller;

-   ถ้าต้องการใช้ POST Method แล้วรับข้อมูลที่เป็น POST Method มา

    use Illuminate\Http\Request;

-   ถ้าต้องการทำการ รีไดเร็คหน้า

    use Illuminate\Support\Facades\Redirect;

-   ถ้าต้องการใช้ข้อมูลเกี่ยวกับ User ที่ล็อกอินอยู่ขนาดนี้

    use Illuminate\Support\Facades\Auth;

การเขียน controller จะเขียนเป็น class เช่น `class ViewController extends Controller {}` และข้างในจะเป็นฟังก์ชันต่าง ๆ มี privacy modifier เช่นเดียวกับ Java หรือ C# ก่อนจะจบด้วยการ return ทั้งการรีเทิร์น ค่ากลับไปยังฟังก์ชันที่เราเรียก การ return ให้ผู้ใช้กลับไปที่ view ที่เราต้องการ หรือ การ redirect โดยหลักการเขียนสิ่งต่าง ๆ ในฟังก์ชัน ใช้ภาษา php ทั้งหมด

    public function viewResult(){
        $regisData = DB::table('bike_register')->orderBy('id','ASC')->get();
        return view('view')->with('data',$regisData)
        ->with('describe',NULL);
    }

ตัวอย่างนี้เป็นการ Return view ไปยังหน้า describe ก็คือ `describe.blade.php` ซึ่งชื่อที่เราเขียนจะอ้างอิงจากตำแหน่ง /resource/views ถ้าหากเราสร้างโฟลเดอร์ และ เก็บ View ไว้ข้างใน เช่น สร้าง โฟลเดอร์ Frontpage มีไฟล์ `index.blade.php` เราก็จะต้องเขียน `return view('Frontpage.index');` ซึ่งการ Return ไปยัง view เราจะสามารถส่งค่าที่เราต้องการไปกับมันได้ โดยใช้ `->with('ชื่อตัวแปลใหม่',$ตัวแปลเดิม)` คือการส่งตัวแปลเดิม ให้มันไปถูกเรียกใช้ในหน้า View โดยเรากำหนดมันเป็นชื่อ ๆ หนึ่ง อาจจะเป็นชื่อเดียวกับตัวแปลเดิมก็ได้

## การดึงข้อมูลจาก Database

เราต้องทำการ use DB ตาม Syntax ที่ถูกต้องใน Controller ที่เราจะใช้ ฟีเจอร์ของ Database ก่อน จากนั้น เราจะต้องสร้างตัวแปลมาเก็บค่า

    $ตัวแปลเก็บค่า = DB::table('ชื่อตาราง')->get();

โดยกรณี `get()` จะนำข้อมูลทั้งหมดมาใช้ ที่มีเงื่อนไขที่เราต้องการ แต่ถ้าเราต้องการเพียงแค่ record เดียวที่มีเงื่อนไขที่เราต้องการให้เปลี่ยนเป็นใช้ `first()` เช่น

    $ตัวแปลเก็บค่า = DB::table('ชื่อตาราง')->first();

โดยก่อน method first() หรือ get() เราสามารถใส่ Attribute ของ MySQL ได้ตามที่เราต้องการเช่น `orderBy('id','DESC')`,`where('id',1)` , `where('id','<',5)` หรือจะเอาตัวแปลมาใช้ก็ได้ ถ้าตัวแปล หรือ ตัวเลขสามารถใส่ได้เลย(ตัวแปลมี `$` นำหน้าอยู่แล้ว) แต่ถ้าเป็นตัวอักษรต้องใส่ `' '` ครอบไว้

# Laravel Readme

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[British Software Development](https://www.britishsoftware.co)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   [UserInsights](https://userinsights.com)
-   [Fragrantica](https://www.fragrantica.com)
-   [SOFTonSOFA](https://softonsofa.com/)
-   [User10](https://user10.com)
-   [Soumettre.fr](https://soumettre.fr/)
-   [CodeBrisk](https://codebrisk.com)
-   [1Forge](https://1forge.com)
-   [TECPRESSO](https://tecpresso.co.jp/)
-   [Runtime Converter](http://runtimeconverter.com/)
-   [WebL'Agence](https://weblagence.com/)
-   [Invoice Ninja](https://www.invoiceninja.com)
-   [iMi digital](https://www.imi-digital.de/)
-   [Earthlink](https://www.earthlink.ro/)
-   [Steadfast Collective](https://steadfastcollective.com/)
-   [We Are The Robots Inc.](https://watr.mx/)
-   [Understand.io](https://www.understand.io/)
-   [Abdel Elrafa](https://abdelelrafa.com)
-   [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
