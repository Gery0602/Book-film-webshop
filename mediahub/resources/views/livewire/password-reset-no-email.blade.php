<x-layouts.auth.app-no-sidebar>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="my-centered-content">
    <div class="w-full max-w-md mx-auto bg-zinc-00 p-10 rounded-xl center-container align-items-center shadow-lg mt-65">
        <h2 class="text-center text-2xl font-semibold mb-4 text-white">Jelszó megváltoztatása</h2>

        <form wire:submit.prevent="submit">
            
            <div class="mb-3 ">
                <label class="form-label text-white">Email cím:</label>
                <input type="email" class="form-control bg-zinc-800 text-white border-zinc-700 w-full rounded-xl mt-2 form-control:focus px-4 py-3" wire:model="email">
            </div>

            <div class="mb-3">
    <label class="form-label text-white">Új jelszó:</label>

    <div class="relative">
        <input id="password" type="password"
               class="form-control bg-zinc-800 text-white border-zinc-700 w-full rounded-xl mt-2 px-4 py-3"
               wire:model="password">

        <button type="button"
                onclick="togglePassword('password')"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-white">
            👁
        </button>
    </div>
    </div>
            
            <div class="mb-4">
    <label class="form-label text-white">Új jelszó megerősítése:</label>

    <div class="relative">
        <input id="password_confirmation" type="password"
               class="form-control bg-zinc-800 text-white border-zinc-700 w-full rounded-xl mt-2 px-4 py-3"
               wire:model="password_confirmation">

        <button type="button"
                onclick="togglePassword('password_confirmation')"
                class="absolute right-2 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-white">
            👁
        </button>
    </div>
</div>

            <div class="text-center">
            <button type="submit" class="mb-5 w-full bg-zinc-700 hover:bg-zinc-600 text-white font-semibold py-3 rounded-xl mt-4 shadow-md transition duration-200" >
                Jelszó mentése
            </button>
            </div>
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-zinc-400 hover:text-white d-block mb-2">
                    Vissza a bejelentkezéshez
                </a>             
            </div>
        </form>
    </div>
</div>
</div>
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}
</script>
</x-layouts.auth.app-no-sidebar>
