<script setup>
defineProps({
    bookingCount: Number,
    tier: String,
    distance: Number,
    discount: Number,
    notifications: Array,
    histories: Array,
})

const milestones = {
    bronze: 1000,
    silver: 3000,
    gold: 5000,
    platinum: 5000,
}
</script>

<template>
<div class="min-h-screen bg-slate-50">

    <!-- HERO -->
    <section
        class="bg-gradient-to-r from-blue-700 via-blue-600 to-cyan-500"
    >
        <div
            class="max-w-7xl mx-auto px-6 py-20 text-white"
        >
            <h1
                class="text-5xl font-bold mb-4"
            >
                Loyalty Dashboard
            </h1>

            <p
                class="text-lg opacity-90 max-w-2xl"
            >
                Kelola perjalananmu dan kumpulkan
                jarak tempuh untuk mendapatkan
                berbagai keuntungan dan diskon.
            </p>
        </div>
    </section>

    <div
        class="max-w-7xl mx-auto px-6 -mt-16 pb-12"
    >

        <!-- LOYALTY CARD -->
        <div
            class="bg-white rounded-3xl shadow-xl p-8 mb-8"
        >
            <div
                class="flex flex-col md:flex-row justify-between gap-8"
            >

                <div>
                    <p
                        class="text-gray-500 mb-2"
                    >
                        Loyalty Tier
                    </p>

                    <h2
                        class="text-4xl font-bold capitalize"
                    >
                        {{ tier }}
                    </h2>

                    <p
                        class="mt-4 text-gray-600"
                    >
                        Total Distance
                    </p>

                    <h3
                        class="text-2xl font-semibold"
                    >
                        {{ distance }}
                        KM
                    </h3>
                </div>

                <div>
                    <p
                        class="text-gray-500 mb-2"
                    >
                        Current Discount
                    </p>

                    <h2
                        class="text-5xl font-bold text-blue-600"
                    >
                        {{ discount }}%
                    </h2>
                </div>

            </div>

            <!-- Progress -->
            <div
                class="mt-8"
            >
                <div
                    class="flex justify-between mb-2"
                >
                    <span
                        class="text-sm text-gray-500"
                    >
                        Progress Loyalty
                    </span>

                    <span
                        class="text-sm font-semibold"
                    >
                        {{ distance }} KM
                    </span>
                </div>

                <div
                    class="w-full h-4 bg-gray-200 rounded-full overflow-hidden"
                >
                    <div
                        class="h-full bg-gradient-to-r from-blue-500 to-cyan-500"
                        :style="{
                            width:
                                tier === 'bronze'
                                    ? Math.min(
                                          (distance /
                                              1000) *
                                              100,
                                          100
                                      ) + '%'
                                    : tier === 'silver'
                                    ? Math.min(
                                          (distance /
                                              3000) *
                                              100,
                                          100
                                      ) + '%'
                                    : Math.min(
                                          (distance /
                                              5000) *
                                              100,
                                          100
                                      ) + '%',
                        }"
                    />
                </div>
            </div>
        </div>

        <!-- STATS -->
        <div
            class="grid md:grid-cols-3 gap-6 mb-8"
        >

            <div
                class="bg-white rounded-2xl p-6 shadow"
            >
                <p
                    class="text-gray-500"
                >
                    Total Booking
                </p>

                <h2
                    class="text-4xl font-bold mt-2"
                >
                    {{ bookingCount }}
                </h2>
            </div>

            <div
                class="bg-white rounded-2xl p-6 shadow"
            >
                <p
                    class="text-gray-500"
                >
                    Tier
                </p>

                <h2
                    class="text-4xl font-bold capitalize"
                >
                    {{ tier }}
                </h2>
            </div>

            <div
                class="bg-white rounded-2xl p-6 shadow"
            >
                <p
                    class="text-gray-500"
                >
                    Discount
                </p>

                <h2
                    class="text-4xl font-bold text-blue-600"
                >
                    {{ discount }}%
                </h2>
            </div>

        </div>

        <!-- HISTORY -->
        <div
            class="bg-white rounded-3xl shadow p-8 mb-8"
        >
            <h2
                class="text-2xl font-bold mb-6"
            >
                Loyalty History
            </h2>

            <div
                v-if="histories.length"
                class="space-y-4"
            >
                <div
                    v-for="item in histories"
                    :key="item.id"
                    class="border rounded-2xl p-5"
                >
                    <div
                        class="flex justify-between"
                    >
                        <div>
                            <h3
                                class="font-semibold text-lg"
                            >
                                {{ item.previous_tier }}
                                →
                                {{ item.new_tier }}
                            </h3>

                            <p
                                class="text-gray-500"
                            >
                                {{
                                    item.total_distance
                                }}
                                KM
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                v-else
                class="text-gray-500"
            >
                Belum ada riwayat loyalty.
            </div>
        </div>

        <!-- NOTIFICATION -->
        <div
            class="bg-white rounded-3xl shadow p-8"
        >
            <h2
                class="text-2xl font-bold mb-6"
            >
                Notification
            </h2>

            <div
                v-if="notifications.length"
                class="space-y-4"
            >
                <div
                    v-for="item in notifications"
                    :key="item.id"
                    class="border rounded-2xl p-5"
                >
                    <h3
                        class="font-semibold"
                    >
                        {{ item.title }}
                    </h3>

                    <p
                        class="text-gray-500 mt-2"
                    >
                        {{ item.message }}
                    </p>
                </div>
            </div>

            <div
                v-else
                class="text-gray-500"
            >
                Tidak ada notifikasi.
            </div>
        </div>

    </div>

</div>
</template>