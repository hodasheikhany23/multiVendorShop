
<div class="text-center mt-20">
    <img src="{{ asset('images/403.png') }}" alt="403 Forbidden" class="mx-auto">
    <h1 class="text-3xl mt-4">شما اجازه دسترسی به این صفحه را ندارید!</h1>
    <form method="post" action="{{ route('logout')  }}">
        @csrf
        <button type="submit">خروجججج</button>
    </form>
    <a href="{{ route('logout')  }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">خروج از سایت  </a>
</div>

