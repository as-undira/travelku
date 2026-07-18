<script setup>
import {
    Link,
    router,
} from '@inertiajs/vue3'

defineProps({
    schedules: Array,
    totalSchedules: Number,
    totalQuota: Number,
    remainingQuota: Number,
})

function remove(id) {
    if (
        confirm(
            'Yakin ingin menghapus jadwal?'
        )
    ) {
        router.delete(
            route(
                'admin.schedules.destroy',
                id
            )
        )
    }
}
</script>

<template>
<div class="min-h-screen bg-slate-100">

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
                    backdrop-blur
                    hover:bg-white/20
                "
            >
                ← Kembali
            </Link>

            <div
                class="
                    flex
                    flex-col
                    gap-6
                    md:flex-row
                    md:items-center
                    md:justify-between
                "
            >
                <div>

                    <h1
                        class="
                            text-5xl
                            font-bold
                            text-white
                        "
                    >
                        Jadwal Keberangkatan
                    </h1>

                    <p
                        class="
                            mt-4
                            text-xl
                            text-blue-100
                        "
                    >
                        Kelola seluruh
                        jadwal paket wisata.
                    </p>

                </div>

                <Link
                    :href="
                        route(
                            'admin.schedules.create'
                        )
                    "
                    class="
                        rounded-2xl
                        bg-white
                        px-6
                        py-4
                        font-semibold
                        text-blue-600
                    "
                >
                    + Tambah Jadwal
                </Link>

            </div>

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

        <!-- Statistik -->
        <div
            class="
                mb-8
                grid
                gap-6
                md:grid-cols-3
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
                <p class="text-gray-500">
                    Total Jadwal
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                    "
                >
                    {{
                        totalSchedules
                    }}
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
                <p class="text-gray-500">
                    Total Kuota
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                    "
                >
                    {{
                        totalQuota
                    }}
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
                <p class="text-gray-500">
                    Sisa Kuota
                </p>

                <h2
                    class="
                        mt-3
                        text-4xl
                        font-bold
                        text-blue-600
                    "
                >
                    {{
                        remainingQuota
                    }}
                </h2>
            </div>

        </div>

        <!-- Table -->
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
                                Paket
                            </th>

                            <th class="px-6 py-5 text-left">
                                Tanggal
                            </th>

                            <th class="px-6 py-5 text-left">
                                Kuota
                            </th>

                            <th class="px-6 py-5 text-left">
                                Sisa
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
                                item in schedules
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
                                    font-semibold
                                "
                            >
                                {{
                                    item.package.name
                                }}
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                <div>
                                    {{
                                        new Date(
                                            item.departure_date
                                        ).toLocaleDateString(
                                            'id-ID',
                                            {
                                                weekday: 'long',
                                                day: 'numeric',
                                                month: 'long',
                                                year: 'numeric',
                                            }
                                        )
                                    }}
                                </div>

                                <div
                                    class="
                                        text-sm
                                        text-gray-500
                                    "
                                >
                                    {{
                                        new Date(
                                            item.departure_date
                                        ).toLocaleTimeString(
                                            'id-ID',
                                            {
                                                hour: '2-digit',
                                                minute: '2-digit',
                                            }
                                        )
                                    }}
                                    WIB
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                {{
                                    item.quota
                                }}
                            </td>

                            <td class="px-6 py-5">
                                {{
                                    item.remaining_quota
                                }}
                            </td>

                            <td class="px-6 py-5">

                                <span
                                    v-if="
                                        item.remaining_quota === 0
                                    "
                                    class="
                                        rounded-full
                                        bg-red-100
                                        px-4
                                        py-2
                                        text-red-700
                                    "
                                >
                                    Penuh
                                </span>

                                <span
                                    v-else-if="
                                        item.remaining_quota <= 5
                                    "
                                    class="
                                        rounded-full
                                        bg-yellow-100
                                        px-4
                                        py-2
                                        text-yellow-700
                                    "
                                >
                                    Hampir Penuh
                                </span>

                                <span
                                    v-else
                                    class="
                                        rounded-full
                                        bg-green-100
                                        px-4
                                        py-2
                                        text-green-700
                                    "
                                >
                                    Tersedia
                                </span>

                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                <div
                                    class="
                                        flex
                                        justify-center
                                        gap-3
                                    "
                                >

                                    <Link
                                        :href="
                                            route(
                                                'admin.schedules.edit',
                                                item.id
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
                                        Edit
                                    </Link>

                                    <button
                                        @click="remove(item.id)"
                                        class="
                                            rounded-xl
                                            bg-red-500
                                            px-4
                                            py-2
                                            text-white
                                        "
                                    >
                                        Delete
                                    </button>

                                </div>
                            </td>

                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>
</template>