<x-app-layout>
    <div class="container-fluid flex flex-row ">
        <div class="">
            <x-menu-user></x-menu-user>
        </div>
        <div class="h-screen w-full ">
            <div class="flex justify-center max-screen  mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  w-4/6 overflow-hidden shadow-sm sm:rounded-lg my-20 py-8 px-24 ">
                    <div class="p-6 sm:p-0 border-gray-200">
                        <h4 class="text-2xl font-bold text-gray-700 pb-8 dark:text-white">
                            Edição do Módulo</h4>
                        <form action="{{ route('courses.update', $course->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class=" mb-6 ">
                                <div>
                                    <label for="title"
                                        class="block mb-1 text-lg font-medium text-gray-900 dark:text-white">{{ __('Título') }}</label>
                                    <input type="text" name="titulo" value="{{ old('titulo', $course->titulo) }}"
                                        class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="topico"
                                        class="block mb-1 text-lg font-medium text-gray-900 dark:text-white">{{ __('Tópico') }}</label>
                                    <input type="text" name="topico" value="{{ old('topico', $course->topico) }}"
                                        class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="embed"
                                        class="block mb-1 text-lg font-medium text-gray-900 dark:text-white">{{ __('Embed') }}</label>
                                    <input type="text" name="embed" value="{{ old('embed', $course->embed) }}"
                                        class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="descricao"
                                        class="block mb-1 text-lg font-medium text-gray-900 dark:text-white">{{ __('Descrição') }}</label>
                                    <input type="text" name="descricao"
                                        value="{{ old('descricao', $course->descricao) }}"
                                        class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="moduleId"
                                        class="block mb-1 text-lg font-medium text-gray-900 dark:text-white">{{ __('De qual módulo é esse curso?') }}</label>
                                    <select name="moduleId">
                                        @foreach ($modules as $module)
                                            <option value={{ $module->id }}>{{ $module->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end ">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
