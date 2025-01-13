<template>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">{{ title }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" fdprocessedid="lj4tqa">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <router-link class="nav-link active" to="/">Home
                            <span class="visually-hidden">(current)</span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="list">File</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="upload">Uploads</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'NavHeader',
        props: {
            title: String
        }

    }

</script>

<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
        <Link
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </Link>

        <template v-else>
            <Link
                :href="route('login')"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Log in
            </Link>

            <Link
                v-if="canRegister"
                :href="route('register')"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </Link>
        </template>
    </nav>
</header>

<li class="nav-item">
    <router-link class="nav-link active" to="/">Home
        <span class="visually-hidden">(current)</span>
    </router-link>
</li>
<li class="nav-item">
    <router-link class="nav-link" to="list">File</router-link>
</li>
<li class="nav-item">
    <router-link class="nav-link" to="upload">Uploads</router-link>
</li>
