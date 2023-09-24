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
use Symfony\Component\Intl\Intl;

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
        
    }


    public function testAPI()
    {
        
    }
}