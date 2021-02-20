@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
    <div>Messages</div>
        <form action="{{ route('messages') }}" method="post">  
            @csrf
            <div>
                <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded font-medium w-full">Send Message</button>
            </div>
        </form>
    </div>
</div>
@endsection