@extends('admin.layout')

@section('title', 'Pengaturan — Privacy')

@section('content')

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h1>

    <div class="flex flex-col sm:flex-row gap-6 max-w-3xl">
        @include('admin.settings._tabs', ['active' => 'privacy'])

        <div class="flex-1 min-w-0 bg-white rounded-2xl border border-gray-100">
            <form method="POST" action="{{ route('admin.settings.update', 'privacy') }}">
                @csrf
                @method('PUT')

                <div class="grid sm:grid-cols-3 gap-4 p-6 items-start">
                    <label class="text-sm font-semibold text-gray-700 pt-2">URL Kebijakan Privasi</label>
                    <div class="sm:col-span-2">
                        <input type="url" name="privacy_policy_url" value="{{ old('privacy_policy_url', $setting->privacy_policy_url) }}" placeholder="https://socacuan.com/privacy"
                               class="w-full max-w-sm rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                        <p class="text-xs text-gray-400 mt-1.5">
                            Kalau diisi, tautan "Kebijakan Privasi" di footer blog akan mengarah ke URL ini.
                        </p>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-100">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
