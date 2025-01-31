<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Welcome!") }}
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 text-gray-900 dark:text-gray-100">
                    <div class="avatar av-l chatify-d-flex"
                     style="background-image: url('{{ asset('storage/users-avatar/'.Auth::user()->avatar) }}');"
                    >
                    </div>
                    
                    <br>
					<b> {{ "Email: " }} </b>
					<i> {{ Auth::user()->email }} </i>
					<br>
					<b> {{ "Massage send: " }} </b>
					<i> {{ DB::table('ch_messages')->where('from_id', Auth::user()->id)->count(); }} </i>
					<br>
					<b> {{ "Massage receive: " }} </b>
					<i> {{ DB::table('ch_messages')->where('to_id', Auth::user()->id)->count(); }} </i>
					<br>
					<b> {{ "Total user: " }} </b>
					<i> {{ DB::table('users')->count(); }} </i>
					<br>
					<b> {{ "Active user: " }} </b>
					<i> {{ DB::table('users')->where('active_status', '=', '1' )->count(); }} </i>
					<br>
					<b> {{ "Active user list: " }} </b>
					@php
						$users = DB::table('users')->select('id','name')->where('active_status', '1' )->get();
					@endphp
					@foreach ($users as $user)
						<br/> <a href="{{ route('view.user', $user ->id)}}"> {{ $user ->name }} </a>
					@endforeach
				</div>
            </div>
        </div>
    </div>
</x-app-layout>
