<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Utils\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
    }

    public function create(): View
    {
    }

    public function store(Request $request): RedirectResponse
    {
    }

    public function show(int $id): View
    {
    }

    public function edit(int $id): View
    {
    }

    public function update(Request $request, int $id): RedirectResponse
    {
    }

    public function delete(int $id): RedirectResponse
    {
    }
}
