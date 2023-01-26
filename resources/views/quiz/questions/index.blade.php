<x-app-layout>
    @if (Auth::user()->is_admin)
        <section class="flex flex-row">
            <x-menu></x-menu>
            <div class="">
                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-2x1 font-semibold leading-tigh py-2">Listagem dos cursos</h1>
                            <div class="w-full divide-y divide-gray-200">
                                <table class="w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider"
                                                scope="col">id</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider"
                                                scope="col" scope="col">Quiz</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider"
                                                scope="col" scope="col">Questão</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider"
                                                scope="col" scope="col">Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        @foreach ($questions as $questions)
                                            <tr class="">
                                                <th
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $questions->id }} </th>
                                                <th
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $questions->quiz->title }}</th>
                                                <th
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $questions->question }}</th>
                                                <th
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">

                                                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded"
                                                        href="{{ route('questions.edit', [$questions->id]) }}">Editar</a>

                                                    <form action="{{ route('questions.destroy', [$questions->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Deletar</button>
                                                    </form>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-app-layout>