<x-front.layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <img src="{{asset('monkey_logo.svg')}}"
                 alt="monkey_logo"
                 class="w-28 h-28">
        </div>
        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <a href="https://www.linkedin.com/in/christophermassamba/" class="scale-100 p-6 rounded-lg shadow-2xl shadow-gray-500/20">
                    <i class="fa-brands fa-linkedin fa-2xl text-slate-600"></i>
                    <h2 class="mt-6 text-xl font-semibold text-gray-900">Linkedin profile</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">If you want to know more about my career, here is my Linkedin profile.</p>
                </a>
                <a href="https://github.com/MatthiasScreed/" class="scale-100 p-6 rounded-lg shadow-2xl shadow-gray-500/20">
                    <i class="fa-brands fa-square-github fa-2xl text-slate-600"></i>
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 ">Github profile</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">If you want to see the different code projects I’m working on, I suggest you take a look at my github.</p>
                </a>
            </div>
        </div>
    </div>
</x-front.layout>
