<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Page Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Page Settings -->
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="flex inline-flex items-center justify-center w-full">
                <a class="mr-2 text-xs text-gray-400 cursor-pointer" onclick='window.location="{{route('pages.show', $page->id)}}"'>Back</a>
                <span class="text-xs text-gray-300">|</span>
                <a class="ml-2 text-xs text-gray-400 cursor-pointer" onclick='window.location="{{route('dashboard')}}"'>Dashboard</a>
            </div>
            <div id="private_message" class="mt-2 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <p class="text-gray-500"><i class="mr-2 fa-solid fa-circle-info fa-xl" style="color: #8b8c8d;"></i><strong class="mr-2">Note:</strong>Pages marked as private will not be accessible by anyone but yourself, even if it has been shared with them.</p>
            </div>
            <div class="bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <form method="post" action="{{ route('settings.store', $page->id) }}" id="page-settings-form" class="space-y-0">
                    @csrf
                    <div class="h-full">
                        <div class="mb-2">
                            <x-text-input :checked="$page->private" id="private" name="private" type="checkbox" class="inline-block text-lg" :value="old('private')" />
                            <x-input-label for="private" class="inline-block pt-2 mb-2 ml-3 font-bold justify-baseline" :value="__('Private')" />
                            <br/>
                            <x-input-label for="private" class="inline-block pt-2 mb-2 text-xs text-gray-200 text-md justify-baseline" :value="__('Private pages cannot be shared. If the page is already shared, those users will not be able to view the page until it is not marked as private')" />
                            <x-input-error class="mt-2" :messages="$errors->get('private')" />
                        </div>
                    </div>
                    <hr class="pt-2 text-gray-300" />

                    <!-- Emails -->
                    <div class="h-full">
                        <div class="mt-2 mb-2">
                            <x-input-label for="shared_with_users" class="inline-block pt-2 mb-2 font-bold justify-baseline" :value="__('Share')" />
                            <x-text-input id="shared_with_users" name="shared_with_users" type="text" class="inline-block w-full text-sm" value="{{$page['shared_with_users']}}" /><br/>
                            <x-input-label for="private" placeholder="hello@example.com; greetings@domain.com" class="inline-block pt-2 mt-1 mb-2 text-xs text-gray-200 text-md justify-baseline" :value="__('Add emails, separated by a semicolon to share this page')" />
                            <x-input-error class="mt-2" :messages="$errors->get('private')" />
                        </div>
                    </div>
                    <hr class="pt-2 text-gray-300" />

                    <!-- Public Access URL-->
                    <div class="h-full">
                        <div class="mt-2 mb-2">
                            <x-input-label for="public_url" class="inline-block pt-2 mb-2 font-bold justify-baseline" :value="__('Public URL')" /><i id="btnClipboard" class="text-gray-400 fa fa-copy"></i><span class="inline-block ml-2 text-red-400 d-none"><small id="msgCopy">Copied to clipboard!</small></span>
                            <x-text-input readonly id="public_url" name="public_url" onclick="copyToClipboard" type="text" class="inline-block w-full text-sm" value="{{$publicUrl}}" /><br/>
                            <x-input-label for="public_url" placeholder="Opps, something went wrong, sorry!" class="inline-block pt-2 mt-1 mb-2 text-xs text-gray-200 text-md justify-baseline" :value="__('Anyone with this link can access the page.')" />
                        </div>
                    </div>
                </form>
            </div>
            <x-primary-button type="submit" onclick="document.querySelector('#page-settings-form').submit();" class="flex float-right">Apply</x-primary-button>
            <x-danger-button id="btnReset" name="btnReset" type="button" class="flex float-left">Reset</x-danger-button>
        </div>
    </div>
</x-app-layout>

<!-- Scripts -->
@push('scripts')
    <script src="/resources/js/components/settings.js"></script>
@endpush
