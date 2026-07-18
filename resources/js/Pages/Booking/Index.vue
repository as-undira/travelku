<script setup>
import { router, Link } from '@inertiajs/vue3'

defineProps({
    bookings: Array,
})

function pay(id) {
    router.post(
        route(
            'booking.pay',
            id
        )
    )
}

function cancel(id) {
    router.post(
        route(
            'booking.cancel',
            id
        )
    )
}

function badge(status) {
    switch (status) {
        case 'pending_payment':
            return 'bg-yellow-100 text-yellow-700'

        case 'paid':
            return 'bg-blue-100 text-blue-700'

        case 'completed':
            return 'bg-green-100 text-green-700'

        case 'cancelled':
            return 'bg-red-100 text-red-700'

        default:
            return 'bg-gray-100 text-gray-700'
    }
}
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

            <Link
                :href="
                    route(
                        'home'
                    )
                "
                class="
                    rounded-lg
                    bg-blue-600
                    px-4
                    py-2
                    text-white
                "
            >
                Home
            </Link>
        </div>
    </nav>

    <div
        class="
            mx-auto
            max-w-7xl
            px-6
            py-10
        "
    >
        <h1
            class="
                text-4xl
                font-bold
                text-gray-800
            "
        >
            Riwayat Booking
        </h1>

        <p
            class="
                mt-2
                text-gray-500
            "
        >
            Daftar seluruh
            perjalanan dan status
            pembayaran Anda.
        </p>

        <div
            class="
                mt-10
                space-y-6
            "
        >
            <div
                v-for="
                    item
                    in bookings
                "
                :key="item.id"
                class="
                    rounded-3xl
                    bg-white
                    p-8
                    shadow-md
                "
            >
                <div
                    class="
                        flex
                        flex-col
                        gap-5
                        lg:flex-row
                        lg:items-center
                        lg:justify-between
                    "
                >
                    <!-- Left -->
                    <div>

                        <h2
                            class="
                                text-2xl
                                font-bold
                                text-gray-800
                            "
                        >
                            {{
                                item.schedule
                                    .package
                                    .name
                            }}
                        </h2>

                        <p
                            class="
                                mt-2
                                text-gray-500
                            "
                        >
                            Tanggal :
                            {{
                                item.schedule
                                    .departure_date
                            }}
                        </p>

                        <p
                            class="
                                mt-2
                                text-gray-500
                            "
                        >
                            Booking :
                            #TRV-00{{
                                item.id
                            }}
                        </p>

                    </div>

                    <!-- Right -->
                    <div
                        class="
                            text-left
                            lg:text-right
                        "
                    >
                        <span
                            :class="[
                                badge(
                                    item.status
                                ),
                                'inline-flex rounded-full px-4 py-2 text-sm font-semibold'
                            ]"
                        >
                            {{
                                item.status
                            }}
                        </span>

                        <h3
                            class="
                                mt-5
                                text-3xl
                                font-bold
                                text-blue-600
                            "
                        >
                            Rp
                            {{
                                Number(
                                    item.total_price
                                ).toLocaleString(
                                    'id-ID'
                                )
                            }}
                        </h3>
                    </div>
                </div>

                <!-- Actions -->
                <div
                    v-if="
                        item.status ===
                        'pending_payment'
                    "
                    class="
                        mt-8
                        flex
                        flex-wrap
                        gap-4
                    "
                >
                    <button
                        @click="
                            router.visit(
                                route(
                                    'booking.payment',
                                    item.id
                                )
                            )
                        "
                        class="
                            rounded-xl
                            bg-blue-600
                            px-6
                            py-3
                            font-semibold
                            text-white
                            transition
                            hover:bg-blue-700
                        "
                    >
                        Bayar Sekarang
                    </button>

                    <button
                        @click="
                            cancel(
                                item.id
                            )
                        "
                        class="
                            rounded-xl
                            bg-red-500
                            px-6
                            py-3
                            font-semibold
                            text-white
                            transition
                            hover:bg-red-600
                        "
                    >
                        Batalkan
                    </button>
                </div>

            </div>

            <!-- Empty -->
            <div
                v-if="
                    bookings.length ===
                    0
                "
                class="
                    rounded-3xl
                    bg-white
                    p-16
                    text-center
                    shadow-md
                "
            >
                <h3
                    class="
                        text-2xl
                        font-bold
                    "
                >
                    Belum Ada Booking
                </h3>

                <p
                    class="
                        mt-3
                        text-gray-500
                    "
                >
                    Anda belum
                    melakukan
                    pemesanan paket
                    wisata.
                </p>

                <Link
                    :href="
                        route(
                            'home'
                        )
                    "
                    class="
                        mt-8
                        inline-block
                        rounded-xl
                        bg-blue-600
                        px-6
                        py-3
                        text-white
                    "
                >
                    Jelajahi Paket
                </Link>
            </div>

        </div>
    </div>

</div>
</template>