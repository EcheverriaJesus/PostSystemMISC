<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Deuda') }}
        </h2>
    </x-slot>

    <section class="bg-white lg:mx-56 lg:mt-10">
        <div class="flex min-h-full flex-col justify-center py-12">
            <div class="flex flex-col sm:mx-auto sm:w-full sm:max-w-sm items-center">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Resgistro de Deuda</h2>
            </div>
                  
            <div class="px-6 lg:px-0 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('debt.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="ecustomer_name" class="block text-sm font-medium leading-6 text-gray-900">Nombre del cliente</label>
                        <div class="mt-2">
                            <input id="customer_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="customer_name" :value="old('customer_name')" required autofocus />
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                        <div class="mt-2">
                            <input id="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="description" :value="old('description')" required autofocus />
                        </div>
                    </div>
                  
                    <div>
                        <label for="leave" class="block text-sm font-medium leading-6 text-gray-900">¿Cuanto deja?</label>
                        <div class="mt-2">
                        <input id="leave" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" name="leave" :value="old('leave')" required />
                        </div>
                    </div>

                    <div>
                        <label for="subtract" class="block text-sm font-medium leading-6 text-gray-900">¿Cuanto resta?</label>
                        <div class="mt-2">
                        <input id="subtract" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" name="subtract" :value="old('subtract')" required />
                        </div>
                    </div>
                    
                    <script>
                        window.onload = function() {
                        var leaveField = document.getElementById('leave');
                        var subtractField = document.getElementById('subtract');
                        var totaldebtField = document.getElementById('total');

                    function calculateTotal() {
                        var leaveValue = parseInt(leaveField.value) || 0;
                        var subtractValue = parseInt(subtractField.value) || 0;
                        var total = leaveValue + subtractValue;
                        totaldebtField.value = total;
                    }

                        leaveField.addEventListener('change', calculateTotal);
                        subtractField.addEventListener('change', calculateTotal);
                    }
                    </script>

                    <div>
                        <label for="total" class="block text-sm font-medium leading-6 text-gray-900">Total</label>
                        <div class="mt-2">
                        <input id="total" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6" type="text" name="total" :value="old('total')" required readonly/>
                        </div>
                    </div>

                    <div class="pt-4">
                        <input type="submit" value="Registrar Deuda" class="flex w-full justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer">
                    </div>
                </form>       
            </div>
        </div>
    </section>
</x-app-layout>