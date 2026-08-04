<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private const TABS = ['general', 'writing', 'reading', 'discussion', 'media', 'permalinks', 'privacy'];

    public function edit(string $tab = 'general')
    {
        abort_unless(in_array($tab, self::TABS), 404);

        $setting = Setting::current();
        $categories = Category::orderBy('name')->get();

        return view("admin.settings.{$tab}", compact('setting', 'categories'));
    }

    public function update(Request $request, string $tab = 'general')
    {
        abort_unless(in_array($tab, self::TABS), 404);

        $data = match ($tab) {
            'general' => $request->validate([
                'site_name' => ['required', 'string', 'max:255'],
                'tagline' => ['nullable', 'string', 'max:255'],
                'site_url' => ['nullable', 'url', 'max:255'],
                'admin_email' => ['nullable', 'email', 'max:255'],
                'site_icon' => ['nullable', 'url', 'max:255'],
            ]),
            'writing' => array_merge(
                $request->validate(['default_category_id' => ['nullable', 'exists:categories,id']]),
            ),
            'reading' => $request->validate([
                'posts_per_page' => ['required', 'integer', 'min:1', 'max:24'],
            ]),
            'discussion' => [
                'comments_enabled' => $request->boolean('comments_enabled'),
                'comments_require_approval' => $request->boolean('comments_require_approval'),
            ],
            'privacy' => $request->validate([
                'privacy_policy_url' => ['nullable', 'url', 'max:255'],
            ]),
            default => [],
        };

        Setting::current()->update($data);

        return back()->with('status', 'Pengaturan berhasil disimpan.');
    }
}
