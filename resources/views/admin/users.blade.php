<x-app-layout>
    <section class="container-fluid flex flex-row">
        <x-menu-user></x-menu-user>
        <div class="container w-full mx-auto px-2">
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                <a class="underline mx-2" href="https://datatables.net/"></a>
            </h1>
            <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="flex flex-row justify-between pb-3 ">
                    <h4 class="text-2xl font-bold text-gray-700 dark:text-white">
                        Listagem dos usuários</h4>
                    <a href="#"
                        class="w-32 inline-flex items-center px-3 py-2 mx-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      
                        <h1 class="pl-2 text-lg">Exportar</h1>

                    </a>
                </div>
                <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr class="">
                            <th class="text-center text-2xl">Nome</th>
                            <th class="text-center text-2xl ">Email</th>
                            <th class=" text-center text-2xl">Módulos concluídos</th>
                            <th class=" text-center text-2xl">Cursos concluídos</th>
                            <th class=" text-center text-2xl">Quiz concluídos</th>
                            <th class=" text-center text-2xl">Permissão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border border-black/40">
                                <th class="text-center">
                                    {{ $user->name}} </th>

                               {{--  <td class="text-center hover:text-sky-800"><a
                                        href="{{ route('modules.show', $module->id) }}"> Ver
                                        cursos</a></th> --}}
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->subscriptions->count() }}</td>
                                <td class="text-center">{{ $user->subscriptionsCourses->count() }}</td>
                                <td class="text-center">{{ $user->subscriptionsQuizzes->count() }}</td>
                                @if ($user->is_admin == 1)
                                <td class="text-center">Admin</td>
                                @else
                                <td class="text-center">Aluno</td>
                                @endif

                                <th class="flex flex-row justify-center gap-2"">
                                    <a href="{{-- {{ route('modules.edit', [$module->id]) }} --}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 fill-blue-300"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                    <form action="{{-- {{ route('modules.destroy', $module->id) }} --}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6 fill-blue-400 " x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </th>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
