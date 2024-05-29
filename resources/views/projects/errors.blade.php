@if ($errors->{$bag ?? 'default'}->any())
    <ul class="list-unstyled mt-4">
        @foreach ($errors->{$bag ?? 'default'}->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif
