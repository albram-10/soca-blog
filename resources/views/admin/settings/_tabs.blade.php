@php
    $settingTabs = [
        'general' => 'General',
        'writing' => 'Writing',
        'reading' => 'Reading',
        'discussion' => 'Discussion',
        'media' => 'Media',
        'permalinks' => 'Permalinks',
        'privacy' => 'Privacy',
    ];
@endphp

<nav class="sm:w-40 shrink-0 flex sm:flex-col gap-1 overflow-x-auto text-sm">
    @foreach($settingTabs as $key => $label)
        <a href="{{ route('admin.settings.edit', $key) }}"
           class="px-3 py-2 rounded-lg whitespace-nowrap {{ ($active ?? '') === $key ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:bg-gray-100' }}">
            {{ $label }}
        </a>
    @endforeach
</nav>
