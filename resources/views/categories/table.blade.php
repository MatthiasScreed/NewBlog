<table class=" w-full whitespace-nowrap text-left divide-y divide-gray-300">
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
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
        <th scope="col" class="relative py-3.5 text-center pl-3 pr-4 sm:pr-6">nb d'Articles</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">

        @foreach( $categories as $category)
            <tr>
                <td class="flex align-center space-x-4 whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    <a href="{{ route('admin.category.edit', $category) }}">
                        <i class="fa fa-edit text-green-600"></i>
                    </a>
                    <form action="{{ route('admin.category.delete', $category) }}"
                          method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <i class="fa fa-times text-red-600"></i>
                        </button>
                    </form>
                </td>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                    <div class="truncate text-sm font-medium leading-6">{{ $category->name }}</div>

                </td>
                <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <div class="truncate text-sm font-medium leading-6">{{ $category->slug }}</div>
                </td>
                <td  class="whitespace-nowrap px-3 py-4 text-sm">
                    <div class="truncate text-sm text-center font-medium leading-6">{{ $category->posts->count() }}</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
