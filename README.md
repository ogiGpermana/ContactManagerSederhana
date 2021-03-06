## Contact Manager Sederhana

>>Halaman depan aplikasi pada saat dijalankan

![alt text](https://lh3.googleusercontent.com/Ox7Xjj0wBgQqs09qo4YyleZDS8mxN3PqexHp9N7A88n9cHmOuR-rxonohT3MjYmmvGk3P1GiAC1OQz9AfH6AUmcUKQTxCozoQlNoiyNn5ZW-Lyz6rBBNgscFPBpArTDLcgAs "Contact Manager")

>>Penambahan fitur pencarian berdasarkan grup, email, perusahaan dan nama autocomplete

![alt text](https://lh3.googleusercontent.com/919lGgh7qph0FRJX3f4YKRu0b7hoSbXvYBN4nz9Q1DhlQYBTBmSWOIFP5dlhUYcnLDa7qTjLuvRQye4iH7Id3sMECeN3GFS3sUvV4_Xohz3eTnDNeLpSPkusXGViF89vUJ0F "Contact Manager")

Aplikasi ini menggunakan library atau pustaka laravolt/avatar sebagai pengganti default foto, untuk konfigurasinya ada di dalam folder ``config/avatar.php``, kurang lebih filenya seperti dibawah ini:

```php
<?php
/*
 * Set specific configuration variables here
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    | Avatar use Intervention Image library to process image.
    | Meanwhile, Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */
    'driver'    => 'gd',

    // Whether all characters supplied must be replaced with their closest ASCII counterparts
    'ascii'    => true,

    // Image shape: circle or square
    'shape' => 'circle',

    // Image width, in pixel
    'width'    => 100,

    // Image height, in pixel
    'height'   => 100,

    // Number of characters used as initials. If name consists of single word, the first N character will be used
    'chars'    => 1,

    // font size
    'fontSize' => 48,

    // convert initial letter in uppercase
    'uppercase' => false,

    // Fonts used to render text.
    // If contains more than one fonts, randomly selected based on name supplied
    // You can provide absolute path, path relative to folder resources/laravolt/avatar/fonts/, or mixed.
    'fonts'    => ['OpenSans-Bold.ttf', 'rockwell.ttf'],

    // List of foreground colors to be used, randomly selected based on name supplied
    'foregrounds'   => [
        '#FFFFFF',
    ],

    // List of background colors to be used, randomly selected based on name supplied
    'backgrounds'   => [
        '#f44336',
        '#E91E63',
        '#9C27B0',
        '#673AB7',
        '#3F51B5',
        '#2196F3',
        '#03A9F4',
        '#00BCD4',
        '#009688',
        '#4CAF50',
        '#8BC34A',
        '#CDDC39',
        '#FFC107',
        '#FF9800',
        '#FF5722',
    ],

    'border'    => [
        'size'  => 1,

        // border color, available value are:
        // 'foreground' (same as foreground color)
        // 'background' (same as background color)
        // or any valid hex ('#aabbcc')
        'color' => 'foreground',
    ],
];
```
Tinggal disesuaikan dengan kebutuhan
