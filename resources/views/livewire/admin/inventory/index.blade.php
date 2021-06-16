<div>
    <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Inventory') }}
            </h2>
            </div>
            <div class="flex">
                <div class="mr-3"><a href="/admin/inventory/categories" title="{{ __('Categories') }}"><x-icon-collection class="w-5 h-5 hover:text-gray-400"/></a></div>
                <div class="mr-3"><a href="#" title="{{ __('Units') }}"><x-icon-view-list class="w-5 h-5 hover:text-gray-400"/></a></div>
            </div>
            <div>
                <a href="#" wire:click="showItemForm"><x-icon-add class="h-5 w-5"/></a>
            </div>
            <div>
                <div class="relative text-gray-600">
                <input type="search" name="serch" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none h-9">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                  </svg>
                </button>
              </div>
            </div>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-2">
                <x-table-crud>
                    <x-slot name="header">
                        <x-table-th name="name" />
                        <x-table-th name="title" />
                        <x-table-th name="status" />
                        <x-table-th name="role" />
                        <x-table-th name="action" />
                    </x-slot>
                    <x-slot name="body">
                        <x-table-body>
                            <x-slot name="value">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            Jane Cooper
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            jane.cooper@example.com
                                        </div>
                                    </div>
                                </div>
                            </x-slot>
                        </x-table-body>
                        <x-table-body>
                            <x-slot name="value">
                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                <div class="text-sm text-gray-500">Optimization</div>
                            </x-slot>
                        </x-table-body>
                        <x-table-body>
                            <x-slot name="value">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </x-slot>
                        </x-table-body>
                        <x-table-body>
                            <x-slot name="value">
                                Admin
                            </x-slot>
                        </x-table-body>
                        <x-table-body>
                            <x-slot name="value">
                                <div style="float: right">
                                    <a href="#"><x-icon-dot-hor class="w-6"></x-icon-dot-hor></a>
                                </div>
                            </x-slot>
                        </x-table-body>
                    </x-slot>
                </x-table-crud>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Item -->
<x-jet-dialog-modal wire:model="itemForm">
    <x-slot name="title">Title</x-slot>
    <x-slot name="content">Content</x-slot>
    <x-slot name="footer">Footer</x-slot>
</x-jet-dialog-modal>
</div>
