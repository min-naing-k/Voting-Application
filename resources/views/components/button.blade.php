<button
  {{ $attributes->merge(['type' => 'button','class' => 'flex h-11 px-4 py-2 items-center justify-center text-xs bg-gray-200 border hover:border-gray-300 font-semibold rounded-md transition duration-150 ease-in ']) }}>
  {{ $slot }}
</button>
