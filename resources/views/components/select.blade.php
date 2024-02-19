<div  {{ $attributes->merge(['class' => 'w-full h-100 relative inline-flex items-center px-3 py-2 bg-white border border-gray-300 text-sm leading-4 font-medium rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150']) }}>

        <select
            {{ $attributes->except('class') }}
            class="form-select block w-full leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
        >
            @foreach($options as $option)
                @if(isset($selected) && $selected == $option->id)
                    <option value="{{ $option->id }}" selected>{{ $option->name }}</option>
                @endif
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>

</div>
