<script setup>
import {
    Link,
    router,
} from '@inertiajs/vue3'

defineProps({
    bookings: Array,
    totalBookings: Number,
    pendingBookings: Number,
    paidBookings: Number,
    completedBookings: Number,
    cancelledBookings: Number,
    totalRevenue: Number,
})

function complete(id)
{
    if (
        confirm(
            'Selesaikan booking ini?'
        )
    ) {
        router.post(
            route(
                'admin.bookings.complete',
                id
            )
        )
    }
}

function formatPrice(
    value
) {
    return Number(
        value
    ).toLocaleString(
        'id-ID'
    )
}
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <!-- HERO -->
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

            <Link
                :href="
                    route(
                        'admin.dashboard'
                    )
                "
                class="
                    mb-8
                    inline-flex
                    rounded-xl
                    bg-white/10
                    px-5
                    py-2
                    text-white
                "
            >
                ← Kembali
            </Link>

            <h1
                class="
                    text-5xl
                    font-bold
                    text-white
                "
            >
                Kelola Booking
            </h1>

            <p
                class="
                    mt-4
                    text-xl
                    text-blue-100
                "
            >
                Pantau seluruh
                pemesanan pelanggan
                Travelku.
            </p>

        </div>
    </section>

    <div
        class="
            mx-auto
            -mt-8
            max-w-7xl
            px-6
            pb-16
        "
    >

        <!-- STATISTIC -->
        <div
            class="
                mb-8
                grid
                gap-6
                md:grid-cols-3
                lg:grid-cols-6
            "
        >

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Total
                </p>

                <h2
                    class="
                        mt-2
                        text-3xl
                        font-bold
                    "
                >
                    {{
                        totalBookings
                    }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Pending
                </p>

                <h2
                    class="
                        mt-2
                        text-3xl
                        font-bold
                        text-yellow-500
                    "
                >
                    {{
                        pendingBookings
                    }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Paid
                </p>

                <h2
                    class="
                        mt-2
                        text-3xl
                        font-bold
                        text-blue-600
                    "
                >
                    {{
                        paidBookings
                    }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Completed
                </p>

                <h2
                    class="
                        mt-2
                        text-3xl
                        font-bold
                        text-green-600
                    "
                >
                    {{
                        completedBookings
                    }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Cancelled
                </p>

                <h2
                    class="
                        mt-2
                        text-3xl
                        font-bold
                        text-red-500
                    "
                >
                    {{
                        cancelledBookings
                    }}
                </h2>
            </div>

            <div
                class="
                    rounded-3xl
                    bg-white
                    p-6
                    shadow-xl
                "
            >
                <p class="text-gray-500">
                    Revenue
                </p>

                <h2
                    class="
                        mt-2
                        text-2xl
                        font-bold
                        text-blue-700
                    "
                >
                    Rp
                    {{
                        formatPrice(
                            totalRevenue
                        )
                    }}
                </h2>
            </div>

        </div>

        <!-- TABLE -->
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
                    overflow-x-auto
                "
            >

                <table
                    class="
                        w-full
                    "
                >
                    <thead
                        class="
                            bg-slate-50
                        "
                    >
                        <tr>

                            <th class="px-6 py-5 text-left">
                                Customer
                            </th>

                            <th class="px-6 py-5 text-left">
                                Paket
                            </th>

                            <th class="px-6 py-5 text-left">
                                Jadwal
                            </th>

                            <th class="px-6 py-5 text-left">
                                Total
                            </th>

                            <th class="px-6 py-5 text-left">
                                Status
                            </th>

                            <th class="px-6 py-5 text-center">
                                Action
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        <tr
                            v-for="
                                item in bookings
                            "
                            :key="
                                item.id
                            "
                            class="
                                border-t
                            "
                        >
                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                <div
                                    class="
                                        font-semibold
                                    "
                                >
                                    {{
                                        item.user.name
                                    }}
                                </div>

                                <div
                                    class="
                                        text-sm
                                        text-gray-500
                                    "
                                >
                                    {{
                                        item.user.email
                                    }}
                                </div>
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                {{
                                    item
                                    .schedule
                                    .package
                                    .name
                                }}
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                {{
                                    new Date(
                                        item
                                        .schedule
                                        .departure_date
                                    )
                                    .toLocaleDateString(
                                        'id-ID',
                                        {
                                            day:'numeric',
                                            month:'short',
                                            year:'numeric'
                                        }
                                    )
                                }}
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                    font-semibold
                                "
                            >
                                Rp
                                {{
                                    formatPrice(
                                        item.total_price
                                    )
                                }}
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >

                                <span
                                    v-if="
                                        item.status ===
                                        'pending_payment'
                                    "
                                    class="
                                        rounded-full
                                        bg-yellow-100
                                        px-4
                                        py-2
                                        text-yellow-700
                                    "
                                >
                                    Pending
                                </span>

                                <span
                                    v-else-if="
                                        item.status ===
                                        'paid'
                                    "
                                    class="
                                        rounded-full
                                        bg-blue-100
                                        px-4
                                        py-2
                                        text-blue-700
                                    "
                                >
                                    Paid
                                </span>

                                <span
                                    v-else-if="
                                        item.status ===
                                        'completed'
                                    "
                                    class="
                                        rounded-full
                                        bg-green-100
                                        px-4
                                        py-2
                                        text-green-700
                                    "
                                >
                                    Completed
                                </span>

                                <span
                                    v-else
                                    class="
                                        rounded-full
                                        bg-red-100
                                        px-4
                                        py-2
                                        text-red-700
                                    "
                                >
                                    Cancelled
                                </span>

                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                    text-center
                                "
                            >

                                <button
                                    v-if="
                                        item.status ===
                                        'paid'
                                    "
                                    @click="
                                        complete(
                                            item.id
                                        )
                                    "
                                    class="
                                        rounded-xl
                                        bg-green-600
                                        px-4
                                        py-2
                                        text-white
                                    "
                                >
                                    Selesaikan
                                </button>

                                <span
                                    v-else
                                    class="
                                        text-gray-400
                                    "
                                >
                                    -
                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>
</template>