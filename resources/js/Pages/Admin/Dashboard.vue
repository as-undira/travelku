<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    totalUsers: Number,
    totalPackages: Number,
    totalBookings: Number,
    completedBookings: Number,
    pendingBookings: Number,
    totalRevenue: Number,
    platinumUsers: Number,
    recentBookings: Array,
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
                Travelku Admin
            </h1>

            <Link
                :href="
                    route(
                        'profile.edit'
                    )
                "
                class="
                    rounded-xl
                    bg-blue-600
                    px-4
                    py-2
                    text-white
                "
            >
                Profile
            </Link>
        </div>
    </nav>

    <!-- Hero -->
    <section
        class="
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
                py-16
            "
        >
            <h1
                class="
                    text-5xl
                    font-bold
                    text-white
                "
            >
                Dashboard Admin
            </h1>

            <p
                class="
                    mt-4
                    text-xl
                    text-blue-100
                "
            >
                Kelola seluruh
                operasional Travelku
                dari satu dashboard.
            </p>
        </div>
    </section>

    <div
        class="
            mx-auto
            -mt-10
            max-w-7xl
            px-6
            pb-16
        "
    >

        <!-- Statistic -->
        <div
            class="
                grid
                gap-6
                md:grid-cols-2
                xl:grid-cols-4
            "
        >

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-7
                    shadow-xl
                "
            >
                <p
                    class="
                        text-gray-500
                    "
                >
                    Total Customer
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                    "
                >
                    {{ totalUsers }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-7
                    shadow-xl
                "
            >
                <p
                    class="
                        text-gray-500
                    "
                >
                    Total Paket
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                    "
                >
                    {{ totalPackages }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-7
                    shadow-xl
                "
            >
                <p
                    class="
                        text-gray-500
                    "
                >
                    Total Booking
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                    "
                >
                    {{ totalBookings }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-7
                    shadow-xl
                "
            >
                <p
                    class="
                        text-gray-500
                    "
                >
                    Customer Platinum
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                        text-blue-600
                    "
                >
                    {{ platinumUsers }}
                </h2>
            </div>

        </div>

        <!-- Revenue -->
        <div
            class="
                mt-8
                rounded-3xl
                bg-white
                p-8
                shadow-xl
            "
        >
            <p
                class="
                    text-gray-500
                "
            >
                Total Pendapatan
            </p>

            <h2
                class="
                    mt-3
                    text-5xl
                    font-bold
                    text-blue-600
                "
            >
                Rp
                {{
                    Number(
                        totalRevenue
                    ).toLocaleString(
                        'id-ID'
                    )
                }}
            </h2>
        </div>

        <!-- Shortcut -->
        <div
            class="
                mt-8
                grid
                gap-6
                md:grid-cols-3
            "
        >

            <Link
                :href="
                    route(
                        'admin.packages.index'
                    )
                "
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-xl
                    transition
                    hover:-translate-y-1
                "
            >
                <h3
                    class="
                        text-2xl
                        font-bold
                    "
                >
                    Kelola Paket
                </h3>

                <p
                    class="
                        mt-3
                        text-gray-500
                    "
                >
                    Tambah, edit,
                    dan hapus paket.
                </p>
            </Link>

            <Link
                :href="
                    route(
                        'admin.schedules.index'
                    )
                "
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-xl
                    transition
                    hover:-translate-y-1
                "
            >
                <h3
                    class="
                        text-2xl
                        font-bold
                    "
                >
                    Kelola Jadwal
                </h3>

                <p
                    class="
                        mt-3
                        text-gray-500
                    "
                >
                    Atur jadwal
                    keberangkatan.
                </p>
            </Link>

            <Link
                :href="
                    route(
                        'admin.bookings'
                    )
                "
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-xl
                    transition
                    hover:-translate-y-1
                "
            >
                <h3
                    class="
                        text-2xl
                        font-bold
                    "
                >
                    Kelola Booking
                </h3>

                <p
                    class="
                        mt-3
                        text-gray-500
                    "
                >
                    Verifikasi dan
                    selesaikan booking.
                </p>
            </Link>

        </div>

        <!-- Recent -->
        <div
            class="
                mt-8
                rounded-3xl
                bg-white
                p-8
                shadow-xl
            "
        >
            <h2
                class="
                    mb-8
                    text-3xl
                    font-bold
                "
            >
                Booking Terbaru
            </h2>

            <div
                class="
                    overflow-x-auto
                "
            >
                <table
                    class="
                        w-full
                    "
                >
                    <thead>
                        <tr
                            class="
                                border-b
                            "
                        >
                            <th class="py-4 text-left">
                                Customer
                            </th>

                            <th class="py-4 text-left">
                                Paket
                            </th>

                            <th class="py-4 text-left">
                                Status
                            </th>

                            <th class="py-4 text-left">
                                Total
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr
                            v-for="
                                item in recentBookings
                            "
                            :key="
                                item.id
                            "
                            class="
                                border-b
                            "
                        >
                            <td class="py-5">
                                {{
                                    item.user
                                        ?.name
                                }}
                            </td>

                            <td>
                                {{
                                    item
                                        .schedule
                                        ?.package
                                        ?.name
                                }}
                            </td>

                            <td>
                                {{
                                    item.status
                                }}
                            </td>

                            <td>
                                Rp
                                {{
                                    Number(
                                        item.total_price
                                    ).toLocaleString(
                                        'id-ID'
                                    )
                                }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</template>