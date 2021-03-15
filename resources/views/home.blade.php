@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-indigo-900 p-6 rounded-lg text-white">
        <h1 class="text-center text-3xl mb-4">Get in touch</h1>
        <h3 class="text-center">We would love to hear from you. Here's how you can reach us.</h3>
    </div>
</div>
<div class="flex justify-center">
    <div class="grid grid-flow-col grid-rows-12 grid-cols-2 gap-8 w-6/12 p-6">
        <div class="row-start-1 col-start-1 bg-indigo-100 rounded-lg text-center mb-4">
           <h2 class="font-bold text-xl mb-4 mt-2">Call us</h2> 
           <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h3> 
           <h1 class="font-semibold text-xl mb-4 mt-4">+370 5 222 0525</h1>
        </div>
        <div class="row-start-1 col-start-2 bg-indigo-100 rounded-lg text-center mb-4">
            <h2 class="font-bold text-xl mb-4 mt-2">Contact Customer Support</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h3> 
            <button class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 px-3 border border-indigo-700 rounded mb-4 mt-4">Contact Support</button>
        </div>
    </div> 
</div>
@endsection