<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $table = 'design';

    protected $fillable = ['backgroundColor', 'backgroundImage', 'backgroundStyle', 'sampleImage', 'backgroundGradientStartColor', 'backgroundGradientEndColor', 'backgroundGradientStyle', 'menuBackgroundColor', 'menuTextColor', 'linkColor', 'textColor', 'buttonBorderColor', 'buttonBackgroundColor', 'buttonTextColor', 'buttonBorder', 'themeName', 'group', 'headerColor'];

    public static $ui = [
        [
            'image' => 'classic_white.jpg',
            'caption' => 'Classic White',
            'group' => 1,
        ],
        [
            'image' => 'classic_black.jpg',
            'caption' => 'Classic Black',
            'group' => 2,
        ],
        [
            'image' => 'classic_bold.png',
            'caption' => 'Classic Bold',
            'group' => 3,
        ],
        [
            'image' => 'classic_swoosh.png',
            'caption' => 'Classic Swoosh',
            'group' => 4,
        ],
        [
            'image' => 'gradient.jpg',
            'caption' => 'Gradient',
            'group' => 5,
        ],
        [
            'image' => 'classic_latte.jpg',
            'caption' => 'Classic Latte',
            'group' => 6,
        ],
        [
            'image' => 'vcard_white.jpg',
            'caption' => 'Vcard White',
            'group' => 7,
        ],
        [
            'image' => 'vcard_black.png',
            'caption' => 'Vcard Black',
            'group' => 8,
        ],
        [
            'image' => 'vcard_white_oval.jpg',
            'caption' => 'Vcard White Oval',
            'group' => 9,
        ],
        [
            'image' => 'vcard_black_oval.png',
            'caption' => 'Vcard Black Oval',
            'group' => 10,
        ],
        [
            'image' => 'vcard_white_halo.jpg',
            'caption' => 'Vcard White Halo',
            'group' => 11,
        ],
        [
            'image' => 'vcard_black_halo.png',
            'caption' => 'Vcard Black Halo',
            'group' => 12,
        ],
    ];

}
