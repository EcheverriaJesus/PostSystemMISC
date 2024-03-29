<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adeudos') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pt-4">
                <section class="container px-4 mx-auto">
                    <div class="flex flex-col lg:flex-row sm:justify-between pt-3">
                        <div>
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-lg font-medium text-gray-800">Lista de Adeudos</h2>
                                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">240 Deudores</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Personas que deben envase, credito, o algun objecto.</p>
                        </div>
                        <div class="flex mt-4 gap-x-3 justify-between">
                            <form action="{{ route('debt.search') }}" method="POST" class="hidden lg:flex relative items-center mt-4 md:mt-0">
                                @csrf
                                <span class="absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </span>
                    
                                <input name="searchDebts" type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5">
                            </form>
            
                            <a href="{{ route('product.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_3098_154395)">
                                    <path d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_3098_154395">
                                    <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <span>Importar</span>
                            </a>
                            <a href="{{ route('debt.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                
                                <span>Nuevo</span>
                            </a>
                        </div>
                        <form action="{{ route('debt.search') }}" method="POST" class="flex relative items-center mt-4 md:mt-0 lg:hidden">
                            @csrf
                            <span class="absolute">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                
                            <input name="searchDebts" type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5">
                        </form>
                    </div>
                
                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-100">
                                                    <div class="flex items-center gap-x-3">
                                                        Nombre
                                                    </div>
                                                </th>
                
                                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-100">
                                                    Descripción
                                                </th>
                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-green-300">
                                                    Dejó
                                                </th>
                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-cyan-300">
                                                    Resta
                                                </th>
                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-yellow-300">
                                                    Total
                                                </th>
                
                                                <td class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-100">
                                                    Registrado
                                                </td>
                                                <td class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-100">
                                                    Actualizado
                                                </td>
                                                <th scope="col" class="relative py-3.5 px-4">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($debts as $debt)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <h2 class="font-normal text-gray-800">{{ $debt->customer_name }}</h2>
                                                        {{-- <p class="text-xs font-normal text-gray-500">{{ $debt->description }}</p> --}}
                                                    </td>
                                                    <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                                        {{ $debt->description }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500">
                                                        $ {{ $debt->leave }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500">
                                                        $ {{ $debt->subtract }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500">
                                                        $ {{ $debt->total }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500">
                                                        {{ $debt->created_at }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500">
                                                        {{ $debt->updated_at }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            <button class="text-gray-500 transition-colors duration-200 hover:text-red-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                    
                                                            <button class="text-gray-500 transition-colors duration-200 hover:text-yellow-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="my-6">
                        {{ $debts->links('vendor.pagination.tailwind') }}
                    </div>
                </section>
                   
            </div>
        </div>
</x-app-layout>
