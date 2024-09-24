@extends("layouts.app")
@section("title", __("order.order"))
@section("content")
  @if (session("success"))
    <x-alert :message="session('success')" />
  @endif

  @forelse ($viewData["orders"] as $order)
    <div class="relative my-10 overflow-x-auto">
      <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr class="bg-brightPink px-6 py-3 text-xl font-medium text-white">
            <th scope="col" class="px-6 py-3">
              {{ __("order.order") }} {{ $order->getId() }}
            </th>
            <th scope="col" class="px-6 py-3"></th>
            <th scope="col" class="px-6 py-3"></th>
            <th scope="col" class="px-6 py-3"></th>
          </tr>
          <tr>
            <th scope="col" class="px-6 py-3">
              {{ __("order.product_name") }}
            </th>
            <th scope="col" class="px-6 py-3">
              {{ __("order.id") }}
            </th>
            <th scope="col" class="px-6 py-3">
              {{ __("order.quantity") }}
            </th>
            <th scope="col" class="px-6 py-3">
              {{ __("order.price") }}
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->getItems() as $item)
            <tr class="border-b bg-white">
              <th
                scope="row"
                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
              >
                {{ $item->getProduct()->getName() }}
              </th>
              <td class="px-6 py-4">
                {{ $item->getProduct()->getId() }}
              </td>
              <td class="px-6 py-4">
                {{ $item->getQuantity() }}
              </td>
              <td class="px-6 py-4">
                {{ formatPrice($item->getPrice()) }}
              </td>
            </tr>
          @endforeach

          <th
            scope="row"
            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
          ></th>
          <td class="px-6 py-4"></td>
          <td class="px-6 py-4"></td>
          <td class="bg-brightPink px-6 py-4 text-white">
            <b>{{ formatPrice($order->getTotal()) }}</b>
          </td>
        </tbody>
      </table>
    </div>
  @empty
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
            <p class="font-bold">{{ __("order.notification") }}</p>
            <p class="text-sm">
              {{ __("order.empty_message") }}
            </p>
          </div>
        </div>
      </div>
    </div>
  @endforelse
@endsection
