<x-master>
    <section class="px-8">
        <main class="py-4 container">

            <div class="container ">
                <div class="lg:flex justify-around">
                   
                        <div class="lg:w-32">
                            @include('_sidebar_links')
                        </div>




                        <div class="lg:flex-1" style="max-width: 700px">

                            {{ $slot }}

                        </div>

                        <div class="lg:w-1/6">
                            @include('_friends_list')
                        </div>
                

                </div>
            </div>

        </main>

    </section>
</x-master>
