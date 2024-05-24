@if ($errors->any())
    <ul class="list-unstyled mt-4">
        @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif
