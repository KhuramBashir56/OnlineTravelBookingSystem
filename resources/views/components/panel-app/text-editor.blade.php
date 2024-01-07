@props(['for', 'title', 'error'])

<div class=" relative">
    <div wire:ignore class="mb-4">
        <label for="{{ $for }}" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">{{ $title }}</label>
        <textarea {!! $attributes->merge(['id' => $for, 'name' => $for]) !!}></textarea>
    </div>
    @if (!empty($error))
        <div class="absolute z-10 bottom-1 left-2">
            <small class="text-red-600 dark:text-red-500">{{ $error }}</small>
        </div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/panel/src/scss/CK-Editor/ck-editor.js') }}"></script>
    <script>
        CKEDITOR.replace('{{ $for }}', {
            height: 400,
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Blockquote']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'insert',
                    items: ['Table', 'HorizontalRule', 'SpecialChar']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
            ],
            removeButtons: 'Superscript,Anchor, image ,PasteFromWord'
        }).on('change', function() {
            @this.set('{{ $for }}', this.getData());
        });;
    </script>
@endpush
