@extends('layouts.test')

@section('content')
    <form class="mt-3"
          action="@if(isset($contact)){{ route('contacts.update', $contact->id) }}@else{{ route('contacts.store') }}@endif"
          method="post">
        @if(isset($contact))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Имя</label>
            <input type="text" id="name" name="name" class="form-control"
                   value="@if(isset($contact)){{ $contact->name }}@endif">
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Номер телефона</label>
            <input type="text" id="phone" name="phone" class="form-control"
                   value="@if(isset($contact)){{ $contact->phone }}@endif">
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-success" type="submit">@if(isset($contact))Изменить@elseДобавить@endif</button>
        </div>
    </form>
    @if(isset($contact))
        <form class="mt-3" action="{{ route('contacts.destroy', $contact->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить контакт</button>
        </form>
        <div class="mt-3 btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="favorite" @if($contact->favorite) checked @endif>
            <label class="btn btn-outline-primary" for="favorite"
                   onclick="favorite({{ $contact->id }})">Избранное</label>
        </div>
    @endif
@endsection

@section('script')
    <script>
        function favorite(id) {
            const favoriteRequest = new XMLHttpRequest();
            const favoriteUrl = "/contacts/" + id + "/favorite";
            favoriteRequest.open("POST", favoriteUrl, true);
            favoriteRequest.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            favoriteRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


            favoriteRequest.addEventListener("readystatechange", () => {
                if (favoriteRequest.readyState === 4 && favoriteRequest.status === 200) {
                    //console.log(favoriteRequest.responseText)
                    if (favoriteRequest.responseText == 'added') {
                        document.getElementById('favorite').setAttribute('checked', 'checked')
                    } else if(favoriteRequest.responseText == 'deleted') {
                        document.getElementById('favorite').removeAttribute('checked')
                    }
                }
            });

            favoriteRequest.send();
        }
    </script>
@endsection
