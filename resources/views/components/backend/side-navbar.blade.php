@role(['admin', 'superadministrator'])
<div class="w-1/5 bg-white mr-4 shadow-sm sm:rounded-lg sm:px-6 lg:px-8 mt-6">
    <nav class="flex flex-1 mt-4">
        <ul class="flex flex-1 flex-col gap-y-7">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts.create') }}"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Créer un article</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-folder-tree"></i>
                    <span>Categories</span>
                </a>
            </li>
            @role(['superadministrator'])
            <li>
                <a href="{{route('admin.user.index')}}"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.comments.index')}}"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-comments"></i>
                    <span>Comments</span>
                </a>
            </li>
            <li>
                <a href="/laratrust"
                   class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                    <i class="fa-solid fa-unlock"></i>
                    <span>Permissions</span>
                </a>
            </li>
            @endrole
        </ul>
    </nav>
</div>
@endrole
