<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    packages: Array,
    loyalty: Object,
})
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <!-- Navbar -->
    <nav
        class="
            sticky
            top-0
            z-50
            border-b
            bg-white/90
            backdrop-blur
            shadow-sm
        "
    >
        <div
            class="
                mx-auto
                flex
                max-w-7xl
                items-center
                justify-between
                px-6
                py-5
            "
        >
            <h1
                class="
                    text-2xl
                    font-bold
                    text-blue-600
                "
            >
                Travelku
            </h1>

            <div
                class="
                    flex
                    items-center
                    gap-4
                "
            >
                <template
                    v-if="!$page.props.auth?.user"
                >
                    <Link
                        :href="route('login')"
                        class="
                            text-gray-600
                            transition
                            hover:text-blue-600
                        "
                    >
                        Login
                    </Link>

                    <Link
                        :href="route('register')"
                        class="
                            rounded-lg
                            bg-blue-600
                            px-4
                            py-2
                            text-white
                            transition
                            hover:bg-blue-700
                        "
                    >
                        Daftar
                    </Link>
                </template>

                <template v-else>

                    <Link
                        :href="route('booking.index')"
                        class="
                            text-gray-600
                            transition
                            hover:text-blue-600
                        "
                    >
                        My Booking
                    </Link>

                    <Link
                        :href="route('profile.edit')"
                        class="
                            rounded-lg
                            bg-blue-600
                            px-4
                            py-2
                            text-white
                            transition
                            hover:bg-blue-700
                        "
                    >
                        Profile
                    </Link>

                </template>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section
        class="
            overflow-hidden
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
                max-w-7xl
                items-center
                justify-between
                px-6
                py-28
            "
        >
            <div class="max-w-2xl">

                <h1
                    class="
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
                    Temukan berbagai destinasi
                    wisata terbaik di Indonesia.
                </p>

            </div>

            <!-- Decoration -->
            <div
                class="
                    relative
                    hidden
                    lg:block
                    h-[320px]
                    w-[420px]
                "
            >
                <div
                    class="
                        absolute
                        right-0
                        top-5
                        h-72
                        w-72
                        rounded-full
                        bg-white/20
                        blur-3xl
                    "
                />

                <div
                    class="
                        absolute
                        right-20
                        top-12
                        h-52
                        w-52
                        rounded-3xl
                        border
                        border-white/30
                        bg-white/10
                        backdrop-blur-md
                    "
                />

                <div
                    class="
                        absolute
                        bottom-0
                        right-5
                        h-36
                        w-36
                        rounded-full
                        bg-cyan-200/20
                    "
                />
            </div>

        </div>
    </section>

    <!-- Loyalty Milestone -->
    <section
        v-if="
            loyalty &&
            $page.props.auth?.user
        "
        class="
            mx-auto
            -mt-12
            mb-12
            max-w-7xl
            px-6
        "
    >
        <div
            class="
                overflow-hidden
                rounded-3xl
                bg-white
                shadow-xl
            "
        >
            <div
                class="
                    bg-gradient-to-r
                    from-blue-600
                    to-cyan-500
                    p-8
                    text-white
                "
            >
                <div
                    class="
                        flex
                        flex-col
                        justify-between
                        gap-6
                        md:flex-row
                        md:items-center
                    "
                >
                    <div>

                        <p
                            class="
                                text-blue-100
                            "
                        >
                            Loyalty Milestone
                        </p>

                        <h2
                            class="
                                mt-2
                                text-4xl
                                font-bold
                                capitalize
                            "
                        >
                            {{ loyalty.tier }}
                        </h2>

                        <p
                            class="
                                mt-3
                                text-blue-100
                            "
                        >
                            Diskon Aktif
                            {{ loyalty.discount }}%
                        </p>

                    </div>

                    <Link
                        :href="
                            route(
                                'loyalty.index'
                            )
                        "
                        class="
                            rounded-xl
                            bg-white/20
                            px-5
                            py-3
                            backdrop-blur
                            transition
                            hover:bg-white/30
                        "
                    >
                        Lihat Detail
                    </Link>
                </div>
            </div>

            <div
                class="
                    p-8
                "
            >
                <div
                    class="
                        mb-3
                        flex
                        items-center
                        justify-between
                    "
                >
                    <span
                        class="
                            text-gray-500
                        "
                    >
                        Progress Perjalanan
                    </span>

                    <span
                        class="
                            font-semibold
                        "
                    >
                        {{ loyalty.progress }}%
                    </span>
                </div>

                <!-- Progress Bar -->
                <div
                    class="
                        h-4
                        overflow-hidden
                        rounded-full
                        bg-slate-200
                    "
                >
                    <div
                        class="
                            h-full
                            rounded-full
                            bg-gradient-to-r
                            from-blue-600
                            to-cyan-500
                            transition-all
                        "
                        :style="{
                            width:
                                loyalty.progress +
                                '%'
                        }"
                    />
                </div>

                <div
                    class="
                        mt-6
                        grid
                        gap-6
                        md:grid-cols-3
                    "
                >
                    <div>
                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >
                            Total Distance
                        </p>

                        <h3
                            class="
                                mt-2
                                text-3xl
                                font-bold
                            "
                        >
                            {{
                                loyalty.distance
                            }}
                            KM
                        </h3>
                    </div>

                    <div>
                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >
                            Target Berikutnya
                        </p>

                        <h3
                            class="
                                mt-2
                                text-3xl
                                font-bold
                            "
                        >
                            {{
                                loyalty.nextTier
                                    ?.name ??
                                'Max'
                            }}
                        </h3>
                    </div>

                    <div>
                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >
                            Sisa Perjalanan
                        </p>

                        <h3
                            class="
                                mt-2
                                text-3xl
                                font-bold
                                text-blue-600
                            "
                        >
                            {{
                                loyalty.remaining
                            }}
                            KM
                        </h3>
                    </div>
                </div>

                <div
                    v-if="
                        loyalty.nextTier
                    "
                    class="
                        mt-8
                        rounded-2xl
                        bg-slate-100
                        p-5
                        text-gray-600
                    "
                >
                    Anda membutuhkan

                    <span
                        class="
                            font-bold
                            text-blue-600
                        "
                    >
                        {{
                            loyalty.remaining
                        }}
                        KM
                    </span>

                    lagi untuk mencapai
                    tier

                    <span
                        class="
                            font-bold
                        "
                    >
                        {{
                            loyalty.nextTier
                                .name
                        }}
                    </span>

                    dan mendapatkan
                    diskon

                    <span
                        class="
                            font-bold
                        "
                    >
                        {{
                            loyalty.nextTier
                                .discount
                        }}%
                    </span>
                </div>

                <div
                    v-else
                    class="
                        mt-8
                        rounded-2xl
                        bg-green-50
                        p-5
                        text-green-700
                    "
                >
                    Selamat! Anda telah
                    mencapai tier tertinggi.
                </div>
            </div>
        </div>
    </section>

    <!-- Package -->
    <section
        class="
            mx-auto
            mt-20
            max-w-7xl
            px-6
            pb-20
        "
    >
        <h2
            class="
                mb-10
                text-4xl
                font-bold
                text-gray-800
            "
        >
            Paket Wisata
        </h2>

        <div
            class="
                grid
                gap-8
                md:grid-cols-2
                lg:grid-cols-3
            "
        >
            <div
                v-for="item in packages"
                :key="item.id"
                class="
                    overflow-hidden
                    rounded-3xl
                    bg-white
                    shadow-md
                    transition
                    hover:-translate-y-2
                    hover:shadow-xl
                "
            >
                <!-- Thumbnail -->
                <img
                    :src="
                        item.thumbnail ??
                        'https://placehold.co/600x400?text=Travelku'
                    "
                    class="
                        h-56
                        w-full
                        object-cover
                    "
                >

                <div class="p-7">

                    <h3
                        class="
                            text-2xl
                            font-bold
                            text-gray-800
                        "
                    >
                        {{ item.name }}
                    </h3>

                    <p
                        class="
                            mt-2
                            text-gray-500
                        "
                    >
                        {{ item.destination }}
                    </p>

                    <div
                        class="
                            mt-6
                            border-t
                            pt-5
                        "
                    >
                        <div
                            class="
                                flex
                                items-center
                                justify-between
                            "
                        >
                            <p
                                class="
                                    text-gray-500
                                "
                            >
                                {{ item.duration_days }}
                                Hari
                            </p>

                            <p
                                class="
                                    font-bold
                                    text-blue-600
                                "
                            >
                                Rp
                                {{
                                    Number(
                                        item.price
                                    ).toLocaleString(
                                        'id-ID'
                                    )
                                }}
                            </p>
                        </div>

                        <Link
                            :href="
                                route(
                                    'packages.show',
                                    item.id
                                )
                            "
                            class="
                                mt-6
                                inline-block
                                rounded-xl
                                bg-blue-600
                                px-5
                                py-2
                                text-white
                                transition
                                hover:bg-blue-700
                            "
                        >
                            Detail Paket
                        </Link>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
</template>