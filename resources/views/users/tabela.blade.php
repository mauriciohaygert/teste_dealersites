<table class="table table-sm table-dark mt-2">
    <thead>
      <tr>
        <th scope="col"><a id="nome_ordena" href="#">Nome <span><i class="fas fa-sort-alpha-down"></i></span></a> </th>
        <th scope="col">Email</th>
        <th scope="col">Logins</th>
        <th scope="col">Situação</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->user_access_count }}</td>
        <td>{{ $user->active }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}

