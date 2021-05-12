@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p class='error'>{{ $error }}</p>
    @endforeach    
@endif

@if (session('success'))
    <p class='success'>
        {{session('success')}}
    </p>
@endif

@if (session('error'))
    <p class='error'>
        {{session('error')}}
    </p>
@endif