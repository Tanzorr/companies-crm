<form class="flex items-center" method="GET" action="{{ $action }}">
    @csrf
    @method('GET')
    <input
        type="text"
        class="border border-gray-300 p-2 rounded-l"
        placeholder="Search..."
        name="search"
        value="{{ $seachValue }}"
        id="search"
    />
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Submit</button>
</form>
