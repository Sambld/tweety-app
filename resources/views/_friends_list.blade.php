<h3 class="font-bold text-xl mb-4">Friends</h3>

<ul>

    @forelse (auth()->user()->follows as $user)

        <li class="mb-3">
            <div class="flex items-center text-sm">
                <img class="rounded-full" width="40" src="{{ $user->getAvatarAttribute() }}" alt="avatar">
              <a href="{{ $user->path() }}"><p class="ml-2 "> {{ $user->name }}</p></a>
            </div>
        </li>
    @empty
        <p class="text-xl">no friends yet</p>
    @endforelse


</ul>
