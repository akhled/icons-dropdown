<div>
    <div class="dropdown-header d-flex justify-content-start align-items-top p-2">
        <div class="position-relative w-100">
            <input type="text"
                class="form-control rounded-0 border-right-0"
                placeholder="Search"
                wire:model.debounce.500ms="filter">
            <small class="form-text text-muted">Displaying {{ count($this->icons) }} of {{ $resultCount }}</small>

            @include('icons-dropdown::partials.loading')
        </div>

        <select class="form-control w-50">
            <option value="all">ALL</option>
            @foreach ($names as $set => $n)
                <option value="{{ $set }}">{{ $n }}</option>
            @endforeach
        </select>
    </div>

    <div class="dropdown-divider mt-0"></div>

    <div class="pl-2 d-flex align-content-start gap-2 flex-wrap"
        style="height:200px; overflow-y: auto; width:473px">
        @foreach ($icons as $index => $i)
            <button class="btn  mr-2 mb-2 @if ($i == $icon) btn-primary @else btn-secondary @endif"
                type="button"
                wire:click="$set('icon', '{{ $i }}')">
                @svg($i, ['style' => 'width: 16px'])
            </button>
        @endforeach
    </div>

    <input type="hidden"
        name="{{ $name }}"
        value="{{ $icon }}">
</div>
