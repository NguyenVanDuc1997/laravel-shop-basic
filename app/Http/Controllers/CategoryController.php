<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $users = $this->userService->getAllUser();
        //lay data tu csdl
        $categories = [
            0 => ["id" => 1,
                "name" => "quần áo",
                "slug" => Str::slug("quần áo")],
            1 => ["id" => 2,
                "name" => "giầy dép",
                "slug" => Str::slug("giầy dép")]
        ];

        //truyen sang view hien thi
        return view('categories.list', compact('categories'));
    }
}
