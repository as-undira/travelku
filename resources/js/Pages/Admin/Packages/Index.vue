<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
    packages: Array,
})

function remove(id) {
    if (
        confirm(
            'Yakin ingin menghapus paket ini?'
        )
    ) {
        router.delete(
            route(
                'admin.packages.destroy',
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
                    transition
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
                        Kelola Paket
                    </h1>

                    <p
                        class="
                            mt-4
                            text-xl
                            text-blue-100
                        "
                    >
                        Tambah, edit,
                        dan kelola
                        seluruh paket wisata.
                    </p>

                </div>

                <Link
                    :href="
                        route(
                            'admin.packages.create'
                        )
                    "
                    class="
                        rounded-2xl
                        bg-white
                        px-6
                        py-4
                        font-semibold
                        text-blue-600
                        shadow-lg
                    "
                >
                    + Tambah Paket
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

        <!-- Statistic -->
        <div
            class="
                mb-8
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
                Total Paket
            </p>

            <h2
                class="
                    mt-2
                    text-5xl
                    font-bold
                    text-blue-600
                "
            >
                {{
                    packages.length
                }}
            </h2>
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

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-left
                                "
                            >
                                Paket
                            </th>

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-left
                                "
                            >
                                Destinasi
                            </th>

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-left
                                "
                            >
                                Durasi
                            </th>

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-left
                                "
                            >
                                Harga
                            </th>

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-left
                                "
                            >
                                Status
                            </th>

                            <th
                                class="
                                    px-6
                                    py-5
                                    text-center
                                "
                            >
                                Action
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        <tr
                            v-for="
                                item in packages
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
                                        flex
                                        items-center
                                        gap-4
                                    "
                                >

                                    <img
                                        :src="
                                            item.thumbnail ??
                                            'https://placehold.co/100x100'
                                        "
                                        class="
                                            h-20
                                            w-20
                                            rounded-2xl
                                            object-cover
                                        "
                                    >

                                    <div>

                                        <h3
                                            class="
                                                font-bold
                                            "
                                        >
                                            {{
                                                item.name
                                            }}
                                        </h3>

                                        <p
                                            class="
                                                mt-1
                                                text-sm
                                                text-gray-500
                                            "
                                        >
                                            {{
                                                item.distance_km
                                            }}
                                            KM
                                        </p>

                                    </div>

                                </div>
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                {{
                                    item.destination
                                }}
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                {{
                                    item.duration_days
                                }}
                                Hari
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                    font-semibold
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
                            </td>

                            <td
                                class="
                                    px-6
                                    py-5
                                "
                            >
                                <span
                                    class="
                                        rounded-full
                                        px-4
                                        py-2
                                        text-sm
                                    "
                                    :class="
                                        item.status ===
                                        'available'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700'
                                    "
                                >
                                    {{
                                        item.status
                                    }}
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
                                                'admin.packages.edit',
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
                                        @click="
                                            remove(
                                                item.id
                                            )
                                        "
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