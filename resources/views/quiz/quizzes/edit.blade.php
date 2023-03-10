<x-app-layout>
    <section class="container-fluid flex flex-row">
        <x-menu-user></x-menu-user>
        <div class="container w-full   mx-auto px-2">
            <div class="w-full h-4/5 py-12 sm:px-6 lg:px-8 flex justify-center">
                <div class=" py-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1
                        class=" break-normal flex justify-center items-center text-2xl font-bold text-gray-800 dark:text-white">
                        Editar curso : {{ $quizzes->title }}</h1>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('quizzes.update', [$quizzes->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="flex flex-col">
                                    <label for="title">Título:</label>
                                    <x-text-input type="text" class="form-control" name="title"
                                        value="{{ $quizzes->title }}" placeholder="Digite um título.." />
                                </div>
                                <div class="flex flex-col">
                                    <label for="module">{{ __('Esse quiz é de qual módulo?') }}</label>
                                    <select name="module">
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}">{{ $module->title }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="flex flex-col">
                                    <x-text-input type="submit" name="submit" value="Atualizar"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded cursor-pointer w-24 mt-4" />
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>


</x-app-layout>
