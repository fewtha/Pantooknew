<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PANTOOK') }}
        </h2>
    </x-slot>
    @if(session("success"))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="col">
                                    <br>
                                    <div class="card">
                                        <h5 class="card-header">{{$posts->user->name}}</h5>
                                        <div class="card-body">
                                            <p class="card-text">{{$posts->body}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- displayComment -->
                            <h5>Display Comments</h5>
                            @foreach($posts->comments as $comment)
                            <div class="display-comment">
                                <strong>{{ $comment->user->name }}</strong>
                                <p>{{ $comment->body }}</p>
                            </div>
                            @endforeach
                            <div class="display-comment">
                                <hr />
                                <h5>Add comment</h5>
                                <strong>{{Auth::user()->name}}</strong>
                                <form method="post" action="{{ route('comments.add') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="comment_body" class="form-control" />
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-warning" value="Add Comment" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>