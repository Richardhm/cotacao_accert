<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Plano</p>


                    <form action="" method="post" id="form">
                        @csrf
                        <div class="flex-col">
                            <div>
                                <label for="">Nome</label>
                                <input type="text" name="nome" i="nome">
                            </div>
                            <div>
                                <label for="">Telefone</label>
                                <input type="text" name="phone" i="phone">
                            </div>
                        </div>

                        <div class="flex-col">
                            <div>
                                <label for="">Email</label>
                                <input type="text" name="email" i="email">
                            </div>
                            <div>
                                <label for="">Empresa</label>
                                <input type="text" name="empresa" i="empresa">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="">Senha</label>
                                <input type="password" name="password" i="password">
                            </div>

                        </div>

                        <div class="col-span-6 sm:col-span-4 py-2">
                            <input type="text" name="card-holder-name" id="card-holder-name" placeholder="Nome do Cartão" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        </div>
                        <div class="col-span-6 sm:col-span-4 py-2">
                            <div id="card-element"></div>
                        </div>

                        <div class="col-span-6 sm:col-span-4 py-2">
                            <button id="card-button" type="submit" data-secret="" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    const stripe = Stripe("{{ config('cashier.key')   }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');



</script>
