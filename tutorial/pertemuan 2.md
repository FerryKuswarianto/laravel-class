# CRUD dalam Laravel

__Terlampir package untuk Sublime Text 3 (64bit)__
__Copy-paste & extract di:__ `C:\Users\NamaUser\AppData\Roaming\Sublime Text 3`

1. Buat model dengan perintah `php artisan make:model NamaModel`
    - otomatis membuat model
    - otomatis membuat migration
    - jangan lupa, jalankan perintah `php artisan migrate` untuk menerapkan perubahan ke database
    - untuk membatalkan perubahan, jalankan perintah `php artisan migrate:rollback`

2. Buat controller dengan perintah `php artisan make:controller NamaController`
    - file controller berada di folder `app/Http/Controller`
    - tips: manfaatkan function `compact` untuk melempar variabel dari controller ke view

3. Tambahkan route di file `app/Http/routes.php`
    - route sederhana tapi komplit menggunakan perintah
        `Route::resource('model', 'ModelController');`

4. Buat view di folder `resources/views`.
    - penamaan file: `nama_file.blade.php`
    - agar lebih mudah, gunakan package `watson/bootstrap-form`. dapat di-install dari composer
    - gunakan sintaks `blade` alih-alih sintaks `php native` untuk mempermudah komposisi view
        - contoh beberapa perintah blade:
        ```
            @extends('layouts.master')
            @include('folder.file')
            @section('main')
            {{ $nama }}
            @stop
        ```

    - atur struktur layout sesuka hati sehingga dapat di-reuse dengan baik:
        - contoh struktur direktori:
            - views
                - layouts
                    - master.blade.php
                    - reports-xyz.blade.php
                - partials
                    - header.blade.php
                    - footer.blade.php
                    - sidebar.blade.php
                - pages
                    - user
                        - create.blade.php
                        - edit.blade.php
                        - form.blade.php
                    - group
                        - create.blade.php
                        - edit.blade.php
                        - form.blade.php

# skema database

## user
- name
- email
- password

## group
- name

## group_user
- group_id
- user_id

### relasi
- 1 user bisa memiliki banyak group
- 1 group bisa memiliki banyak user
