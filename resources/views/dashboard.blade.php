<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('store')}}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                        <input type="text" class="form-control" name="name_body"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
                                        <input type="submit" class="btn btn-outline-success" value="โพสต์">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>