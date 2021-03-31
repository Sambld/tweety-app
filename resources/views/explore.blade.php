<x-app>

    @foreach($users as  $user)

        <div class="flex items-center mb-5">

            <a href="{{ $user->path() }}"><img src="{{ $user->getAvatarAttribute() }}" width="50px" alt="avatar" class="pr-4"></a>
            <a href="{{ $user->path() }}">  <p>{{ $user->name }}</p></a>
        </div>

    @endforeach
    <div>
        {{ $users->links() }}
    </div>

</x-app>
