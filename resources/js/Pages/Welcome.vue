<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-100 text-black"> <!-- Light gray background -->
        <div class="relative flex min-h-screen flex-col items-center justify-start selection:bg-[#FF2D20] selection:text-black">
            <div class="w-full px-0 lg:px-6"> <!-- Ensuring full width for the container -->
                <!-- Header with navbar -->
                <header class="grid grid-cols-1 items-center gap-2 py-4 lg:grid-cols-2 bg-white w-full rounded-md">
                    <nav v-if="canLogin" class="flex justify-start items-center w-full">
                        <div class="flex px-3">
                            <span class="text-4xl font-bold text-black">
                                FileMana
                            </span>
                        </div>
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Dashboard
                        </Link>
                        <template v-else>
                            <div class="mx-5">
                                <Link
                                    :href="route('login')"
                                    class="rounded-md px-2 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Log in
                                </Link>

                                <Link
                                    v-if="canRegister"
                                    :href="route('register')"
                                    class="rounded-md px-2 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Register
                                </Link>
                            </div>
                        </template>
                    </nav>
                </header>
                <main class="mt-6">
                    <div class="bg-white text-black py-24 px-6 md:px-12 lg:px-24 rounded-xl">
                        <div class="container mx-auto text-center">
                            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                                Welcome to FileMana
                            </h1>
                            <p class="text-lg md:text-xl mb-8">
                                A File Managment System for A Data Company
                            </p>
                            <div>
                                <Link :href="route('login')"
                                    class="inline-block bg-black text-white py-3 px-6 rounded-full text-lg font-semibold transition duration-300 ease-in-out hover:bg-gray-800">
                                    Get Started
                                </Link>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>




