<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
<div
    class="
        min-h-screen
        bg-gradient-to-r
        from-blue-700
        via-sky-500
        to-cyan-400
    "
>
    <div
        class="
            mx-auto
            flex
            min-h-screen
            max-w-7xl
            items-center
            justify-between
            px-6
        "
    >
        <!-- Left -->
        <div
            class="
                hidden
                max-w-xl
                lg:block
            "
        >
            <Link href="/">
                <ApplicationLogo />
            </Link>

            <h1
                class="
                    mt-8
                    text-6xl
                    font-bold
                    text-white
                "
            >
                Travelku
            </h1>

            <p
                class="
                    mt-6
                    text-2xl
                    leading-10
                    text-blue-100
                "
            >
                Temukan berbagai destinasi wisata
                terbaik di Indonesia dan nikmati
                pengalaman perjalanan yang
                lebih menguntungkan dengan
                Loyalty Reward Optimizer.
            </p>
        </div>

        <!-- Card -->
        <div
            class="
                w-full
                lg:max-w-md
            "
        >
            <div
                class="
                    rounded-3xl
                    bg-white
                    p-10
                    shadow-2xl
                "
            >
                <slot />
            </div>
        </div>

    </div>
</div>
</template>