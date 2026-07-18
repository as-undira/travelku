<script setup>
import { computed } from 'vue'
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    schedule: Object,
})

const form = useForm({
    schedule_id: props.schedule.id,
    participant_count: 1,
})

const totalPrice = computed(() => {
    return (
        props.schedule.package.price *
        form.participant_count
    )
})

function submit() {
    form.post(
        route('booking.store')
    )
}
</script>

<template>
<div class="min-h-screen bg-slate-100">

    <!-- Header -->
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
            max-w-5xl
            px-6
            py-10
        "
    >
        <!-- Back -->
        <Link
            :href="
                route(
                    'packages.show',
                    schedule.package.id
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
                transition
                hover:bg-gray-100
            "
        >
            ← Kembali
        </Link>

        <div
            class="
                mt-6
                rounded-3xl
                bg-white
                p-8
                shadow-lg
            "
        >
            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                "
            >
                Booking Paket
            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                "
            >
                Silakan periksa detail
                booking sebelum
                melanjutkan pembayaran.
            </p>

            <!-- Info Paket -->
            <div
                class="
                    mt-10
                    grid
                    gap-5
                    md:grid-cols-3
                "
            >
                <div
                    class="
                        rounded-2xl
                        bg-slate-100
                        p-5
                    "
                >
                    <p
                        class="
                            text-sm
                            text-gray-500
                        "
                    >
                        Paket
                    </p>

                    <h3
                        class="
                            mt-2
                            font-bold
                        "
                    >
                        {{
                            schedule.package.name
                        }}
                    </h3>
                </div>

                <div
                    class="
                        rounded-2xl
                        bg-slate-100
                        p-5
                    "
                >
                    <p
                        class="
                            text-sm
                            text-gray-500
                        "
                    >
                        Keberangkatan
                    </p>

                    <h3
                        class="
                            mt-2
                            font-bold
                        "
                    >
                        {{
                            schedule.departure_date
                        }}
                    </h3>
                </div>

                <div
                    class="
                        rounded-2xl
                        bg-slate-100
                        p-5
                    "
                >
                    <p
                        class="
                            text-sm
                            text-gray-500
                        "
                    >
                        Sisa Kuota
                    </p>

                    <h3
                        class="
                            mt-2
                            font-bold
                        "
                    >
                        {{
                            schedule.remaining_quota
                        }}
                    </h3>
                </div>
            </div>

            <!-- Peserta -->
            <div class="mt-10">

                <label
                    class="
                        font-semibold
                        text-gray-700
                    "
                >
                    Jumlah Peserta
                </label>

                <input
                    type="number"
                    min="1"
                    :max="
                        schedule.remaining_quota
                    "
                    v-model="
                        form.participant_count
                    "
                    class="
                        mt-3
                        w-full
                        rounded-xl
                        border
                        border-gray-300
                        px-4
                        py-3
                        focus:border-blue-500
                        focus:ring-blue-500
                    "
                >
            </div>

            <!-- Ringkasan -->
            <div
                class="
                    mt-10
                    rounded-2xl
                    bg-slate-100
                    p-6
                "
            >
                <h2
                    class="
                        text-xl
                        font-bold
                    "
                >
                    Ringkasan Booking
                </h2>

                <div
                    class="
                        mt-6
                        space-y-4
                    "
                >
                    <div
                        class="
                            flex
                            justify-between
                        "
                    >
                        <span>
                            Harga Paket
                        </span>

                        <span>
                            Rp
                            {{
                                Number(
                                    schedule.package.price
                                ).toLocaleString(
                                    'id-ID'
                                )
                            }}
                        </span>
                    </div>

                    <div
                        class="
                            flex
                            justify-between
                        "
                    >
                        <span>
                            Jumlah Peserta
                        </span>

                        <span>
                            {{
                                form.participant_count
                            }}
                            Orang
                        </span>
                    </div>

                    <div
                        class="
                            border-t
                            pt-4
                        "
                    >
                        <div
                            class="
                                flex
                                justify-between
                                text-xl
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
                                        totalPrice
                                    ).toLocaleString(
                                        'id-ID'
                                    )
                                }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <button
                @click="submit"
                :disabled="
                    form.processing
                "
                class="
                    mt-8
                    w-full
                    rounded-2xl
                    bg-blue-600
                    py-4
                    text-lg
                    font-semibold
                    text-white
                    transition
                    hover:bg-blue-700
                    disabled:opacity-50
                "
            >
                {{
                    form.processing
                        ? 'Memproses...'
                        : 'Booking Sekarang'
                }}
            </button>

        </div>
    </div>

</div>
</template>