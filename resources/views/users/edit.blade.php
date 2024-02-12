<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-backend.side-navbar/>

            <div class="w-3/5 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <form
                            action="{{ route('admin.user.update', $user->id) }}"
                            method="post"
                            enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="name" required />
                        <x-form.input name="email" required />
                        <x-form.input name="password" required />
                        <x-form.input name="password_confirmation" required />
                        @if($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropdown)))
                            <p>{{ $user->roles->first()->display_name }}</p>
                        @else
                            <x-form.field>
                                <x-form.label name="category"/>
                                    <?php $roles = \App\Models\Role::all()  ?>
                                <select name="role"
                                        id="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                                {{ old('role') == $role->id ? 'selected' : '' }}
                                        >{{ ucwords($role->display_name) }}</option>
                                    @endforeach
                                </select>
                                @endif

                                <x-form.error name="role" />
                            </x-form.field>


                            <x-form.textaera name="bio" required />

                            <div>
                                <x-form.button>Publish</x-form.button>
                                <a href="{{ route('admin.user.index') }}">Annuler</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function generateSlug(name) {
                    return name.toLowerCase().replace(/\s+/g, '-');
                }

                const nameInput = document.getElementById('name');
                const slugInput = document.getElementById('slug');

                nameInput.addEventListener('input', () => {
                    const name = nameInput.value;
                    const slug = generateSlug(name);
                    slugInput.value = slug;
                });
            });
        </script>
    </x-slot>
</x-app-layout>
