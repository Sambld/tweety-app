<x-app>
    <p class="text-xl ">Edit Profile </p>
    <hr>
    <div class="container ">
        <form action="#" method="post">
            @csrf
            <div class="container align-middle">
                <div class="flex justify-around  username my-3">
                    <label class="text-lg" for="username">username</label>
                    <input value="{{ $user->username }}" class="p-2 ml-3 border rounded-xl border-gray-500 " type="text"
                           name="username" id="username ">


                </div>

                <div class=" flex justify-around  nname my-3">
                    <label class="text-lg" for="name">Name</label>
                    <input value="{{ $user->name }}" class="p-2 ml-3 border rounded-xl border-gray-500 " type="text"
                           name="name" id="name ">

                </div>

                <div class=" flex justify-around  email my-3">
                    <label class="text-lg" for="email">Email</label>
                    <input value="{{ $user->email }}" class="p-2 ml-3 border rounded-xl border-gray-500 " type="email"
                           name="email" id="email ">

                </div>


                <div class="pl-4 text-right">
                    <button class="p-3 border border-gray-600" type="submit">Save</button>

                </div>

            </div>

            @foreach($errors->all() as $error)
                <p class="text-xs text-red-600 my-3"> {{ $error }} </p>

            @endforeach

        </form>
        <hr class="my-4">

        <form action="{{$user->path('password')}}" method="post">
            @csrf
            <div class="container align-middle">
                <div class="flex justify-around   my-3">
                    <label class="text-lg" for="password">Password</label>
                    <input type="password" class="p-2 ml-3 border rounded-xl border-gray-500 "
                           name="password" id="password ">

                </div>
                <div class="pl-4 text-right">
                    <button class="p-3 border border-gray-600" type="submit">Save</button>

                </div>
            </div>
        </form>
        <hr class="my-4">

        <form action="{{$user->path('avatar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container align-middle">
                <div class="flex justify-around   my-3">
                    <label class="text-lg" for="avatar">Avatar</label>
                    <input type="file" class="p-2 ml-3 border rounded-xl border-gray-500 "
                           name="avatar" id="avatar " accept="image/*">
                    <img src="{{ $user->getAvatarAttribute() }}" alt="" width='50px'>

                </div>
                <div class="pl-4 text-right">
                    <button class="p-3 border border-gray-600" type="submit">Save</button>

                </div>
            </div>
        </form>
    </div>


</x-app>
