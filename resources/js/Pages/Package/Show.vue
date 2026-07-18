<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    package: Object,
})

const facilityList = (
    props.package.facilities ?? ''
)
    .split('\n')
    .filter(
        (item) =>
            item.trim() !== ''
    )

const itineraryList = (
    props.package.itinerary ?? ''
)
    .split('\n\n')
    .filter(
        (item) =>
            item.trim() !== ''
    )
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
            <Link
                :href="route('home')"
                class="
                    text-2xl
                    font-bold
                    text-blue-600
                "
            >
                Travelku
            </Link>

            <div class="flex items-center gap-4">

                <template
                    v-if="!$page.props.auth?.user"
                >
                    <Link
                        :href="route('login')"
                        class="
                            text-gray-600
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
                            hover:bg-blue-700
                        "
                    >
                        Daftar
                    </Link>
                </template>

                <template v-else>
                    <Link
                        :href="
                            route(
                                'user.dashboard'
                            )
                        "
                        class="
                            rounded-lg
                            bg-blue-600
                            px-4
                            py-2
                            text-white
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
                max-w-7xl
                px-6
                py-12
            "
        >

            <!-- Back -->
            <Link
                :href="route('home')"
                class="
                    mb-10
                    inline-flex
                    rounded-xl
                    bg-white/10
                    px-5
                    py-2
                    text-white
                    backdrop-blur
                    transition
                    hover:bg-white/20
                "
            >
                ← Kembali
            </Link>

            <div
                class="
                    grid
                    gap-10
                    lg:grid-cols-2
                    lg:items-center
                "
            >
                <!-- Image -->
                <div>
                    <img
                        :src="
                            package.thumbnail ??
                            'https://placehold.co/800x500?text=Travelku'
                        "
                        class="
                            h-[380px]
                            w-full
                            rounded-3xl
                            object-cover
                            shadow-2xl
                        "
                    >
                </div>

                <!-- Info -->
                <div>

                    <h1
                        class="
                            text-5xl
                            font-bold
                            text-white
                        "
                    >
                        {{ package.name }}
                    </h1>

                    <p
                        class="
                            mt-4
                            text-xl
                            text-blue-100
                        "
                    >
                        {{ package.destination }}
                    </p>

                    <div
                        class="
                            mt-8
                            grid
                            gap-5
                            md:grid-cols-3
                        "
                    >
                        <div
                            class="
                                rounded-2xl
                                bg-white/10
                                p-5
                                backdrop-blur
                            "
                        >
                            <p
                                class="
                                    text-sm
                                    text-blue-100
                                "
                            >
                                Durasi
                            </p>

                            <h3
                                class="
                                    mt-2
                                    text-2xl
                                    font-bold
                                    text-white
                                "
                            >
                                {{ package.duration_days }}
                                Hari
                            </h3>
                        </div>

                        <div
                            class="
                                rounded-2xl
                                bg-white/10
                                p-5
                                backdrop-blur
                            "
                        >
                            <p
                                class="
                                    text-sm
                                    text-blue-100
                                "
                            >
                                Jarak
                            </p>

                            <h3
                                class="
                                    mt-2
                                    text-2xl
                                    font-bold
                                    text-white
                                "
                            >
                                {{ package.distance_km }}
                                KM
                            </h3>
                        </div>

                        <div
                            class="
                                rounded-2xl
                                bg-white/10
                                p-5
                                backdrop-blur
                            "
                        >
                            <p
                                class="
                                    text-sm
                                    text-blue-100
                                "
                            >
                                Harga
                            </p>

                            <h3
                                class="
                                    mt-2
                                    text-2xl
                                    font-bold
                                    text-white
                                "
                            >
                                Rp
                                {{
                                    Number(
                                        package.price
                                    ).toLocaleString(
                                        'id-ID'
                                    )
                                }}
                            </h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Content -->
    <section
        class="
            mx-auto
            max-w-7xl
            px-6
            py-16
        "
    >
        <div
            class="
                grid
                gap-8
                lg:grid-cols-3
            "
        >
            <!-- kiri -->
            <div
                class="
                    space-y-8
                    lg:col-span-2
                "
            >
                <div
                    class="
                        rounded-3xl
                        bg-white
                        p-8
                        shadow-md
                    "
                >
                    <h2 class="text-2xl font-bold">
                        Deskripsi Paket
                    </h2>

                    <p
                        class="
                            mt-5
                            leading-8
                            text-gray-600
                        "
                    >
                        {{ package.description }}
                    </p>
                </div>

                <div
                    class="
                        rounded-3xl
                        bg-white
                        p-8
                        shadow-md
                    "
                >
                    <h2 class="text-2xl font-bold">
                        Fasilitas
                    </h2>

                    <div
                        class="
                            mt-6
                            space-y-4
                        "
                    >
                        <div
                            v-for="
                                (
                                    item,
                                    index
                                ) in facilityList
                            "
                            :key="index"
                            class="
                                flex
                                items-start
                                gap-4
                            "
                        >
                            <div
                                class="
                                    mt-2
                                    h-2
                                    w-2
                                    rounded-full
                                    bg-blue-600
                                "
                            />

                            <p
                                class="
                                    text-gray-600
                                    leading-7
                                "
                            >
                                {{
                                    item.replace(
                                        '•',
                                        ''
                                    )
                                }}
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="
                        rounded-3xl
                        bg-white
                        p-8
                        shadow-md
                    "
                >
                    <h2 class="text-2xl font-bold">
                        Itinerary
                    </h2>

                    <div
                        class="
                            mt-6
                            space-y-5
                        "
                    >
                        <div
                            v-for="
                                (
                                    item,
                                    index
                                ) in itineraryList
                            "
                            :key="index"
                            class="
                                rounded-2xl
                                bg-slate-50
                                p-5
                            "
                        >
                            <p
                                class="
                                    whitespace-pre-line
                                    leading-8
                                    text-gray-600
                                "
                            >
                                {{ item }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- kanan -->
            <div>
                <div
                    class="
                        sticky
                        top-28
                        rounded-3xl
                        bg-white
                        p-8
                        shadow-md
                    "
                >
                    <h2 class="text-2xl font-bold">
                        Jadwal Keberangkatan
                    </h2>

                    <div
                        class="
                            mt-6
                            space-y-5
                        "
                    >
                        <div
                            v-for="
                                schedule
                                in package.schedules
                            "
                            :key="
                                schedule.id
                            "
                            class="
                                rounded-2xl
                                border
                                p-5
                            "
                        >
                            <p
                                class="
                                    font-semibold
                                "
                            >
                                {{
                                    new Date(
                                        schedule.departure_date
                                    ).toLocaleString(
                                        'id-ID',
                                        {
                                            weekday: 'long',
                                            day: 'numeric',
                                            month: 'long',
                                            year: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit',
                                        }
                                    )
                                }}
                            </p>

                            <p
                                class="
                                    mt-2
                                    text-sm
                                    text-gray-500
                                "
                            >
                                Sisa Kuota :
                                {{
                                    schedule.remaining_quota
                                }}
                            </p>

                            <Link
                                v-if="
                                    schedule.remaining_quota > 0
                                "
                                :href="
                                    route(
                                        'booking.create',
                                        schedule.id
                                    )
                                "
                                class="
                                    mt-5
                                    inline-block
                                    w-full
                                    rounded-xl
                                    bg-blue-600
                                    px-5
                                    py-3
                                    text-center
                                    text-white
                                    hover:bg-blue-700
                                "
                            >
                                Booking Sekarang
                            </Link>

                            <div
                                v-else
                                class="
                                    mt-5
                                    rounded-xl
                                    bg-red-100
                                    px-5
                                    py-3
                                    text-center
                                    font-semibold
                                    text-red-600
                                "
                            >
                                Kuota Penuh
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</div>
</template>