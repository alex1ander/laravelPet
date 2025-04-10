@if(isset($users))
<div class="overflow-auto">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>IsAdmin</th>
                <th>planId</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата создания</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->isAdmin }}</td>
                    <td>{{ $user->planId }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif