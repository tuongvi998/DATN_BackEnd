<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RegisterPosition;
use Faker\Generator as Faker;

$factory->define(RegisterPosition::class, function (Faker $faker) {
    $image =  [
        'https://hinhnendephd.com/wp-content/uploads/2019/10/anh-avatar-dep.jpg',
        'https://cdn3.iconfinder.com/data/icons/toolbar-people/512/user_api_man_male_profile_account_person-512.png',
        'https://i.pinimg.com/236x/c0/a9/87/c0a9877ece3ebc2c61e4db958a6df21c.jpg',
        'https://cdn1.iconfinder.com/data/icons/avatar-97/32/avatar-02-512.png',
        'https://cdn.iconscout.com/icon/free/png-512/avatar-369-456321.png',
        'https://www.mi2.com.vn/en/wp-content/uploads/sites/2/2017/02/person.png',
        'https://westox.vn/Content/images/avatar-512.png',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJl0MB63ffkDzS23TC-vDvhn7WCNhQn1ujVg&usqp=CAU',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqmaWr2psZLOnm_I46vs7hNqVsXsUPQWe_sQ&usqp=CAU',
        'https://theme.hstatic.net/200000135809/1000590917/14/htesti_cus_ava2.jpg?v=284',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4zAaym587ek3M-GZKQheIWC21zPBzK8V8Tg&usqp=CAU',
    ];
    $imagePath = function () use ($image) {
        $url = $image[array_rand($image)];
        $filename = Str::random(4).'.png';
        $file = file_get_contents($url);
        $random_name = Str::random(5);
        $name = Storage::disk('local')->getAdapter()->applyPathPrefix($random_name);
        file_put_contents($name, fopen($url, 'r'));
        $path = Storage::disk('s3')->putFileAs('', $name, Str::random(9).'.png');
        Storage::disk('local')->delete($random_name);
        return $path;
    };
    return [
        'image' => $imagePath
    ];
});
