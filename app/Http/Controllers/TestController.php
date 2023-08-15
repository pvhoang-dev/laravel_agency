<?php

namespace App\Http\Controllers;

use App\Enums\FileTypeEnum;
use App\Enums\PostStatusEnum;
use App\Models\Company;
use App\Models\File;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
private object $model;
private string $table;

    public function __construct()
    {
        $this->model = Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function test()
    {
        $columns = array();
        foreach(DB::select("SHOW COLUMNS FROM posts") as $column)
        {
            //print_r($column);
            $columns[] = $column->Field;
        }

        return $columns;
    }

    public function testAPI()
    {
        function authShop($partnerId, $partnerKey) {
            global $host;
            $path = "/api/v2/shop/auth_partner";
            $redirectUrl = "https://www.baidu.com/";

            $timest = time();
            $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
            $sign = hash_hmac('sha256', $baseString, $partnerKey);
            $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s", $host, $path, $partnerId, $timest, $sign, $redirectUrl);
            return $url;
        }

        $host="https://partner.shopeemobile.com";

        $partnerId = 847892;
        $partnerKey = "57615053704d6470644f554a78656d50484143644964436a5568777544524579";

        echo authShop($partnerId, $partnerKey);
    }
}
