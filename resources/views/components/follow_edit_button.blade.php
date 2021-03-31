<div>
    @unless(Auth::user()->is($user))

    <form method="POST" action="{{ $user->path('follow') }}">
        @csrf

        <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
            {{ (auth()->user()->following($user)) ? "Unfollow" : "Follow"}}
        </button>
    </form>
    @endunless

    @can('edit' , $user)


            <a href="{{ $user->path('edit') }}">
                <button type="submit"
                        class="bg-white rounded-full border hover:bg-gray-200  border-gray-600 shadow py-2 px-4 text-black-50 text-xs">
                    Edit profile
                </button>
            </a>

    @endcan
</div>
