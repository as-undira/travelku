<script setup>
import { router, Link } from '@inertiajs/vue3'

const props = defineProps({
    booking: Object,
})

function pay() {
    router.post(
        route(
            'booking.pay',
            props.booking.id
        )
    )
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
        </div>
    </nav>

    <div
        class="
            mx-auto
            max-w-3xl
            px-6
            py-12
        "
    >
        <Link
            :href="
                route(
                    'booking.index'
                )
            "
            class="
                inline-flex
                rounded-xl
                bg-white
                px-5
                py-2
                text-gray-700
                shadow-sm
            "
        >
            ← Kembali
        </Link>

        <div
            class="
                mt-6
                rounded-3xl
                bg-white
                p-10
                shadow-lg
            "
        >
            <div
                class="
                    text-center
                "
            >
                <span
                    class="
                        rounded-full
                        bg-yellow-100
                        px-5
                        py-2
                        text-yellow-700
                        font-semibold
                    "
                >
                    Menunggu Pembayaran
                </span>

                <h1
                    class="
                        mt-8
                        text-4xl
                        font-bold
                    "
                >
                    Pembayaran Booking
                </h1>

                <p
                    class="
                        mt-3
                        text-gray-500
                    "
                >
                    Selesaikan pembayaran
                    untuk melanjutkan
                    proses perjalanan.
                </p>
            </div>

            <div
                class="
                    mt-10
                    rounded-2xl
                    bg-slate-100
                    p-6
                "
            >
                <div
                    class="
                        flex
                        justify-between
                    "
                >
                    <span>
                        Kode Booking
                    </span>

                    <strong>
                        TRV-00{{
                            booking.id
                        }}
                    </strong>
                </div>

                <div
                    class="
                        mt-5
                        flex
                        justify-between
                    "
                >
                    <span>
                        Paket
                    </span>

                    <strong>
                        {{
                            booking.schedule
                                .package
                                .name
                        }}
                    </strong>
                </div>

                <div
                    class="
                        mt-5
                        flex
                        justify-between
                    "
                >
                    <span>
                        Keberangkatan
                    </span>

                    <strong>
                        {{
                            booking.schedule
                                .departure_date
                        }}
                    </strong>
                </div>

                <div
                    class="
                        mt-5
                        border-t
                        pt-5
                    "
                >
                    <div
                        class="
                            flex
                            justify-between
                            text-2xl
                            font-bold
                        "
                    >
                        <span>
                            Total
                        </span>

                        <span
                            class="
                                text-blue-600
                            "
                        >
                            Rp
                            {{
                                Number(
                                    booking.total_price
                                ).toLocaleString(
                                    'id-ID'
                                )
                            }}
                        </span>
                    </div>
                </div>
            </div>

            <button
                @click="pay"
                class="
                    mt-10
                    w-full
                    rounded-2xl
                    bg-blue-600
                    py-4
                    text-lg
                    font-semibold
                    text-white
                    transition
                    hover:bg-blue-700
                "
            >
                Bayar Sekarang
            </button>

        </div>
    </div>

</div>
</template>