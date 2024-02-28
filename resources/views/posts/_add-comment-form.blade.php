@auth
    <form method="POST"
          action="{{ route('post-comments.store', $post) }}"
          class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="{{ Auth::user()->gravatar() }}"
                 alt=""
                 width="40"
                 height="40"
                 class="rounded-full">
            <h2 class="ml-4">Want to participate ?</h2>
        </header>

        <div class="mt-6">
                        <textarea name="body"
                                  class="w-full text-sm focus:outline-none focus:ring"
                                  cols="30"
                                  rows="10"
                                  placeholder="Quick, thing of something to say"
                                  ></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6  border-t border-gray-200">
            <button type="submit"
                    class="py-3 px-4 rounded-xl bg-blue-500 text-white">Post
            </button>
        </div>

    </form>
@else
    <p>
        <a href="{{route('register')}}">S'enregistrer</a> ou <a href="{{ route('login') }}">se connecter</a> pour
        laisser un commentaire.
    </p>
@endauth
