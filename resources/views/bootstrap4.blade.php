<div dir="ltr">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle"
            type="button"
            data-toggle="dropdown"
            aria-expanded="false">
            Select icon
        </button>

        <div class="dropdown-menu"
            onclick="event.stopPropagation()">
            <div class="dropdown-header d-flex justify-content-between align-items-center p-2">
                <input type="text"
                    class="form-control rounded-0 border-right-0"
                    placeholder="Search"
                    wire:model="filter">

                <select class="form-control w-50">
                    <option value="all">ALL</option>
                    @foreach ($names as $index => $name)
                        <option value="{{ $index }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="dropdown-divider"></div>

            <div class="row">

            </div>
        </div>
    </div>
</div>
