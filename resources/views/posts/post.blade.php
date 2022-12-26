<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PANTOOK') }}
        </h2>
    </x-slot>

    <!-- upload post -->
    @if(session("success"))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
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
                                        <span class="input-group-text bg-info text-white"
                                            id="inputGroup-sizing-default">คุณกำลังคึดอิหยังอยู่</span>
                                        <input type="text" class="form-control" name="body"
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                @foreach($posts as $post)
                                <div class="col">
                                    <br>
                                    <div class="card">
                                        <h5 class="card-header bg-info text-white">{{$post->name}}</h5>
                                        <div class="card-body">

                                            <p class="card-text ">{{$post->body}}</p>
                                            <a href="{{url('/posts/show/'.$post->id)}}"
                                                class="btn btn-secondary float-end">แสดงความคิดเห็น
                                            </a>
                                            <!-- <a href="{{url('/posts/delete/'.$post->id)}}" class="btn btn-danger float-end">
                                                ลบโพสต์
                                            </a> -->
                                           
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>