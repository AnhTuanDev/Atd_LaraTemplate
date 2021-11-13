<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function about() {
        $page = [
            'title' => 'Cùng trillfa mặc đẹp và cá tính mỗi ngày',
            'description' => 'Trillium là một loài hoa rất đẹp, gồm 3 cánh hoa tỏa ra thành một hình ngôi sao 3 cánh.
                Biểu tượng cho 3 tôn chỉ của thương hiệu Trillfa "Chất lượng - Thẩm Mỹ - Tinh Tế".',
            'content' => 'Trillium là một loài hoa rất đẹp, gồm 3 cánh hoa tỏa ra thành một hình ngôi sao 3 cánh.
                Biểu tượng cho 3 tôn chỉ của thương hiệu Trillfa "Chất lượng - Thẩm Mỹ - Tinh Tế".',
        ];
        return view('frontend.page', [ 'page' => $page ]);
    }

    public function contact() {
        $page = [
            'title' => 'Trillfa Liên hệ',
            'description' => 'Trillium là một loài hoa rất đẹp, gồm 3 cánh hoa tỏa ra thành một hình ngôi sao 3 cánh.
                Biểu tượng cho 3 tôn chỉ của thương hiệu Trillfa "Chất lượng - Thẩm Mỹ - Tinh Tế".',
            'content' => 'Trillium là một loài hoa rất đẹp, gồm 3 cánh hoa tỏa ra thành một hình ngôi sao 3 cánh.
                Biểu tượng cho 3 tôn chỉ của thương hiệu Trillfa "Chất lượng - Thẩm Mỹ - Tinh Tế".',
        ];
        return view('frontend.page', [ 'page' => $page ]);
    }
}
