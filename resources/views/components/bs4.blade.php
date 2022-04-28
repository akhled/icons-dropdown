@props(['name', 'icon' => null])

<div class="dropleft">
    <div class="dropdown"
        dir="ltr">
        <button class="btn btn-primary dropdown-toggle {{ $attributes }}"
            type="button"
            data-toggle="dropdown"
            aria-expanded="false">
            Select icon @if ($icon)
                @svg($icon, "ml-1" , ["style" => 'width: 16px'])
            @endif
        </button>

        <div class="dropdown-menu"
            onclick="event.stopPropagation()">
            @livewire('icons-dropdown', compact('name', 'icon'))
        </div>
    </div>
</div>
