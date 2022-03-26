<a
  {{ $attributes->merge(['href' => '#','class' =>'flex items-center justify-center w-1/2 h-11 bg-gray-200 border hover:border-gray-300 text-xs font-semibold rounded-md transition duration-150 ease-in ']) }}>
  {{ $slot }}
</a>
