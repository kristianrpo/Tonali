<div class="mb-10 flex justify-center">
    <div
        class="w-3/4 rounded-b bg-palePink px-4 py-3 text-offWhite shadow-md"
        role="alert"
    >
        <div class="flex">
            <div class="mx-5 py-1">
                <svg
                    class="mr-4 h-6 w-6 fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                    />
                </svg>
            </div>
            <div>
                <p class="font-bold">{{ __("alert.notification") }}</p>
                @if ($message)
                    <p>{{ $message }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
