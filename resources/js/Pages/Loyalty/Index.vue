<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    loyalty: Object,
    histories: Array,
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
        </div>
    </nav>

    <div
        class="
            mx-auto
            max-w-7xl
            px-6
            py-12
        "
    >
        <h1
            class="
                mb-10
                text-4xl
                font-bold
                text-gray-800
            "
        >
            Loyalty Milestone
        </h1>

        <!-- Current Tier -->
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
                <p class="text-blue-100">
                    Tier Saat Ini
                </p>

                <h2
                    class="
                        mt-2
                        text-5xl
                        font-bold
                        capitalize
                    "
                >
                    {{ loyalty.tier }}
                </h2>

                <p
                    class="
                        mt-3
                        text-lg
                        text-blue-100
                    "
                >
                    Diskon Aktif
                    {{ loyalty.discount }}%
                </p>
            </div>

            <div class="p-8">

                <!-- Progress -->
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
                        Progress Menuju Tier Berikutnya
                    </span>

                    <span
                        class="
                            font-semibold
                        "
                    >
                        {{ loyalty.progress }}%
                    </span>
                </div>

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

                <!-- Statistics -->
                <div
                    class="
                        mt-8
                        grid
                        gap-8
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
                                text-4xl
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
                            Tier Berikutnya
                        </p>

                        <h3
                            class="
                                mt-2
                                text-4xl
                                font-bold
                            "
                        >
                            {{
                                loyalty.nextTier
                                    ?.name ??
                                'MAX'
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
                                text-4xl
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
                        p-6
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

                    lagi untuk mencapai tier

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

                    dan mendapatkan diskon

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
                        p-6
                        text-green-700
                    "
                >
                    Selamat, Anda telah
                    mencapai tier tertinggi.
                </div>

            </div>
        </div>

        <!-- Tier Table -->
        <div
            class="
                mt-10
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
                Tier Reward
            </h2>

            <table class="w-full">

                <thead>
                    <tr
                        class="
                            border-b
                        "
                    >
                        <th
                            class="
                                py-4
                                text-left
                            "
                        >
                            Tier
                        </th>

                        <th
                            class="
                                py-4
                                text-left
                            "
                        >
                            Minimal KM
                        </th>

                        <th
                            class="
                                py-4
                                text-left
                            "
                        >
                            Diskon
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="py-5">
                            Bronze
                        </td>
                        <td>0 KM</td>
                        <td>0%</td>
                    </tr>

                    <tr>
                        <td class="py-5">
                            Silver
                        </td>
                        <td>1000 KM</td>
                        <td>5%</td>
                    </tr>

                    <tr>
                        <td class="py-5">
                            Gold
                        </td>
                        <td>3000 KM</td>
                        <td>10%</td>
                    </tr>

                    <tr>
                        <td class="py-5">
                            Platinum
                        </td>
                        <td>5000 KM</td>
                        <td>15%</td>
                    </tr>

                </tbody>

            </table>
        </div>

        <!-- History -->
        <div
            class="
                mt-10
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
                Riwayat Distance
            </h2>

            <div
                v-if="
                    histories.length
                "
                class="
                    space-y-4
                "
            >
                <div
                    v-for="
                        item in histories
                    "
                    :key="item.id"
                    class="
                        flex
                        items-center
                        justify-between
                        rounded-2xl
                        border
                        p-6
                    "
                >
                    <div>

                        <h3
                            class="
                                text-lg
                                font-semibold
                            "
                        >
                            {{
                                item.package
                            }}
                        </h3>

                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >
                            {{
                                item.date
                            }}
                        </p>

                    </div>

                    <div
                        class="
                            text-2xl
                            font-bold
                            text-blue-600
                        "
                    >
                        +
                        {{
                            item.distance
                        }}
                        KM
                    </div>
                </div>
            </div>

            <div
                v-else
                class="
                    rounded-2xl
                    bg-slate-100
                    p-6
                    text-gray-500
                "
            >
                Belum ada riwayat
                perjalanan yang
                menghasilkan loyalty
                distance.
            </div>

        </div>

    </div>

</div>
</template>