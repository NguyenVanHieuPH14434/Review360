@switch(request()->route()->getName())
    @case('/home')
{{--        @vite(['resources/js/file.js'])--}}
        @break
@endswitch
