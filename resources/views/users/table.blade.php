<table class="whitespace-nowrap text-left divide-y divide-gray-300">
    <colgroup>
        <col class="w-full sm:w-2/12">
        <col class="lg:w-4/12">
        <col class="lg:w-2/12">
        <col class="lg:w-2/12">
    </colgroup>
    <thead class="border-b border-white/10 text-sm leading-6 text-gray-900">
    <tr>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Action</th>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">Role</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
    <?php $currentUser = auth()->user();
            $users = \App\Models\User::all()?>
        @foreach( $users as $user)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    @if(auth()->user()->hasRole('superadministrator'))
                        <a href="/laratrust/roles-assignment/{{$user->id}}/edit?model=users">
                            <i class="fa fa-edit text-green-600"></i>
                        </a>
                    @else
                        <button onclick="return false" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-edit"></i>
                        </button>
                    @endif
                    @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
                        <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-times"></i>
                        </button>
                    @else
                        <a href="{{ route('admin.user.confirm', $user->id) }}" class="btn btn-xs btn-danger">
                            <i class="fa fa-times text-red-500"></i>
                        </a>
                    @endif
                </td>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    <div class="truncate text-sm font-medium leading-6">{{ $user->name }}</div>

                </td>
                <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <div class="truncate text-sm font-medium leading-6">{{ $user->email }}</div>

                </td>
                <td  class="whitespace-nowrap px-3 py-4 text-sm">
                    @if($user->roles->first())
                        <div class="truncate text-sm font-medium leading-6">{{ $user->roles->first()->display_name }}</div>
                    @else
                        <div class="truncate text-sm font-medium leading-6">Aucun rôle défini</div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
