@if($contacts)
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Имя</th>
        <th scope="col">Номер</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr onclick="select({{ $contact->id }});" style="background-color: @if($contact->favorite) #8098e3 @endif">
            <th scope="row">{{ $contact->name }}</th>
            <td colspan="2">{{ $contact->phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
