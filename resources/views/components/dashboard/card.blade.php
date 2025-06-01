@props(['title', 'count' => 0, 'icon' => ''])

<div class="bg-white p-6 rounded-lg shadow flex items-center space-x-4">
    <div class="text-indigo-600 text-3xl">
        <i class="fas fa-{{ $icon }}"></i>
    </div>
    <div>
        <div class="text-xl font-semibold">{{ $title }}</div>
        <div class="text-2xl font-bold">{{ $count }}</div>
    </div>
</div>
