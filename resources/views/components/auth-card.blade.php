<div class="flex w-full h-screen">

    
    <div class="min-h-screen w-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            {{ $logo }}
        </div>
        
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

    </div>
    <div class="bg-sky-400 w-5/12 h-scren text-center flex flex-col justify-center items-center">
        <h1 class="text-white mb-6 text-5xl ">Estude Libras</h1>
        <p class="text-white pt-3 ">Crie uma conta gratuitamente para ter acesso a todos os cursos</p>
        
        <a class="text-sky-400 m-2 px-3 py-2 bg-white font-extrabold drop-shadow-xl rounded-xl" href="{{ route('register') }}">Cadastrar-se</a>
    </div>
</div>
