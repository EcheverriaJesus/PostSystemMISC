<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <section class="bg-white lg:mx-56 lg:mt-10">
        <div class="flex min-h-full flex-col justify-center py-12">
            <div class="flex flex-col sm:mx-auto sm:w-full sm:max-w-sm items-center">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Crear Producto</h2>
            </div>
                  
            <div class="px-6 lg:px-0 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="ecode" class="block text-sm font-medium leading-6 text-gray-900">Código</label>
                        <div class="mt-2">
                            <input id="code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="code" :value="old('code')" required autofocus />
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <input id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                        <div class="mt-2">
                            <input id="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="description" :value="old('description')" required autofocus />
                        </div>
                    </div>
                  
                    <div>
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Precio</label>
                        <div class="mt-2">
                        <input id="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" name="price" :value="old('price')" required />
                        </div>
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">Stock</label>
                        <div class="mt-2">
                        <input id="stock" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" name="stock" :value="old('stock')" required />
                        </div>
                    </div>

                    <div class="pt-4">
                        <input type="submit" value="Crear Producto" class="flex w-full justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer">
                    </div>
                </form>       
            </div>
        </div>
    </section>
</x-app-layout>