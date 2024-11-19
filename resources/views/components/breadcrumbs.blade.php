@if (! empty($breadcrumbs))
  <nav
    class="container mx-auto my-0 mb-5 flex w-fit rounded-lg border border-gray-200 bg-gray-50 px-4 py-2 text-gray-700"
    aria-label="Breadcrumb"
  >
    <ol class="flex items-start space-x-1 md:space-x-2 rtl:space-x-reverse">
      <svg
        class="mt-1 h-3.5 w-3.5 text-gray-500"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
        aria-hidden="true"
      >
        <path
          d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
        />
      </svg>
      @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb["url"])
          <li>
            <div class="flex items-center">
              <a
                href="{{ $breadcrumb["url"] }}"
                class="ms-1 text-sm font-medium text-gray-700 hover:text-brightPink md:ms-2"
              >
                {{ $breadcrumb["label"] }}
              </a>
              <svg
                class="ml-2 block h-3 w-3 text-gray-400 rtl:rotate-180"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 6 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 9 4-4-4-4"
                />
              </svg>
            </div>
          </li>
        @else
          <li aria-current="page">
            <div class="flex items-center">
              <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">
                {{ $breadcrumb["label"] }}
              </span>
            </div>
          </li>
        @endif
      @endforeach
    </ol>
  </nav>
@endif
