<x-app-layout>
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 text-gray-900 dark:text-gray-100">
                    @php
                        foreach ($data as $id => $user) {
                        }
                    @endphp
                    <div class="avatar av-l"
                     style="background-image: url('{{ asset('storage/users-avatar/'.$user->avatar) }}');">
                    </div>
                    <b> {{ "Name: " }} </b>
					<i> {{ $user -> name }} </i>
                    <br>
					<b> {{ "Email: " }} </b>
					<i> {{ $user -> email }} </i>
					<br>
					<b> {{ "Massage send: " }} </b>
					<i> {{ DB::table('ch_messages')->where('from_id', $user->id)->count(); }} </i>
					<br>
					<b> {{ "Massage receive: " }} </b>
					<i> {{ DB::table('ch_messages')->where('to_id', $user->id)->count(); }} </i>
					<br>
					<b> {{ "Massage send to you: " }} </b>
					<i> {{ DB::table('ch_messages')->where([
                        ['to_id', Auth::user()->id],
                        ['from_id', $user->id]
                    ])->count(); }} </i>
                    <br>
                    <a href="{{ '/chatify/'.$user->id}}" class="mt-4"> {{ "Chat with user" }} </a>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>
