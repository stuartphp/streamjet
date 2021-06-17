<div>
    <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('admin.inventory.index') }}">{{ __('Inventory') }}</a> / <span class="text-gray-400">{{ __('Categories') }}</span>
            </h2>
            </div>
            <div class="flex">
                <div class="mr-3"><x-icon-collection class="w-5 h-5 text-gray-400"/></div>
                <div class="mr-3"><a href="#" title="{{ __('Units') }}"><x-icon-view-list class="w-5 h-5 hover:text-gray-400"/></a></div>
            </div>
            <div>
                <a href="#" wire:click="showForm"><x-icon-add class="h-5 w-5"/></a>
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
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">
                                <div class="flex items-center">
                                    <button wire:click="sortBy('id')">ID</button>
                                    <x-icon-sort sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                </div>
                            </th>
                            <th class="py-2">
                                <div class="flex items-center">
                                    <button wire:click="sortBy('name')">Name</button>
                                    <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                </div>
                            </th>
                            <th class="py-2">
                                <div class="flex items-center">
                                    <button wire:click="sortBy('price')">Parent</button>
                                    <x-icon-sort sortField="price" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                </div>
                            </th>
                            <th class="py-2">
                                Status
                            </th>
                            <th class="py-2 text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                            <tr class="hover:bg-gray-100 border-b">
                                <td class="py-1">{{ $cat->id}}</td>
                                <td class="">{{ $cat->name}}</td>
                                <td class="">{{ ($cat->parent_id > 0) ? $parents[$cat->parent_id] : '' }}</td>
                                <td class="">{{ $cat->is_active ? 'Active' : 'Not-Active'}}</td>
                                <td class="">
                                    <div style="float: right;" x-data="{ show: false}">
                                        <x-icon-dot-hor class="h-4" @click="show =! show"/>
                                        <div x-show="show" class="z-40 bg-white border border-gray-500">
                                            <ul>
                                                <li>Edit</li>
                                                <li>Delete</li>
                                            </ul>
                                        </div>
                                    </div>                           
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-jet-dialog-modal wire:model="stateForm">
    <x-slot name="title">Title</x-slot>
    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4 mb-3">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
            <x-jet-input-error for="state.name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4 mb-3">
            <x-jet-label for="parent_id" value="{{ __('Parent') }}" />
            <select id="parent_id" wire:model.defer="state.parent_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm h-9 w-full">
                <option value="">{{ __('Please Select') }}</option>
                <option value="0">Parent</option>
                @foreach ($parents as $k=>$v)
                    <option value="{{ $k }}">{{ $v }}</option>
                    @foreach ($selectCat as $cat)
                        @if ($k==$cat->parent_id)
                            <option value="{{ $cat->id }}"> - {{ $cat->name }}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
            <x-jet-input-error for="state.parent_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <label class="flex items-center">
                <input type="checkbox" wire:model.defer="state.is_active" class="form-checkbox" />
                <span class="ml-2 text-sm text-gray-600">Is Active</span>
            </label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('stateForm')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="saveForm" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
</div>

